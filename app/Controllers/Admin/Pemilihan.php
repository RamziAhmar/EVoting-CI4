<?php

namespace App\Controllers\Admin;

use App\Models\UserModel;
use App\Models\ProfileModel;
use App\Models\PemilihanModel;
use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class Pemilihan extends BaseController
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
            'page' => 'Master Data',
            'title' => 'Pemilihan',
            'subtitle' => '',
            'pemilihan' => $this->pemilihan->findAll(),
        ];
        return view('admin/pemilihan', $data);
    }

    public function view()
    {
        $data = [
            'pemilihan' => $this->pemilihan->findAll()
        ];
        return view('home/pemilihan');
    }

    public function insert()
    {
        $data = [
            'nama_pemilihan' => $this->request->getVar('nama_pemilihan'),
            'waktu_dimulai' => $this->request->getVar('waktu_dimulai'),
            'waktu_selesai' => $this->request->getVar('waktu_selesai'),
            'dibuat' => date('Y-m-d H-i-s'),
        ];
        $this->pemilihan->insert($data);
        session()->setFlashdata('pesan', 'Data Berhasil Ditambahkan!!');
        return redirect()->to('/admin/pemilihan');
    }

    public function update($id)
    {
        $data = [
            'nama_pemilihan' => $this->request->getVar('nama_pemilihan'),
            'waktu_dimulai' => $this->request->getVar('waktu_dimulai'),
            'waktu_selesai' => $this->request->getVar('waktu_selesai'),
        ];

        $this->pemilihan->update($id, $data);
        session()->setFlashdata('pesan', 'Data Berhasil Ditambahkan!!');
        return redirect()->to('/admin/pemilihan');
    }

    public function delete($id)
    {
        $this->pemilihan->delete($id);

        session()->setFlashdata('pesan', 'Data Berhasil Ditambahkan!!');
        return redirect()->to('/admin/pemilihan');
    }
}
