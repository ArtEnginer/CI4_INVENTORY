<?php

namespace App\Models;

use CodeIgniter\Model;

class WebModel extends Model
{
    protected $table = 'web';
    protected $primaryKey = 'id_web';
    protected $useTimestamps = true;
    protected $allowedFields = ['nm_web', 'alamat', 'email', 'telp', 'min_stok','logo'];

    // function to get data
    public function getData()
    {
        return $this->findAll();
    }

}


