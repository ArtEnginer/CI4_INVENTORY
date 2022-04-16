<?php

namespace App\Controllers;

use App\Controllers\BaseController;


use App\Models\BarangModel;
use App\Models\KeluarDetailModel;
use App\Models\UsersModel;
use App\Models\WebModel;


class Homepage extends BaseController
{
    protected $webModel;
    protected $barangModel;

    public function __construct()
    {
        $this->webModel = new WebModel();
        $this->barangModel = new BarangModel();
        $this->keluarDetailModel = new KeluarDetailModel();
        $this->usersModel = new UsersModel();
    }
    public function index()
    {
        $web = $this->webModel->find(1);
        $minimal = $this->barangModel->notifikasi_stok($web['min_stok']);
        $total = $this->barangModel->sum_stok();
        // convert array to string
        $total = implode(',', $total);
        $total = str_replace(',', '.', $total);

        $totalKeluar = $this->keluarDetailModel->sum_jumlah();
        // convert array to string
        $totalKeluar = implode(',', $totalKeluar);
        $totalKeluar = str_replace(',', '.', $totalKeluar);

        $currentpage = $this->request->getVar('page_barang') ? $this->request->getVar('page_barang') : 1;
        $keyword = $this->request->getVar('keyword');
        $barang = $this->barangModel;



        $data = [
            'title' => 'Dashboard',
            'web' => $web,
            'minimal' => $minimal,
            'act' => 'dashboard',
            'barang'  => $barang->paginate(25, 'barang'),
            'pager' => $this->barangModel->pager,
            'currentPage' => $currentpage,
            'keyword' => $keyword,
           

        ];

        return view('homepage/index', $data);
    }
}
