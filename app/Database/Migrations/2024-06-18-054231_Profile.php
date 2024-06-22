<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Profile extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'nim' => [
                'type' => 'INT',
                'unsigned' => true,
            ],
            'id_user' => [
                'type' => 'INT',
            ],
            'nama_lengkap' => [
                'type' => 'VARCHAR',
                'constraint' => 255
            ],
            'angkatan' => [
                'type' => 'INT',
            ],
            'foto' => [
                'type' => 'VARCHAR',
                'constraint' => 255
            ],
        ]);

        // Membuat primary key
        $this->forge->addKey('nim', TRUE);

        // Membuat tabel news
        $this->forge->createTable('profile', TRUE);
    }

    public function down()
    {
        $this->forge->dropTable('profile');
    }
}
