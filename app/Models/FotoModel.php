<?php

namespace App\Models;

use CodeIgniter\Model;

class FotoModel extends Model
{
    protected $table      = 'foto';
    protected $useAutoIncrement = true;
    protected $primaryKey = 'id_foto';
    protected $useTimestamps = false;
    protected $allowedFields = ['judul_foto', 'deskripsi_foto', 'tanggal_unggahan', 'lokasi_file', 'id_album', 'id_user'];

    public function getFoto($id = false)
    {
        if ($id == false) {
            return $this->findAll();
        }

        return $this->where(['id_foto' => $id])->first();
    }
}