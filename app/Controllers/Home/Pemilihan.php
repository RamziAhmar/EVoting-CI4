<?php

namespace App\Controllers\Home;

use DateTime;
use App\Models\UserModel;
use App\Models\SuaraModel;
use App\Models\ProfileModel;
use App\Models\KandidatModel;
use App\Models\PemilihanModel;
use App\Controllers\BaseController;
use App\Models\StatusPemilihanModel;
use CodeIgniter\HTTP\ResponseInterface;

class Pemilihan extends BaseController
{
    protected $pemilihan;
    protected $user;
    protected $profile;
    protected $kandidat;
    protected $status;
    protected $suara;

    public function __construct()
    {
        $this->pemilihan = new PemilihanModel();
        $this->profile = new ProfileModel;
        $this->kandidat = new KandidatModel;
        $this->status = new StatusPemilihanModel;
        $this->suara = new SuaraModel;
    }
    public function index()
    {
        $riwayat = $this->pemilihan->getList();
        $no =1;
        foreach ($riwayat as $r) {
            $kandidat = $this->kandidat->find($r->id_pemilihan);
        }

        $data = [
            'title' => 'Pemilihan',
            'pemilihan' => $riwayat,
            'kandidat' => $kandidat,
        ];
        // var_dump($riwayat);die;
        return view('home/pemilihan', $data);
    }
}
