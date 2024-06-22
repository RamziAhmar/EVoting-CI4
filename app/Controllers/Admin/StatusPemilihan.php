<?php

namespace App\Controllers\Admin;

use App\Models\UserModel;
use App\Models\ProfileModel;
use App\Controllers\BaseController;
use App\Models\StatusPemilihanModel;
use CodeIgniter\HTTP\ResponseInterface;

class StatusPemilihan extends BaseController
{
    protected $status;

    public function __construct() 
    {
        $this->status = new StatusPemilihanModel();
        $this->profile = new ProfileModel;
        $this->user = new UserModel;

    }
    public function index()
    {
        $data = [
            'page' => 'Master Data',
            'title' => 'Status Pemilihan',
            'subtitle' => '',
            'status' => $this->status->ambilSemua(),
        ];
        return view('admin/status_pemilihan', $data);
    }
}
