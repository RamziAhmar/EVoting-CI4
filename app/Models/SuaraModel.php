<?php

namespace App\Models;

use CodeIgniter\Model;

class SuaraModel extends Model
{
    protected $table            = 'suara';
    protected $primaryKey       = 'id_suara';
    protected $allowedFields    = ['hash_nim', 'id_pemilihan', 'id_kandidat'];

    public function ambilSemua()
    {
        $builder = $this->db->table('suara');
        $builder->join('pemilihan', 'suara.id_pemilihan = pemilihan.id_pemilihan')
        ->join('kandidat', 'suara.id_kandidat = kandidat.id_kandidat');
        $query = $builder->get();

        return $query->getResult();
    }
    
    public function hitungSuara($id_pemilihan)
    {
        return $this->join('pemilihan', 'suara.id_pemilihan = pemilihan.id_pemilihan')
            ->join('kandidat', 'suara.id_kandidat = kandidat.id_kandidat')
            ->where('suara.id_pemilihan', $id_pemilihan)->get()->getResult();
    }
}
