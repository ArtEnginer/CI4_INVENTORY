<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class SuplaiDetail extends Migration
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

            'id_barang' => [
                'type' => 'Varchar',
                'constraint' => 12,
                'auto_increment' => false,
            ],
            'jumlah'=>[
                'type'=>'INT',
                'constraint'=>11,
                'auto_increment'=>false,
            ],

           
        ]);

        $this->forge->addKey('id_suplai', true);
        $this->forge->addKey('id_barang', true);
        $this->forge->createTable('suplai_detail');
        

    }

    public function down()
    {
        //
        $this->forge->dropTable('suplai_detail');
    }
}
