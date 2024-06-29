<?php

namespace App\Database\Seeds;

use Faker\Factory;
use CodeIgniter\Database\Seeder;

class PesertaSeeder extends Seeder
{
    public function run()
    {
        $faker = Factory::create('id_ID');

        for ($i=3; $i < 103; $i++) { 
            $dataProfile = [
                'nim' => $faker->numberBetween($min = 220220000, $max = 220229999),
                'id_user' => $i,
                'nama_lengkap' => $faker->name($gender = null),
                'angkatan' => $faker->numberBetween($min = 1, $max = 20)
            ];
            $dataUser = [
                'id_user' => $i,
                'email' => $faker->email(),
                'password' => sha1('111'),
                'level' => 2
            ];
            $this->db->table('user')->insert($dataUser);
            $this->db->table('profile')->insert($dataProfile);
        }
    }
}
