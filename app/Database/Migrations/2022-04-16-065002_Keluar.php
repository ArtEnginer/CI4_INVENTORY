<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Keluar extends Migration
{
    public function up()
    {
        //
        $this->forge->addField([
            'id_keluar' => [
                'type' => 'Varchar',
                'constraint' => 12,
                'auto_increment' => false,
                'null' => true,
            ],

            'tanggal' => [
                'type' => 'DATE',
                'null' => true,
            ],

            'keterangan' => [
                'type' => 'TEXT',
                'constraint' => 255,
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

        $this->forge->addKey('id_keluar', true);
        $this->forge->createTable('keluar');
    }

    public function down()
    {
        //
        $this->forge->dropTable('keluar');
    }
}
