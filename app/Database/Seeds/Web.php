<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class Web extends Seeder
{
    public function run()
    {
        //
        $data = [
            'id_web' => '1',
            'nm_web' => 'IMS-Item Management System',
            'alamat' => 'Jl.Raya Bumiayu, 01/01, Kel.Bumiayu, Kab. Brebes, 52272',
            'email' => 'admin@gmail.com',
            'telp' => '098765432',
            'min_stok' => '2',
            'logo' => 'logo.png',
            'created_at' => null,
            'updated_at' => null,
        ];

        // Simple Queries
        $this->db->query("INSERT INTO web (id_web,nm_web,alamat,email,telp,min_stok,logo,created_at,updated_at) VALUES(:id_web:, :nm_web:, :alamat:, :email:, :telp:, :min_stok:,:logo:, :created_at:, :updated_at:)", $data);

        // Using Query Builder
        $this->db->table('web')->insert($data);
    }
}
