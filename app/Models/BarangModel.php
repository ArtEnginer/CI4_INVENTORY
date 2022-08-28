<?php

namespace App\Models;

use CodeIgniter\Model;

class BarangModel extends Model
{
    protected $table = 'barang';
    protected $primaryKey = 'id_barang';
    protected $useTimestamps = true;
    protected $allowedFields = ['id_barang', 'nm_barang', 'spek', 'satuan', 'stok','status','gambar'];

    public function kodegen()
    {
        $thn = substr(date('Y'), 2, 2);
        $bln = date('m');
        $hari = date('d');
        $param = "B-" . $thn . $bln . $hari;
        $query = $this->select('max(right(id_barang, 3)) as kode')
            ->like('id_barang', $param)
            ->limit(1)
            ->orderBy('id_barang', 'DESC')->get()->getRowArray();
        if (!empty($query)) {
            $kode = intval($query['kode']) + 1;
        } else {
            $kode = 1;
        }
        $kodemax = str_pad($kode, 3, "0", STR_PAD_LEFT);
        $kodejadi = $param . $kodemax;
        return $kodejadi;
    }

    public function cari($keyword)
    {
        return $this->like('nm_barang', $keyword)->orLike('id_barang', $keyword);
    }

    public function cari_barang($keyword)
    {
        return $this->like('nm_barang', $keyword)->orLike('id_barang', $keyword)->findAll();
    }

    public function notifikasi_stok($min)
    {
        // if<= $min select * from barang where stok <= $min
        return $this->where('stok <=', $min)->findAll();
        

    }

    // function to sum all the stock
    public function sum_stok()
    {
        return $this->select('SUM(stok) as total')->get()->getRowArray();
    }

    // function to sum field stok in barang table - field jumlah in keluar_detail table
    public function jumlah_stok_per_barang()
    {
        return $this->select('barang.id_barang, barang.nm_barang, barang.stok, SUM(keluar_detail.jumlah) as jumlah')
            ->join('keluar_detail', 'keluar_detail.id_barang = barang.id_barang')
            ->groupBy('barang.id_barang')
            ->get()->getResultArray();        
    }

    

}
