<?php

namespace App\Controllers\Admin;

use App\Models\UserModel;
use App\Models\ProfileModel;
use App\Models\KandidatModel;
use App\Models\PemilihanModel;
use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class Kandidat extends BaseController
{
    protected $kandidat;
    protected $pemilihan;
    protected $user;
    protected $profile;
    public function __construct()
    {
        $this->kandidat = new KandidatModel();
        $this->pemilihan = new PemilihanModel();
        $this->profile = new ProfileModel;
        $this->user = new UserModel;

    }
    public function index()
    {
        $data = [
            'page' => 'Master Data',
            'title' => 'Kandidat',
            'subtitle' => '',
            'kandidat' => $this->kandidat->joinPemilihan(),
            'pemilihan' => $this->pemilihan->findAll(),
        ];
        return view('admin/kandidat', $data);
    }

    public function insert()
    {
        $foto = $this->request->getFile('foto');
        $filename = $foto->getRandomName();
        $foto->move(ROOTPATH . 'public/image/kandidat/', $filename);
        $data = [
            'id_pemilihan' => $this->request->getVar('id_pemilihan'),
            'nama_kandidat' => $this->request->getVar('nama_kandidat'),
            'nama_wakil' => $this->request->getVar('nama_wakil'),
            'visi' => $this->request->getVar('visi'),
            'misi' => $this->request->getVar('misi'),
            'foto' => $filename
        ];

        $this->kandidat->insert($data);
        session()->setFlashdata('pesan', 'Data Berhasil Ditambahkan!!');
        return redirect()->to('/admin/kandidat');
    }

    public function update($id)
    {
        $foto = $this->request->getFile('foto');
        $filename = $foto->getRandomName();
        $foto->move(ROOTPATH . 'public/image/kandidat/', $filename);
        $data = [
            'id_pemilihan' => $this->request->getVar('id_pemilihan'),
            'nama_kandidat' => $this->request->getVar('nama_kandidat'),
            'nama_wakil' => $this->request->getVar('nama_wakil'),
            'visi' => $this->request->getVar('visi'),
            'misi' => $this->request->getVar('misi'),
            'foto' => $filename
        ];

        $this->kandidat->update($id, $data);
        session()->setFlashdata('pesan', 'Data Berhasil Ditambahkan!!');
        return redirect()->to('/admin/kandidat');
    }

    public function delete($id)
    {
        $this->kandidat->delete($id);

        session()->setFlashdata('pesan', 'Data Berhasil Ditambahkan!!');
        return redirect()->to('/admin/kandidat');
    }
}
