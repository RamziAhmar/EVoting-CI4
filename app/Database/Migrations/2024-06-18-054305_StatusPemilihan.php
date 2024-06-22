<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class StatusPemilihan extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_status' => [
                'type' => 'INT',
                'unsigned' => true,
                'auto_increment' => true
            ],
            'nim' => [
                'type' => 'INT',
            ],
            'id_pemilihan' => [
                'type' => 'INT',
            ],
            'status' => [
                'type' => 'BOOLEAN',
            ],
        ]);

        // Membuat primary key
        $this->forge->addKey('id_status', TRUE);

        // Membuat tabel news
        $this->forge->createTable('status_pemilihan', TRUE);
    }

    public function down()
    {
        $this->forge->dropTable('status_pemilihan');
    }
}
