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
            'gambar' => [
                'type' => 'VARCHAR',
                'constraint' => '100',
                'null' => true,
            ],
            'status' => [
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

        //Tabel Barang musnah
        $this->forge->addField([
            'id_barang_musnah' => [
                'type' => 'Varchar',
                'constraint' => 12,
                'auto_increment' => false,
                'null' => true,
            ],
            'id_barang' => [
                'type' => 'Varchar',
                'constraint' => 12,
                'null' => true,
            ],
            'kode_barang' => [
                'type' => 'Varchar',
                'constraint' => 255,
                'null' => true,
            ],
            'jumlah' => [
                'type' => 'INT',
                'constraint' => 11,
                'null' => true,
            ],
            'keterangan' => [
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

        $this->forge->addKey('id_barang_musnah', true);
        $this->forge->createTable('barang_musnah');


    }

    public function down()
    {
        //
        $this->forge->dropTable('barang');
        $this->forge->dropTable('barang_musnah');
    }
}
