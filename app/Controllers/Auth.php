<?php

namespace App\Controllers;
use App\Models\AuthModel;

class Auth extends BaseController
{

    protected $AuthModel;
    protected $session;

    public function __construct()
    {
        $this->session = \Config\Services::session();
        $this->AuthModel = new AuthModel();
    }

    public function valid_register()
    {
        $data = [
            'nama_lengkap' => $this->request->getVar('nama_lengkap'),
            'username' => $this->request->getVar('username'),
            'email' => $this->request->getVar('email'),
            'alamat' => $this->request->getVar('alamat'),
            'password' => $this->request->getVar('password'),
            'ulangi' => $this->request->getVar('ulangi'),
            'foto' => 'default.jpg'
        ];

        // cek apakah password dan ulangi password sama
        if ($data['password'] != $data['ulangi']) {
            session()->setFlashdata('pesan', 'Password dan Ulangi Password tidak sama');
            return redirect()->to('/register');
        }

        $token = bin2hex(random_bytes(10));

        $email = \Config\Services::email();
        $email->setTo($data['email']);
        $email->setFrom('infinitepictureofficial@gmail.com', 'Infinitepictureofficial');
        $email->setSubject('Registrasi Akun');
        $email->setMessage('Selamat Datang ' . $data['username'] . ' di MixPict, akun anda berhasil dibuat. Silahkan Activasi akun anda dengan klik link berikut :' . base_url() . 'auth/activate/' . $token);
        $email->send();

        $this->AuthModel->save([
            'nama_lengakp' => $data['nama_lengkap'],
            'username' => $data['username'],
            'email' => $data['email'],
            'alamat' => $data['alamat'],
            'password' => password_hash($data['password'], PASSWORD_DEFAULT),
            'actv' => $token,
            'foto' => 'default.jpg'
        ]);


        // enkripsi password
        $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);

        // simpan ke database
        $this->AuthModel->save([
            'nama_lengkap' => $data['nama_lengkap'],
            'username' => $data['username'],
            'email' => $data['email'],
            'alamat' => $data['alamat'],
            'password' => $data['password'],
            'foto' => $data['foto']
        ]);

        session()->setFlashdata('pesan', 'Data berhasil ditambahkan.');
        return redirect()->to('/login');
    }

    public function valid_login()
    {
        $data = [
            'username' => $this->request->getVar('username'),
            'password' => $this->request->getVar('password'),
        ];

        $user = $this->AuthModel->where(['username' => $data['username']])->first();

        // cek apakah username ada
        if ($user) {
            // cek apakah password benar
            if (password_verify($data['password'], $user['password'])) {
                session()->set([
                    'id_user' => $user['id_user'], // tambahkan id_user ke session
                    'username' => $user['username'],
                    'nama_lengkap' => $user['nama_lengkap'],
                    'email' => $user['email'],
                    'alamat' => $user['alamat'],
                    'foto' => $user['foto'],
                    'logged_in' => TRUE
                ]);
                return redirect()->to('/home');
            } else {
                session()->setFlashdata('pesan', 'Password salah.');
                return redirect()->to('/login');
            }
        } else {
            // kirim session id, nama, username, email, alamat
            $data = [
                'nama_lengkap' => $user['nama_lengkap'],
                'username' => $user['username'],
                'email' => $user['email'],
                'alamat' => $user['alamat'],
                'foto' => $user['foto']
            ];

            session()->set($data);
            session()->setFlashdata('pesan', 'Username tidak ditemukan.');
            return redirect()->to('/login');
        }
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to('/login');
    }

}