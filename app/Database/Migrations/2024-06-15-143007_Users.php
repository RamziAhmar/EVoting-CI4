<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Users extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_user' => [
                'type' => 'INT',
                'unsigned' => true,
                'auto_increment' => true
            ],
            'email' => [
                'type' => 'VARCHAR',
                'constraint' => 50,
                'unique' => true
            ],
            'password' => [
                'type' => 'VARCHAR',
                'constraint' => 255
            ],
            'level' => [
                'type' => 'INT',
                'constraint' => 1
            ],
        ]);

        // Membuat primary key
        $this->forge->addKey('id_user', TRUE);

        // Membuat tabel news
        $this->forge->createTable('user', TRUE);
    }

    public function down()
    {
        $this->forge->dropTable('user');
    }
}
