<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\ProfileModel;
use App\Models\UserModel;
use CodeIgniter\HTTP\ResponseInterface;

class User extends BaseController
{
    protected $user;
    protected $profile;
    public function __construct()
    {
        $this->user = new UserModel();
        $this->profile = new ProfileModel();
    }
    public function index()
    {
        $user = $this->user->findAll();

        $data = [
            'page' => 'Master Data',
            'title' => 'User',
            'subtitle' => '',
            'user' => $user,
        ];
        return view('admin/user', $data);
    }

    public function insert()
    {
        $dataUser = [
            'email' => $this->request->getVar('email'),
            'password' => sha1($this->request->getVar('password')),
            'level' => $this->request->getVar('level')
        ];
        $user = $this->user->insert($dataUser);

        $foto = $this->request->getFile('foto');
        $filename = $foto->getRandomName();
        $foto->move(ROOTPATH . 'public/image/profil/', $filename);

        $dataProfil = [
            'nim' => $this->request->getVar('nim'),
            'id_user' => $user,
            'nama_lengkap' => $this->request->getVar('nama_lengkap'),
            'angkatan' => $this->request->getVar('angkatan'),
            'foto' => $filename,
        ];
        $this->profile->insert($dataProfil);

        session()->setFlashdata('pesan', 'Data Berhasil Ditambahkan!!');
        
        return redirect()->to('/admin/user');
    }

    public function update($id)
    {
        $data = [
            'email' => $this->request->getVar('email'),
            'level' => $this->request->getVar('level')
        ];

        session()->setFlashdata('pesan', 'Data Berhasil Ditambahkan!!');
        $this->user->update($id, $data);
        return redirect()->to('/admin/user');
    }

    public function delete($id)
    {
        $this->user->delete($id);

        session()->setFlashdata('pesan', 'Data Berhasil Ditambahkan!!');
        return redirect()->to('/admin/user');
    }
}
