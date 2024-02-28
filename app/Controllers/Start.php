<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\FotoModel;
use App\Models\AuthModel;
use App\Models\LikeModel;
use App\Models\KomenModel;

class Start extends BaseController
{

    protected $FotoModel;
    protected $AuthModel;
    protected $LikeModel;
    protected $KomenModel;
    protected $session;

    public function __construct()
    {
        $this->FotoModel = new FotoModel();
        $this->AuthModel = new AuthModel();
        $this->LikeModel = new LikeModel();
        $this->KomenModel = new KomenModel();
        $this->session = session();
    }

    public function index()
    {
        return view('home/start');
    }

    public function profile()
    {
        $user = session()->get('id_user');
        $userprofile = $this->AuthModel->where('id_user', $user)->first();
        $data = [
            'user' => $userprofile
        ];
        return view('user/profile', $data);
    }

    public function register()
    {
        return view('home/register');
    }

    public function login()
    {
        return view('home/login');
    }

    public function create()
    {
        $user = session()->get('id_user');
        $userprofile = $this->AuthModel->where('id_user', $user)->first();
        $data = [
            'user' => $userprofile
        ];
        return view('user/create', $data);
    }

    public function editprofile()
    {
        $user = session()->get('id_user');
        $userprofile = $this->AuthModel->where('id_user', $user)->first();

        $data = [
            'user' => $userprofile
        ];

        return view('user/editprofile', $data);
    }


    public function save()
    {
        // ambil gambar
        $fileDokumen = $this->request->getFile('foto');
        $newName = $fileDokumen->getRandomName();
        $fileDokumen->move('foto_storage', $newName);

        $this->FotoModel->save([
            'judul_foto' => $this->request->getVar('judul_foto'),
            'deskripsi_foto' => $this->request->getVar('desk'),
            'tanggal_unggahan' => date('Y-m-d'),
            'lokasi_file' => $newName,
            'id_album' => '1',
            'id_user' => session()->get('id_user')
        ]);

        return redirect()->to('/home');
    }


    public function editprofilesave()
    {
        $userTake = session()->get('id_user');
        $user = $this->AuthModel->where('id_user', $userTake)->first();

        $fileDokumen = $this->request->getFile('foto');
        if ($fileDokumen->getError()
            == 4) {
            $newName = $user['foto'];
        } else {
            $newName = $fileDokumen->getRandomName();
            $fileDokumen->move('foto_storage', $newName);
        }

        $data = [
            'nama' => $this->request->getVar('nama_lengkap'),
            'email' => $this->request->getVar('email'),
            'alamat' => $this->request->getVar('alamat'),
            'foto' => $newName
        ];

        $this->AuthModel->save([
            'id_user' => session()->get('id_user'),
            'nama_lengkap' => $data['nama'],
            'email' => $data['email'],
            'alamat' => $data['alamat'],
            'foto' => $data['foto']
        ]);
        return redirect()->to('/home');
    }

    public function  galeri($id)
    {
        $foto = $this->FotoModel->find($id);
        $uploader = $this->AuthModel->getUser($foto['id_user']);
        $user = session()->get('id_user');
        $userprofile = $this->AuthModel->where('id_user', $user)->first();
        $ses = session()->get('id_user');
        $liked = $this->LikeModel->where(['id_foto' => $id, 'id_user' => $ses])->first();
        $komen = $this->KomenModel->where('id_foto', $id)->findAll();

        $data = [
            'foto' => $this->FotoModel->find($id),
            'user' => $userprofile,
            'uploader' => $uploader,
            'liked' => $liked,
            'ses' => $ses,
            'komen' => $komen

        ];
        return view('user/galeri', $data);
    }

    public function  editgaleri($id)
    {
        $foto = $this->FotoModel->find($id);
        $uploader = $this->AuthModel->getUser($foto['id_user']);
        $user = session()->get('id_user');
        $userprofile = $this->AuthModel->where('id_user', $user)->first();
        $ses = session()->get('id_user');
        $liked = $this->LikeModel->where(['id_foto' => $id, 'id_user' => $ses])->first();
        $komen = $this->KomenModel->where('id_foto', $id)->findAll();

        $data = [
            'foto' => $this->FotoModel->find($id),
            'user' => $userprofile,
            'uploader' => $uploader,
            'liked' => $liked,
            'ses' => $ses,
            'komen' => $komen

        ];
        return view('user/editgaleri', $data);
    }

    public function like($id)
    {
        $this->LikeModel->save([
            'id_foto' => $id,
            'id_user' => $this->session->get('id_user')
        ]);

        session()->setFlashdata('pesan', 'Berhasil Menyukai');
        return redirect()->to('/galeri/' . $id);
    }

    public function unlike($id)
    {
        $this->LikeModel->where(['id_foto' => $id, 'id_user' => $this->session->get('id_user')])->delete();

        session()->setFlashdata('pesan', 'Berhasil Membatalkan Like');
        return redirect()->to('/galeri/' . $id);
    }

    
    public function download($id)
    {
        $dataFile = $this->FotoModel->getFoto($id);
        $fileExtension = pathinfo($dataFile['lokasi_file'], PATHINFO_EXTENSION);
        $NamaFile = $dataFile['judul_foto'] . '.' . $fileExtension;
        return $this->response->download('foto_storage/' . $dataFile['lokasi_file'], null)->setFileName($NamaFile);
    }

    
    public function delete($id)
    {
        $this->FotoModel->where('id_foto', $id)->delete();

        session()->setFlashdata('pesan', 'Data Berhasil Dihapus');
        return redirect()->to('/home');
    }

    public function savekomen($id)
    {
        $this->KomenModel->save([
            'id_foto' => $id,
            'id_user' => $this->session->get('id_user'),
            'isi_komentar' => $this->request->getVar('isi_komentar')
        ]);

        session()->setFlashdata('pesan', 'Komentar Berhasil Ditambahkan');
        return redirect()->to('/galeri/' . $id);
    }

}
