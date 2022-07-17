<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;



class Users extends Seeder
{

    function data()
    {
        //
        $data = [
            'id_user' => 'AD001',
            'nm_user' => 'Rico',
            'username' => 'admin',
            'password' => password_hash('admin', PASSWORD_DEFAULT),
            'level' => 'Admin',
            'status' => 'Aktif',
            'created_at' => null,
            'updated_at' => null,
        ];

        // // Simple Queries
        // $this->db->query("INSERT INTO users (id_user,nm_user,username,password,level,status,created_at,updated_at) VALUES(:id_user:, :nm_user:, :username:, :password:, :level:, :status:, :created_at:, :updated_at:)", $data);

        // Using Query Builder
        $this->db->table('users')->insert($data);
    }


    public function run()
    {
        $this->data();
    }
}
