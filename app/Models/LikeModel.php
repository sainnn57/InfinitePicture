<?php

namespace App\Models;

use CodeIgniter\Model;

class LikeModel extends Model
{
    protected $table      = 'likefoto';
    protected $useAutoIncrement = true;
    protected $primaryKey = 'id_like';
    protected $useTimestamps = false;
    protected $allowedFields = ['id_like', 'id_foto', 'id_user'];

    public function getLike($id = false)
    {
        if ($id == false) {
            return $this->findAll();
        }

        return $this->where(['id_like' => $id])->first();
    }
}