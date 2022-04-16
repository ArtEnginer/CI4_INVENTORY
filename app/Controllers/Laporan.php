<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\BarangModel;
use App\Models\KeluarDetailModel;
use App\Models\KeluarModel;
use App\Models\SuplaiDetailModel;
use App\Models\SuplaiModel;
use App\Models\WebModel;
use Dompdf\Dompdf;


class Laporan extends BaseController
{
    protected $barangModel;
    protected $keluarModel;
    protected $keluarDetailModel;
    protected $suplaiModel;
    protected $suplaiDetailModel;

    public function __construct()
    {
        $this->barangModel = new BarangModel();
        $this->keluarModel = new KeluarModel();
        $this->keluarDetailModel = new KeluarDetailModel();
        $this->suplaiModel = new SuplaiModel();
        $this->suplaiDetailModel = new SuplaiDetailModel();
        $this->webModel = new WebModel();
    }

    public function index()
    {
        $data = [
            'title' => 'Laporan',
            'act'   => 'laporan',
        ];
        return view('admin/laporan/index', $data);
    }
    public function keluar()
    {
        $currentpage = $this->request->getVar('page_export') ? $this->request->getVar('page_export') : 1;
        $keyword = $this->request->getVar('keyword');
        $keluar = $this->keluarModel->orderBy('tanggal', 'DESC');
        $data = [
            'title' => 'Laporan Barang Keluar',
            'keluar'  => $keluar->paginate(25, 'export'),
            'pager' => $this->keluarModel->pager,
            'act'   => 'barang',
            'currentPage' => $currentpage,
            'keyword' => $keyword,
        ];
        return view('admin/laporan/keluar', $data);
    }

    public function masuk()
    {

        $currentpage = $this->request->getVar('page_supply') ? $this->request->getVar('page_supply') : 1;
        $keyword = $this->request->getVar('keyword');
        $suplai = $this->suplaiModel->orderBy('tanggal', 'DESC');
        $data = [
            'title' => 'Data Barang Masuk',
            'suplai'  => $suplai->paginate(25, 'supply'),
            'pager' => $this->suplaiModel->pager,
            'act'   => 'barang',
            'currentPage' => $currentpage,
            'keyword' => $keyword,
        ];
        return view('admin/laporan/masuk', $data);
    }

    // // function to see data with periode
    // public function periode()
    // {
    //     $currentpage = $this->request->getVar('page_export') ? $this->request->getVar('page_export') : 1;
    //     $keyword = $this->request->getVar('keyword');
    //     $tanggal_awal = $this->request->getVar('tanggal_awal');
    //     $tanggal_akhir = $this->request->getVar('tanggal_akhir');
    //     $keluar = $this->keluarModel->where('tanggal >=', $tanggal_awal)->where('tanggal <=', $tanggal_akhir)->orderBy('tanggal', 'DESC');
    //     $data = [
    //         'title' => 'Data Barang Keluar',
    //         'keluar'  => $keluar->paginate(25, 'export'),
    //         'pager' => $this->keluarModel->pager,
    //         'act'   => 'barang',
    //         'currentPage' => $currentpage,
    //         'keyword' => $keyword,
    //         'tanggal_awal' => $tanggal_awal,
    //         'tanggal_akhir' => $tanggal_akhir,
    //     ];
    //     return view('admin/laporan/index', $data);
    // }

    // function to print data with periode and dompdf
    public function print_keluar_periode()
    {
        $web = $this->webModel->find(1);
        $currentpage = $this->request->getVar('page_export') ? $this->request->getVar('page_export') : 1;
        $keyword = $this->request->getVar('keyword');
        $tanggal_awal = $this->request->getVar('tanggal_awal');
        $tanggal_akhir = $this->request->getVar('tanggal_akhir');
        $keluar = $this->keluarModel->where('tanggal >=', $tanggal_awal)->where('tanggal <=', $tanggal_akhir)->orderBy('tanggal', 'DESC');

        // count $keluar
        $count = $keluar->countAllResults();

        $data = [
            'title' => 'Laporan Data Barang Keluar',
            'keluar'  => $keluar->paginate($count, 'export'),
            'pager' => $this->keluarModel->pager,
            'act'   => 'barang',
            'currentPage' => $currentpage,
            'keyword' => $keyword,
            'tanggal_awal' => $tanggal_awal,
            'tanggal_akhir' => $tanggal_akhir,
            'web' => $web,
            'count' => $count,

        ];
        $fileName = "Laporan_Barang_Keluar_.pdf";
        $dompdf = new Dompdf();
        $dompdf->loadHtml(view('admin/laporan/print_keluar_periode', $data));
        $dompdf->setPaper('legal', 'potrait');
        $dompdf->render();
        $dompdf->stream($fileName);
    }

    public function print_masuk_periode()
    {
        $web = $this->webModel->find(1);
        $currentpage = $this->request->getVar('page_export') ? $this->request->getVar('page_export') : 1;
        $keyword = $this->request->getVar('keyword');
        $tanggal_awal = $this->request->getVar('tanggal_awal');
        $tanggal_akhir = $this->request->getVar('tanggal_akhir');
        $masuk = $this->suplaiModel->where('tanggal >=', $tanggal_awal)->where('tanggal <=', $tanggal_akhir)->orderBy('tanggal', 'DESC');

        // count $masuk
        $count = $masuk->countAllResults();

        $data = [
            'title' => 'Laporan Data Barang masuk',
            'masuk'  => $masuk->paginate($count, 'export'),
            'pager' => $this->suplaiModel->pager,
            'act'   => 'barang',
            'currentPage' => $currentpage,
            'keyword' => $keyword,
            'tanggal_awal' => $tanggal_awal,
            'tanggal_akhir' => $tanggal_akhir,
            'web' => $web,
            'count' => $count,

        ];
        $fileName = "Laporan_Barang_Masuk_.pdf";
        $dompdf = new Dompdf();
        $dompdf->loadHtml(view('admin/laporan/print_masuk_periode', $data));
        $dompdf->setPaper('legal', 'potrait');
        $dompdf->render();
        $dompdf->stream($fileName);
    }
}
