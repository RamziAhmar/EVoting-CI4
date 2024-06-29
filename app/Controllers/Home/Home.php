<?php

namespace App\Controllers\Home;

use App\Models\UserModel;
use App\Models\SuaraModel;
use App\Models\ProfileModel;
use App\Models\KandidatModel;
use App\Models\TerpilihModel;
use App\Models\PemilihanModel;
use App\Controllers\BaseController;
use App\Models\StatusPemilihanModel;
use CodeIgniter\HTTP\ResponseInterface;

class Home extends BaseController
{
    protected $pemilihan, $user, $profile, $kandidat, $suara, $status, $terpilih;

    public function __construct()
    {
        $this->pemilihan = new PemilihanModel();
        $this->profile = new ProfileModel();
        $this->kandidat = new KandidatModel();
        $this->status = new StatusPemilihanModel();
        $this->suara = new SuaraModel();
        $this->terpilih = new TerpilihModel();
    }

    public function index()
    {
        $sekarang = date('Y-m-d H:i:s');

        $pemilihanTerbaru = $this->pemilihan->getTerbaru();
        if ($pemilihanTerbaru == null) {
            $data = [
                'title' => 'Home'
            ];
            return view('home/null', $data);
        }
        $pemilihanDibuat = $pemilihanTerbaru['dibuat'];
        $pemilihanSelesai = $pemilihanTerbaru['waktu_selesai'];
        $id_pemilihan = $pemilihanTerbaru['id_pemilihan'];
        

        $kandidat = $this->kandidat->where('id_pemilihan', $id_pemilihan)->findAll();
        $dataSuara = $this->suara->where('id_pemilihan', $id_pemilihan)->findAll();
        
        if ($sekarang >= $pemilihanDibuat) {
            if ($sekarang <= $pemilihanSelesai) {
                $data = [
                    'title' => 'Home',
                    'pemilihan' => $pemilihanTerbaru,
                    'kandidatAkanDatang' => $this->kandidat->kandidatSekarang(),
                ];
                return view('home/home', $data);
            } elseif ($sekarang > $pemilihanSelesai) {
                
                $kandidatPemenang = null;
                $suaraTerbanyak = 0;
                foreach ($kandidat as $k) {
                    $jumlahSuara = $this->suara->where(['id_pemilihan' => $id_pemilihan, 'id_kandidat' => $k['id_kandidat']])->countAllResults();
                    if ($jumlahSuara > $suaraTerbanyak) {
                        $suaraTerbanyak = $jumlahSuara;
                        $kandidatPemenang = $k;
                    }
                }

                $perolehanSuara = [];
                foreach ($kandidat as $k) {
                    $jumlahSuara = $this->suara->where(['id_pemilihan' => $id_pemilihan, 'id_kandidat' => $k['id_kandidat']])->countAllResults();
                    $perolehanSuara[] = [
                        'nama_kandidat' => $k['nama_kandidat'],
                        'nama_wakil' => $k['nama_wakil'],
                        'foto' => $k['foto'],
                        'jumlah_suara' => $jumlahSuara
                    ];
                }
                $golput = $this->profile->getRow() - $this->suara->where('id_pemilihan', $id_pemilihan)->get()->getNumRows();
                // var_dump($golput);die;

                $terpilih = $this->terpilih->find($id_pemilihan);
                if ($terpilih == null) {
                    $dataTerpilih = [
                        'id_pemilihan' => $id_pemilihan,
                        'id_kandidat' => $kandidatPemenang['id_kandidat'],
                        'perolehan_suara' => $suaraTerbanyak
                    ];
                    $this->terpilih->insert($dataTerpilih);
                }

                $data = [
                    'title' => 'Beranda',
                    'perolehanSuara' => $perolehanSuara,
                    'dataSuara' => $dataSuara,
                    'kandidat' => $kandidat,
                    'kandidatPemenang' => $kandidatPemenang,
                    'suaraTerbanyak' => $suaraTerbanyak,
                    'golput' => $golput
                ];
                return view('home/suara', $data);
            }

        }
    }

    public function vote($id_kandidat, $id_pemilihan)
    {
        $status = $this->status->cekStatus($id_pemilihan);
        
        if ($status == null) {
            $dataVote = [
                'hash_nim' => sha1(session()->get('nim')['nim']),
                'id_pemilihan' => $id_pemilihan,
                'id_kandidat' => $id_kandidat
            ];
            $dataStatus = [
                'nim' => session()->get('nim')['nim'],
                'id_pemilihan' => $id_pemilihan,
                'status' => true
            ];
            $this->suara->insert($dataVote);
            $this->status->insert($dataStatus);
            session()->setFlashdata('vote', 'Terimakasih Telah Berpartisipasi!!');
            return redirect()->to('/');
        } else {
            session()->setFlashdata('hasVote', 'Anda Telah Melakukan Voting');
            return redirect()->to('/');
        }
    }

}
