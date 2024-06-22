<?php

namespace App\Controllers\Home;

use App\Models\UserModel;
use App\Models\ProfileModel;
use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class Peserta extends BaseController
{
    protected $peserta;
    protected $user;
    protected $profile;

    public function __construct() 
    {
        $this->peserta = new ProfileModel();
        $this->profile = new ProfileModel;
        $this->user = new UserModel;

    }
    
    public function index()
    {
        $data = [
            'title' => 'Peserta',
            'peserta' => $this->peserta->getPeserta(),
            'rowPeserta' => $this->peserta->getRow(),
        ];
        return view('home/peserta', $data);
    }
}
