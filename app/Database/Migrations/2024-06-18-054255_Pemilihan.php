<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Pemilihan extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_pemilihan' => [
                'type' => 'INT',
                'unsigned' => true,
                'auto_increment' => true
            ],
            'nama_pemilihan' => [
                'type' => 'VARCHAR',
                'constraint' => 255
            ],
            'waktu_dimulai' => [
                'type' => 'DATETIME',
            ],
            'waktu_selesai' => [
                'type' => 'DATETIME',
            ],
            'dibuat' => [
                'type' => 'DATETIME',
            ],
        ]);

        // Membuat primary key
        $this->forge->addKey('id_pemilihan', TRUE);

        // Membuat tabel news
        $this->forge->createTable('pemilihan', TRUE);
    }

    public function down()
    {
        $this->forge->dropTable('pemilihan');
    }
}
