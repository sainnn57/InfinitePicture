<?php

namespace App\Models;

use CodeIgniter\Model;

class AuthModel extends Model
{
    protected $table      = 'user';
    protected $useAutoIncrement = true;
    protected $primaryKey = 'id_user';
    protected $allowedFields = ['nama_lengkap', 'username', 'email', 'password', 'alamat', 'foto', 'active'];

    public function getUser($id = false)
    {
        if ($id == false) {
            return 'tidak ada user';
        }

        return $this->where(['id_user' => $id])->first();
    }
}