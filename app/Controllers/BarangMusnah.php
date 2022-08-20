<?php

namespace App\Controllers;

use App\Models\BarangModel;
use App\Models\BarangMusnahModel;


class BarangMusnah extends BaseController
{
    protected $barangMusnahModel;

    public function __construct()
    {
        $this->barangMusnahModel = new BarangMusnahModel();
        $this->barangModel = new BarangModel();
    }

    public function index()
    {
        $currentpage = $this->request->getVar('page_barang_musnah') ? $this->request->getVar('page_barang_musnah') : 1;
        $keyword = $this->request->getVar('keyword');
        $barangMusnah = $this->barangMusnahModel;

        $data = [
            'title' => 'Data Barang Musnah',
            'barangMusnah'  => $barangMusnah->paginate(25, 'barang_musnah'),
            'pager' => $this->barangMusnahModel->pager,
            'act'   => 'item',
            'currentPage' => $currentpage,
            'keyword' => $keyword,
        ];
        return view('admin/barang_musnah/index', $data);
    }

    public function pencarian()
    {
        $keyword = $this->request->getVar('keyword');
        if ($keyword)
            return redirect()->to(base_url('/item/search/' . $keyword))->withInput();
        else
            return redirect()->to(base_url('/item'));
    }

    public function cari($keyword)
    {
        $currentpage = $this->request->getVar('page_barang_musnah') ? $this->request->getVar('page_barang_musnah') : 1;
        $barangMusnah = $this->barangMusnahModel->cari($keyword);
        $data = [
            'title' => 'Data Barang Musnah',
            'barangMusnah'  => $barangMusnah->paginate(25, 'barang_musnah'),
            'pager' => $this->barangMusnahModel->pager,
            'act'   => 'barang_musnah',
            'currentPage' => $currentpage,
            'keyword' => $keyword,
        ];
        return view('admin/barang_musnah/index', $data);
    }

    public function detail($idBarangMusnah)
    {
        $barangMusnah = $this->barangMusnahModel->find($idBarangMusnah);

        $data = [
            'title' => 'Detail Barang Musnah',
            'barangMusnah' => $barangMusnah,
            'act'  => 'item',
        ];

        return view('admin/barang_musnah/detail', $data);
    }

    public function tambah()
    {
        $data = [
            'title' => 'Tambah Barang Musnah',
            'act'  => 'item',
            'validation' => \Config\Services::validation(),
            'barang' => $this->barangModel->findAll(),
        ];

        return view('admin/barang_musnah/add', $data);
    }

    public function simpan()
    {

        $barang = $this->barangModel->find($this->request->getVar('id_barang'));
        // jika jumlah inputan kurang dari jumlah barang yang ada kirim pesan
        if ($this->request->getVar('jumlah') > $barang['stok']) {
            session()->setFlashdata('failed', 'Jumlah yang anda inputkan melebihi jumlah barang yang ada');
            return redirect()->to(base_url('/musnah/add'));
        }

        $stok = $barang['stok'] - $this->request->getVar('jumlah');
        if ($stok < 0) {
            session()->setFlashdata('failed', 'Jumlah yang anda inputkan melebihi jumlah barang yang ada');
            return redirect()->to(base_url('/musnah/add'));
        }

        $idBarangMusnah = $this->barangMusnahModel->kodegen();
        $this->barangMusnahModel->insert([
            'id_barang_musnah' => $idBarangMusnah,
            'id_barang' => $this->request->getVar('id_barang'),
            'kode_barang' => $this->request->getVar('kode_barang'),
            'jumlah' => $this->request->getVar('jumlah'),
            'keterangan' => $this->request->getVar('keterangan'),
        ]);

        $this->barangModel->update($this->request->getVar('id_barang'), [
            'stok' => $stok,
        ]);

        session()->setFlashdata('success', 'Data berhasil ditambahkan.');

        return redirect()->to(base_url('/musnah'));
    }

    public function delete($id)
    {
        $this->barangMusnahModel->delete($id);
        session()->setFlashdata('success', 'Data berhasil dihapus.');
        return redirect()->to(base_url('/musnah'));
    }

    public function ubah($idBarangMusnah)
    {
        $barangMusnah = $this->barangMusnahModel->find($idBarangMusnah);

        $data = [
            'title'        => 'Edit Barang Musnah',
            'barangMusnah' => $barangMusnah,
            'act'          => 'item',
            'barang'       => $this->barangModel->findAll(),
            'validation'   => \Config\Services::validation(),
        ];

        return view('admin/barang_musnah/edit', $data);
    }

    public function update($idBarangMusnah)
    {
        $barangMusnah = $this->barangMusnahModel->find($idBarangMusnah);
        $barang = $this->barangModel->find($this->request->getVar('id_barang'));

        // jika inputan jumlah < data sebelumnya maka stok barang ditambahkan dengan selisih jumlah
        if ($this->request->getVar('jumlah') < $barangMusnah['jumlah']) {
            $stok = $barang['stok'] + ($barangMusnah['jumlah'] - $this->request->getVar('jumlah'));
            if ($stok < 0) {
                session()->setFlashdata('failed', 'Jumlah yang anda inputkan melebihi jumlah barang yang ada');
                return redirect()->to(base_url('/musnah/edit/' . $idBarangMusnah));
            }
            $this->barangModel->update($this->request->getVar('id_barang'), [
                'stok' => $stok,
            ]);
        }else{
            // jika inputan jumlah > data sebelumnya maka stok barang dikurangi dengan selisih jumlah
            $stok = $barang['stok'] - ($this->request->getVar('jumlah') - $barangMusnah['jumlah']);
            if ($stok < 0) {
                session()->setFlashdata('failed', 'Jumlah yang anda inputkan melebihi jumlah barang yang ada');
                return redirect()->to(base_url('/musnah/edit/' . $idBarangMusnah));
            }
            $this->barangModel->update($this->request->getVar('id_barang'), [
                'stok' => $stok,
            ]);
        }

        $this->barangMusnahModel->update($idBarangMusnah, [
            'id_barang' => $this->request->getVar('id_barang'),
            'kode_barang' => $this->request->getVar('kode_barang'),
            'jumlah' => $this->request->getVar('jumlah'),
            'keterangan' => $this->request->getVar('keterangan'),
        ]);

        session()->setFlashdata('success', 'Data berhasil diubah.');

        return redirect()->to(base_url('/musnah'));
    }
}
