<?php

namespace App\Controllers\Admin;

use App\Models\UserModel;
use App\Models\ProfileModel;
use App\Models\PemilihanModel;
use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class Home extends BaseController
{
    protected $pemilihan;
    protected $user;
    protected $profile;
    public function __construct()
    {
        $this->pemilihan = new PemilihanModel();
        $this->profile = new ProfileModel;
        $this->user = new UserModel;

    }
    public function index()
    {
        $data = [
            'title' => 'Home',
            'pemilihanAkanDatang' => $this->pemilihan->orderBy('waktu_dimulai', 'DESC')->first(),
        ];
        return view('home/home', $data);
    }
}
