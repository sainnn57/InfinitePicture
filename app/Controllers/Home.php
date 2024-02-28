<?php

namespace App\Controllers;

use App\Models\FotoModel;
use App\Models\AuthModel;

class Home extends BaseController
{

    protected $FotoModel;
    protected $AuthModel;

    public function __construct()
    {
        $this->FotoModel = new FotoModel();
        $this->AuthModel = new AuthModel();
    }

    public function index(): string
    {
        // ambil data foto
        $user = session()->get('id_user');
        $userprofile = $this->AuthModel->where('id_user', $user)->first();
        
        $data = [
            'foto' => $this->FotoModel->findAll(),
            'user' => $userprofile
        ];

        return view('user/beranda', $data);
    }
}
