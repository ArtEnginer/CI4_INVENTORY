<?php

namespace App\Models;

use CodeIgniter\Model;

class BarangMusnahModel extends Model
{
    protected $table = 'barang_musnah';
    protected $primaryKey = 'id_barang_musnah';
    protected $useTimestamps = true;
    protected $allowedFields = ['id_barang_musnah', 'id_barang', 'kode_barang', 'jumlah', 'keterangan'];

    protected $createdField = 'created_at';
    protected $updatedField = 'updated_at';

    public function kodegen()
    {
        $thn = substr(date('Y'), 2, 2);
        $bln = date('m');
        $hari = date('d');
        $param = "M-" . $thn . $bln . $hari;
        $query = $this->select('max(right(id_barang_musnah, 3)) as kode')
        ->like('id_barang_musnah', $param)
            ->limit(1)
            ->orderBy('id_barang_musnah', 'DESC')->get()->getRowArray();
        if (!empty($query)) {
            $kode = intval($query['kode']) + 1;
        } else {
            $kode = 1;
        }
        $kodemax = str_pad($kode, 3, "0", STR_PAD_LEFT);
        $kodejadi = $param . $kodemax;
        return $kodejadi;
    }
}
