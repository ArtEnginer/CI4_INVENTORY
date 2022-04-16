<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class KeluarDetail extends Migration
{
    public function up()
    {
        //
        $this->forge->addField([

            'id_keluar' => [
                'type' => 'Varchar',
                'constraint' => 11,
                'auto_increment' => false,
                'null' => true,
            ],

            'id_barang' => [
                'type' => 'Varchar',
                'constraint' => 11,
                'auto_increment' => false,
                'null' => true,
            ],

            'jumlah' => [
                'type' => 'INT',
                'constraint' => 11,
                'auto_increment' => false,
                'null' => true,
            ],

            'spek' => [
                'type' => 'TEXT',
                'null' => true,
            ],

        ]);

        $this->forge->addKey('id_keluar', true);
        $this->forge->addKey('id_barang', true);
        $this->forge->createTable('keluar_detail');
    }

    public function down()
    {
        //
        $this->forge->dropTable('keluar_detail');
    }
}
