<?php

namespace App\Models;

use CodeIgniter\Model;

class KandidatModel extends Model
{
    protected $table            = 'kandidat';
    protected $primaryKey       = 'id_kandidat';
    protected $allowedFields    = ['id_pemilihan', 'nama_kandidat', 'nama_wakil', 'visi', 'misi', 'foto'];

    public function joinPemilihan()
    {
        $builder = $this->db->table('kandidat');
        $builder->join('pemilihan', 'kandidat.id_pemilihan = pemilihan.id_pemilihan');
        $query = $builder->get();

        return $query->getResult();
    }

    public function kandidatSekarang()
    {
        $sekarang = date('Y-m-d H:i:s');
        return $this->join('pemilihan', 'kandidat.id_pemilihan = pemilihan.id_pemilihan')
        ->where('waktu_selesai >', $sekarang)->where('dibuat <', $sekarang)->get()->getResult();
    }

    public function hitungSuara($id_pemilihan)
    {
        return $this->join('pemilihan', 'kandidat.id_pemilihan = pemilihan.id_pemilihan')
            ->join('suara', 'suara.id_kandidat = kandidat.id_kandidat')
            ->where('kandidat.id_pemilihan', $id_pemilihan)
            ->get()
            ->getResult();
    }
    
    public function getRiwayat()
    {
        return $this->join('pemilihan', 'kandidat.id_pemilihan = pemilihan.id_pemilihan')
            ->orderBy('pemilihan.id_pemilihan', 'DESC')
            ->get()
            ->getResult();
    }
}
