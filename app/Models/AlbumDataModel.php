<?php

namespace App\Models;

use CodeIgniter\Model;

class AlbumDataModel extends Model
{
    protected $table      = 'albumdata';
    protected $useAutoIncrement = true;
    protected $primaryKey = 'id_data';
    protected $useTimestamps = false;
    protected $allowedFields = ['id_user', 'id_album', 'id_foto'];

    public function getAlbumData($id = false)
    {
        if ($id == false) {
            return $this->findAll();
        }

        return $this->where(['id_data' => $id])->first();
    }
}