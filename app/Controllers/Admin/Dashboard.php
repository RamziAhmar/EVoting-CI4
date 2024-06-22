<?php

namespace App\Controllers\Admin;

use App\Models\UserModel;
use App\Models\ProfileModel;
use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class Dashboard extends BaseController
{
    protected $profile;
    protected $user;

    public function __construct()
    {
        $this->profile = new ProfileModel;
        $this->user = new UserModel;
    }
    public function index()
    {
        $data = [
            'page' => '',
            'title' => 'Dashboard',
            'subtitle' => '',
        ];
        return view('admin/dashboard', $data);
    }
}
