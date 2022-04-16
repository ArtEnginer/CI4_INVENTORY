<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Suplai extends Migration
{
    public function up()
    {
        //
        $this->forge->addField([
            'id_suplai' => [
                'type' => 'Varchar',
                'constraint' => 12,
                'auto_increment' => false,
            ],

            'penyuplai' => [
                'type' => 'Varchar',
                'constraint' => '100',

            ],
            'tanggal' => [
                'type' => 'DATE',
                'null' => true,
            ],
            'keterangan' => [
                'type' => 'TEXT',
                'constraint' => 255,
               
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

        $this->forge->addKey('id_suplai', true);
        $this->forge->createTable('suplai');

    }

    public function down()
    {
        //
        $this->forge->dropTable('suplai');

    }
}
