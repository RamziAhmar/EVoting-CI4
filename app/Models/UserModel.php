<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table            = 'user';
    protected $primaryKey       = 'id_user';
    protected $allowedFields    = ['email', 'password', 'level'];

    protected $validationRules  = [
        'email' => 'required',
        'password' => 'required'
    ];

    public function getProfil()
    {
        $builder = $this->db->table('user');
        $builder->join('profile', 'user.id_user = profile.id_user');
        $query = $builder->getWhere(['profile.id_user' => session()->get('id_user')]);

        return $query->getResult();
    }
}
