<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run()
    {
        $dataUser = [
            
            'email'         => 'ramziahmar@gmail.com',
            'password'      => sha1('111'),
            'level'         => 1
        ];
        $dataProfile = [
            'nim'           => '220220015',
            'id_user'       => 1,
            'nama_lengkap'  => 'Ahmar Ramzi Sanjaya',
            'angkatan'      => '14',    
            'foto'          => 'deafult.jpg'
        ];
        
        $this->db->table('user')->insertBatch($dataUser);
        $this->db->table('profile')->insertBatch($dataProfile);
    }
}
