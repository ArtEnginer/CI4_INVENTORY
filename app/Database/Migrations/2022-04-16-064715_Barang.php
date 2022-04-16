<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Barang extends Migration
{
    public function up()
    {
        //make tabel barang
        $this->forge->addField([
            'id_barang' => [
                'type' => 'Varchar',
                'constraint' => 12,
                'auto_increment' => false,
                'null' => true,
            ],
            'nm_barang' => [
                'type' => 'VARCHAR',
                'constraint' => '100',
                'null' => true,
            ],
            'spek' => [
                'type' => 'VARCHAR',
                'constraint' => '100',
                'null' => true,
            ],
            'satuan' => [
                'type' => 'VARCHAR',
                'constraint' => '100',
                'null' => true,
            ],
            'stok' => [
                'type' => 'VARCHAR',
                'constraint' => '100',
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

        $this->forge->addKey('id_barang', true);
        $this->forge->createTable('barang');
    }

    public function down()
    {
        //
        $this->forge->dropTable('barang');
    }
}
