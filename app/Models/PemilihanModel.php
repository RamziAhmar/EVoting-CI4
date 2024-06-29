<?php

namespace App\Models;

use CodeIgniter\Model;

class PemilihanModel extends Model
{
    protected $table = 'pemilihan';
    protected $primaryKey = 'id_pemilihan';
    protected $allowedFields = ['nama_pemilihan', 'waktu_dimulai', 'waktu_selesai', 'dibuat'];

    public function getPemilihanSekarang()
    {
        $now = date('Y-m-d H:i:s');
        return $this->where('waktu_dimulai <=', $now)
            ->where('waktu_selesai >=', $now)
            ->orderBy('waktu_dimulai', 'ASC')
            ->asArray()
            ->first();
    }

    public function getTerbaru()
    {
        return $this->orderBy('dibuat', 'DESC')
            ->asArray()
            ->first();
    }

    public function getList()
    {
        return $this->orderBy('dibuat', 'DESC')
            ->get()
            ->getResult();
    }

    public function getPemilihan()
    {
        return $this->orderBy('dibuat', 'DESC');
    }    
    // public function getRiwayat()
    // {
    //     return $this->join('kandidat', 'kandidat.id_pemilihan = pemilihan.id_pemilihan')
    //     ->orderBy('pemilihan.id_pemilihan', 'DESC')
    //     ->get()
    //     ->getResult();
    // }
}
