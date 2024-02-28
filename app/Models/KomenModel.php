<?php

namespace App\Models;

use CodeIgniter\Model;

class KomenModel extends Model
{
    protected $table      = 'komentarfoto';
    protected $useAutoIncrement = true;
    protected $primaryKey = 'id_komentar';
    protected $useTimestamps = false;
    protected $allowedFields = ["id_user", "id_foto", "isi_komentar", "tanggal_komentar"];

    public function getKomentar($id = false)
    {
        if ($id == false) {
            return $this->findAll();
        }

        return $this->where(['id_komentar' => $id])->first();
    }
}
