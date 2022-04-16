<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;


class Users extends Seeder
{
    function data()
    {
        //
        $data = [
            'id_user' => 'AD003',
            'nm_user' => 'Rico',
            'username' => 'operator',
            'password' => '$2y$10$fnUd/srAXkxfFSWGBr0QAugnT5jRQyGq.QnxolbMg4lXMM5L9XGeS',
            'level' => 'operator',
            'status' => 'Aktif',
            'created_at' => null,
            'updated_at' => null,
        ];

        // Simple Queries
        $this->db->query("INSERT INTO users (id_user,nm_user,username,password,level,status,created_at,updated_at) VALUES(:id_user:, :nm_user:, :username:, :password:, :level:, :status:, :created_at:, :updated_at:)", $data);

        // Using Query Builder
        $this->db->table('users')->insert($data);
    }
    function data1()
    {
        //
        $data = [
            'id_user' => 'AD004',
            'nm_user' => 'Rico',
            'username' => 'operator',
            'password' => '$2y$10$fnUd/srAXkxfFSWGBr0QAugnT5jRQyGq.QnxolbMg4lXMM5L9XGeS',
            'level' => 'operator',
            'status' => 'Aktif',
            'created_at' => null,
            'updated_at' => null,
        ];

        // Simple Queries
        $this->db->query("INSERT INTO users (id_user,nm_user,username,password,level,status,created_at,updated_at) VALUES(:id_user:, :nm_user:, :username:, :password:, :level:, :status:, :created_at:, :updated_at:)", $data);

        // Using Query Builder
        $this->db->table('users')->insert($data);
    }


    public function run()
    {
        $this->data();
        $this->data1();
    }
}
