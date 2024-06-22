<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ProfileModel;
use App\Models\UserModel;
use CodeIgniter\HTTP\ResponseInterface;

class Auth extends BaseController
{
    protected $user;
    protected $profile;

    public function __construct() {
        $this->user = new UserModel();
        $this->profile = new ProfileModel();
    }

    public function index()
    {
        return view('login');
    }

    public function proses()
    {        
        $email = $this->request->getVar('email');
        $password = sha1($this->request->getVar('password'));

        $data = $this->user->where('email', $email)->first();

        if (!$this->validate($this->user->getValidationRules())) {
            session()->setFlashdata('errors', $this->validator->listErrors());
            return redirect()->back()->withInput();
        }

        if ($password == $data['password']) {
            $profil = $this->profile->getProfilId($data['id_user']);
            $nim = $this->profile->getNim($data['id_user']);
            $simpan_session = [
                'id_user' => $data['id_user'],
                'email' => $data['email'],
                'level' => $data['level'],
                'profil' => $profil,
                'nim' => $nim,
                'logged_in' => true
            ];

            session()->set($simpan_session);
            session()->setFlashdata('sukses', ['welcome' => 'Selamat Datang']);
            if ($data['level'] == 1) {
                return redirect()->to('/admin');
            } else {
                return redirect()->to('/');
            }
        } else {
            session()->setFlashdata('error', ['gagal' => 'Email atau Password Anda Salah!!']);
            return redirect()->back()->withInput();
        }

    }

    public function logout()
    {
        $session = session();
        $session->destroy();
        session()->setFlashdata('logout', 'Anda Berhasil Logout!');
        return redirect()->to('/');
    }
}
