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
                'constraint' => 12,
                'null' => false,
            ],

            'id_barang' => [
                'type' => 'Varchar',
                'constraint' => 11,
                'null' => false,
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
        // Create an index on column 
        // alter index using bitree
        // choice INDEX
        $this->forge->addKey('id_keluar');
        $this->forge->addKey('id_barang');

        $this->forge->createTable('keluar_detail');
    }

    public function down()
    {



        $this->forge->dropTable('keluar_detail');
    }
}
