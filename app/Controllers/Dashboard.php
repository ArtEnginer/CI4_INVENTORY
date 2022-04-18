<?php

namespace App\Controllers;

use App\Models\WebModel;
use App\Models\BarangModel;
use App\Models\KeluarDetailModel;
use App\Models\SuplaiDetailModel;
use App\Models\UsersModel;


class Dashboard extends BaseController
{
    protected $webModel;
    protected $barangModel;


    public function __construct()
    {
        $this->webModel = new WebModel();
        $this->barangModel = new BarangModel();
        $this->keluarDetailModel = new KeluarDetailModel();
        $this->usersModel = new UsersModel();
        $this->SuplaiDetailModel = new SuplaiDetailModel();
       
    }
    public function index()
    {
        $web = $this->webModel->find(1);
        $minimal = $this->barangModel->notifikasi_stok($web['min_stok']);
        $total = $this->barangModel->sum_stok();
        // convert array to string
        $total = implode(',', $total);
        $total = str_replace(',', '.', $total);
        $total_jenis = $this->barangModel->countAll();

       
        $totalKeluar = $this->keluarDetailModel->sum_jumlah();
        // convert array to string
        $totalKeluar = implode(',', $totalKeluar);
        $totalKeluar = str_replace(',', '.', $totalKeluar);

        $totalMasuk = $this->SuplaiDetailModel->sum_jumlah();
        // convert array to string
        $totalMasuk = implode(',', $totalMasuk);
        $totalMasuk = str_replace(',', '.', $totalMasuk);


        $total_user = $this->usersModel->countAll();



        $currentpage = $this->request->getVar('page_barang') ? $this->request->getVar('page_barang') : 1;
        $keyword = $this->request->getVar('keyword');
        $barang = $this->barangModel;


        $data = [
            'title' => 'Dashboard',
            'web' => $web,
            'minimal' => $minimal,
            'act' => 'dashboard',
            'total_jenis_barang' => $total_jenis,
            'total_barang_masuk' => $totalMasuk,
            'total_stok_barang' => $total,
            'total_barang_keluar' => $totalKeluar,
            'total_user' => $total_user,
            'barang'  => $barang->paginate(25, 'barang'),
            'pager' => $this->barangModel->pager,
            'currentPage' => $currentpage,
            'keyword' => $keyword,

        ];
        return view('admin/dashboard/index', $data);
    }
}
