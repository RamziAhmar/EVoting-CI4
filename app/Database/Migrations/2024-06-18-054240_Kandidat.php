<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Kandidat extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_kandidat' => [
                'type' => 'INT',
                'unsigned' => true,
                'auto_increment' => true
            ],
            'id_pemilihan' => [
                'type' => 'INT',
            ],
            'nama_kandidat' => [
                'type' => 'VARCHAR',
                'constraint' => 255
            ],
            'nama_wakil' => [
                'type' => 'VARCHAR',
                'constraint' => 255
            ],
            'visi' => [
                'type' => 'text',
            ],
            'misi' => [
                'type' => 'text',
            ],
            'foto' => [
                'type' => 'VARCHAR',
                'constraint' => 255
            ],
        ]);

        // Membuat primary key
        $this->forge->addKey('id_kandidat', TRUE);

        // Membuat tabel news
        $this->forge->createTable('kandidat', TRUE);
    }

    public function down()
    {
        $this->forge->dropTable('kandidat');
    }
}
