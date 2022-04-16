<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class Users extends Seeder
{
    public function run()
    {
        //
        $data = [
            'id_user' => '1',
            'nm_user' => 'Rico',
            'username' => 'admin',
            'password' => '$2y$10$fnUd/srAXkxfFSWGBr0QAugnT5jRQyGq.QnxolbMg4lXMM5L9XGeS',
            'level' => 'admin',
            'status' => 'Aktif',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ];

        // Simple Queries
        $this->db->query("INSERT INTO users VALUES(:id_user, :nm_user, :username, :password, :level, :status, :created_at, :updated_at)", $data);

        // Using Query Builder
        $this->db->table('users')->insert($data);
    }



}
