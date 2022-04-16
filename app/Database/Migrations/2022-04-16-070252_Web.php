<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Web extends Migration
{
    public function up()
    {
        //
        $this->forge->addField([
            'id_web' => [
                'type' => 'Varchar',
                'constraint' => 11,
                'null' => true,
                'auto_increment' => false,
            ],

            'nm_web' => [
                'type' => 'Varchar',
                'constraint' => 255,
                'null' => true,
            ],

            'alamat' => [
                'type' => 'Varchar',
                'constraint' => 255,
                'null' => true,
            ],
            'email' => [
                'type' => 'Varchar',
                'constraint' => 255,
                'null' => true,
            ],
            'telp' => [
                'type' => 'Varchar',
                'constraint' => 255,
                'null' => true,
            ],

            'min_stok' => [
                'type' => 'Varchar',
                'constraint' => 255,
                'null' => true,
            ],

            'logo' => [
                'type' => 'Varchar',
                'constraint' => 100,
                'null' => true,
            ],

            'created_at' => [
                'type' => 'DATETIME',
                'null' => true
            ],
            'updated_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
        ]);
        $this->forge->addKey('id_web', true);
        $this->forge->createTable('web');
    }

    public function down()
    {

        $this->forge->dropTable('web');
    }
}
