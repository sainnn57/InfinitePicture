<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\FotoModel;
use App\Models\AuthModel;
use App\Models\LikeModel;
use App\Models\KomenModel;
use App\Models\AlbumModel;
use App\Models\AlbumDataModel;

class Start extends BaseController
{

    protected $FotoModel;
    protected $AuthModel;
    protected $LikeModel;
    protected $KomenModel;
    protected $AlbumModel;
    protected $AlbumDataModel;
    protected $session;

    public function __construct()
    {
        $this->FotoModel = new FotoModel();
        $this->AuthModel = new AuthModel();
        $this->LikeModel = new LikeModel();
        $this->KomenModel = new KomenModel();
        $this->AlbumModel = new AlbumModel();
        $this->AlbumDataModel = new AlbumDataModel();
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

        $album = $this->AlbumModel->where('id_user', $user)->findAll();

        $data = [
            'album' => $album,
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

        $id_foto = $this->FotoModel->insertID();

        $this->AlbumDataModel->save([
            'id_album' => '1',
            'id_user' => $this->session->get('id_user'),
            'id_foto' => $id_foto
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
        $jumlahLike = $this->LikeModel->where(['id_foto' => $id])->countAllResults();

        $takeIdAlbum = $this->AlbumDataModel->where(['id_foto' => $id])->findAll();

        $idAlbum = array_column($takeIdAlbum, 'id_album');

        $albumAdd = $this->AlbumModel->whereNotIn('id_album', $idAlbum)->where(['id_user' => $ses])->findAll();

        $albumDel = $this->AlbumModel->whereIn('id_album', $idAlbum)->where(['id_user' => $ses])->findAll();

        $data = [
            'foto' => $this->FotoModel->find($id),
            'user' => $userprofile,
            'uploader' => $uploader,
            'liked' => $liked,
            'jumlahLike' => $jumlahLike,
            'ses' => $ses,
            'komen' => $komen,
            'albumAdd' => $albumAdd,
            'albumDel' => $albumDel

        ];
        return view('user/galeri', $data);
    }

    public function edit($id)
    {
        $user = session()->get('id_user');
        $komen = $this->KomenModel->where(['id_foto' => $id])->findAll();
        $foto = $this->FotoModel->find($id);
        $uploader = $this->AuthModel->getUser($foto['id_user']);
        $ses = session()->get('id_user');
        $liked = $this->LikeModel->where(['id_foto' => $id, 'id_user' => $ses])->first();

        $data = [
            'liked' => $liked,
            'foto' => $foto,
            'uploader' => $uploader,
            'komen' => $komen,
            'ses' => $ses,
            'user' => $this->AuthModel->where('id_user', $user)->first()
        ];

        return view('user/editgaleri', $data);
    }

    public function  updategaleri($id)
    {

        $fileDokumen = $this->request->getFile('foto');

        if (
            $fileDokumen->getError()
            == 4
        ) {
            $newName = $this->FotoModel->where('id_foto', $id)->first()['lokasi_file'];
        } else {
            $newName = $fileDokumen->getRandomName();
            $fileDokumen->move('foto_storage', $newName);
        }

        $this->FotoModel->save([
            'id_foto' => $id,
            'judul_foto' => $this->request->getVar('title'),
            'deskripsi_foto' => $this->request->getVar('desk'),
            'lokasi_file' => $newName,
        ]);

        session()->setFlashdata('pesan', 'Data Berhasil Diubah');
        return redirect()->to('/galeri/' . $id);
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

    public function albumsave()
    {
        // ambil gambar
        $fileDokumen = $this->request->getFile('foto');
        $newName = $fileDokumen->getRandomName();
        $fileDokumen->move('cover_storage', $newName);

        $this->AlbumModel->save([
            'id_user' => $this->session->get('id_user'),
            'nama_album' => $this->request->getVar('nama'),
            'deskripsi' => $this->request->getVar('desk'),
            'cover' => $newName
        ]);

        session()->setFlashdata('pesan', 'Album Berhasil Ditambahkan');
        return redirect()->to('/home');
    }

    public function savetoalbum($id_foto)
    {
        $this->AlbumDataModel->save([
            'id_album' => $this->request->getVar('saveto'),
            'id_user' => $this->session->get('id_user'),
            'id_foto' => $id_foto
        ]);

        session()->setFlashdata('pesan', 'Foto Berhasil Ditambahkan ke Album' );
        return redirect()->to('/galeri/' . $id_foto);
    }

    public function deletealbum($id)
    {
        // ambil data dari form
        $id_album = $this->request->getVar('delfrom');

        // hapus data dari tabel albumdata yang id_foto dama dengan $takeFoto dan id_album sama dengan $takeAlbum
        $this->AlbumDataModel->where(['id_foto' => $id, 'id_album' => $id_album])->delete();

        session()->setFlashdata('pesan', 'Foto Berhasil Dihapus Dari Album');
        return redirect()->to('/galeri/' . $id);
    }

    public function album($id)
    {

        $user = session()->get('id_user');


        $album = $this->AlbumModel->find($id);
        $take = $this->AlbumDataModel->where(['id_album' => $id])->findAll();

        // ambil id_foto dari $take
        $id_foto = array_column($take, 'id_foto');

        // ambil data foto dari id_foto yang sama dengan id_foto di $take
        if (empty($id_foto)) {
            session()->setFlashdata('pesan', 'Album :' . $album['nama_album'] . ' Masih Kosong');
            return redirect()->back();
        }

        $foto = $this->FotoModel->whereIn('id_foto', $id_foto)->findAll();

        $data = [
            'album' => $album,
            'foto' => $foto,
            'user' => $this->AuthModel->where('id_user', $user)->first()
        ];


        return view('user/album', $data);
    }

    public function profilelike()
    {
        $user = session()->get('id_user');
        $userprofile = $this->AuthModel->where('id_user', $user)->first();

        $like = $this->LikeModel->where('id_user', $user)->findAll();

        // ambil foto yang di like oleh user yang sedang login
        $id_foto = array_column($like, 'id_foto');
        $foto = $this->FotoModel->whereIn('id_foto', $id_foto)->findAll();

        $data = [
            'like' => $like,
            'user' => $userprofile,
            'post' => $foto

        ];
        return view('user/profilelike', $data);
    }

    public function profilepost()
    {
        $user = session()->get('id_user');
        $userprofile = $this->AuthModel->where('id_user', $user)->first();

        $foto = $this->FotoModel->where('id_user', $user)->findAll();

        $data = [
            'post' => $foto,
            'user' => $userprofile
        ];
        return view('user/profilepost', $data);
    }


}
