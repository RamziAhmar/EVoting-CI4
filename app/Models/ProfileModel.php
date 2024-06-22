<?php

namespace App\Models;

use CodeIgniter\Model;

class ProfileModel extends Model
{
    protected $table = 'profile';
    protected $primaryKey = 'nim';
    protected $allowedFields = ['nim', 'id_user', 'nama_lengkap', 'angkatan', 'foto'];

    public function getPeserta()
    {
        $builder = $this->db->table('profile');
        $builder->join('user', 'profile.id_user = user.id_user');
        $query = $builder->getWhere(['level' => 2]);

        return $query->getResult();
    }

    public function getRow()
    {
        $builder = $this->db->table('profile');
        $builder->join('user', 'profile.id_user = user.id_user');
        $query = $builder->getWhere(['level' => 2]);

        return $query->getNumRows();
    }

    public function getProfilId($userId)
    {
        return $this->where('id_user', $userId)->first();
    }

    public function getNim($id_user)
    {
        return $this->select('*')
            ->join('user', 'user.id_user = profile.id_user')
            ->where('profile.id_user', $id_user)
            ->first();
        
    }
}
