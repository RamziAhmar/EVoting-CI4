<?php

namespace App\Models;

use CodeIgniter\Model;

class StatusPemilihanModel extends Model
{
    protected $table = 'status_pemilihan';
    protected $primaryKey = 'id_status';
    protected $allowedFields = ['nim', 'id_pemilihan', 'status'];

    public function ambilSemua()
    {
        $builder = $this->db->table('status_pemilihan');
        $builder->join('profile', 'status_pemilihan.nim = profile.nim')->join('pemilihan', 'status_pemilihan.id_pemilihan = pemilihan.id_pemilihan');
        $query = $builder->get();

        return $query->getResult();
    }

    public function cekStatus($id_pemilihan)
    {
        $nim = session()->get('nim')['nim'];
        return $this->join('pemilihan', 'status_pemilihan.id_pemilihan = pemilihan.id_pemilihan')->join('profile', 'status_pemilihan.nim = profile.nim')->where('status_pemilihan.nim', $nim)->where('status_pemilihan.id_pemilihan', $id_pemilihan)->first();
    }

}
