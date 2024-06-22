<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Suara extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_suara' => [
                'type' => 'INT',
                'unsigned' => true,
                'auto_increment' => true
            ],
            'hash_nim' => [
                'type' => 'VARCHAR',
                'constraint' => 255
            ],
            'id_pemilihan' => [
                'type' => 'INT',
            ],
            'id_kandidat' => [
                'type' => 'INT',
            ],
        ]);

        // Membuat primary key
        $this->forge->addKey('id_suara', TRUE);

        // Membuat tabel news
        $this->forge->createTable('suara', TRUE);
    }

    public function down()
    {
        $this->forge->dropTable('suara');
    }
}
