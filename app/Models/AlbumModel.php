<?php

namespace App\Models;

use CodeIgniter\Model;

class AlbumModel extends Model
{
    protected $table      = 'album';
    protected $useAutoIncrement = true;
    protected $primaryKey = 'id_album';
    protected $useTimestamps = false;
    protected $allowedFields = ['id_user', 'nama_album', 'deskripsi', 'cover'];

    public function getAlbum($id = false)
    {
        if ($id == false) {
            return $this->findAll();
        }

        return $this->where(['id_album' => $id])->first();
    }
}