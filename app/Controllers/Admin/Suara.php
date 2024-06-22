<?php

namespace App\Controllers\Admin;

use App\Models\UserModel;
use App\Models\SuaraModel;
use App\Models\ProfileModel;
use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class Suara extends BaseController
{
    protected $suara;

    public function __construct() 
    {
        $this->suara = new SuaraModel();
        $this->profile = new ProfileModel;
        $this->user = new UserModel;

    }
    public function index()
    {
        $data = [
            'page' => 'Master Data',
            'title' => 'Suara',
            'subtitle' => '',
            'suara' => $this->suara->ambilSemua(),
        ];
        return view('admin/suara', $data);
    }
}
