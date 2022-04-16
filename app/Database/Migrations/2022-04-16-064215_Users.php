<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Users extends Migration
{
    public function up()
    {
        //make tabel users
        $this->forge->addField([
            'id_user' => [
                'type' => 'Varchar',
                'constraint' => 11,
                'auto_increment' => false,
                'null' => true,
            ],
            'nm_user' => [
                'type' => 'VARCHAR',
                'constraint' => '100',
                'null' => true,
            ],
            'username' => [
                'type' => 'VARCHAR',
                'constraint' => '100',
                'null' => true,
            ],
            'password' => [
                'type' => 'VARCHAR',
                'constraint' => '100',
                'null' => true,
            ],
            'level' => [
                'type' => 'VARCHAR',
                'constraint' => '100',
                'null' => true,
            ],
            'status'=> [
                'type' => 'VARCHAR',
                'constraint' => '100',
                'null' => true,
            ],
            'created_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
            'created_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
            'updated_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
        ]);

        $this->forge->addKey('id_user', true);
        $this->forge->createTable('users');


        

    }

    public function down()
    {
        //down
        $this->forge->dropTable('users');

    }
}
