<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Terpilih extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_terpilih' => [
                'type' => 'INT',
                'unsigned' => true,
                'auto_increment' => true
            ],
            'id_pemilihan' => [
                'type' => 'INT',
            ],
            'id_kandidat' => [
                'type' => 'INT'
            ],
            'perolehan_suara' => [
                'type' => 'INT',
            ],
        ]);

        // Membuat primary key
        $this->forge->addKey('id_terpilih', TRUE);

        // Membuat tabel news
        $this->forge->createTable('terpilih', TRUE);
    }

    public function down()
    {
        $this->forge->dropTable('terpilih');
    }
}
