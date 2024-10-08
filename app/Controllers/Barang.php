<?php

namespace App\Controllers;

use App\Models\BarangModel;


class Barang extends BaseController
{
    protected $barangModel;

    public function __construct()
    {
        $this->barangModel = new BarangModel();
    }

    public function index()
    {
        $currentpage = $this->request->getVar('page_barang') ? $this->request->getVar('page_barang') : 1;
        $keyword = $this->request->getVar('keyword');
        $barang = $this->barangModel;
        $data = [
            'title' => 'Data Barang',
            'barang'  => $barang->paginate(25, 'barang'),
            'pager' => $this->barangModel->pager,
            'act'   => 'item',
            'currentPage' => $currentpage,
            'keyword' => $keyword,
        ];
        return view('admin/barang/index', $data);
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
        $currentpage = $this->request->getVar('page_barang') ? $this->request->getVar('page_barang') : 1;
        $barang = $this->barangModel->cari($keyword);
        $data = [
            'title' => 'Data Barang',
            'barang'  => $barang->paginate(25, 'barang'),
            'pager' => $this->barangModel->pager,
            'act'   => 'barang',
            'currentPage' => $currentpage,
            'keyword' => $keyword,
        ];
        return view('admin/barang/index', $data);
    }

    public function detail($idBarang)
    {
        $barang = $this->barangModel->find($idBarang);

        if (empty($barang)) {
            session()->setflashdata('failed', 'Oops... Data tidak ditemukan. Silahkan pilih data.');
            return redirect()->to(base_url('/barang'))->withInput();
        }

        $data = [
            'title' => 'Detail Barang',
            'barang' => $barang,
            'act'   => 'barang',
        ];
        return view('admin/barang/detail', $data);
    }

    public function tambah()
    {
        $data = [
            'title' => 'Tambah Data Barang',
            'act'   => 'barang',
            'validation' => \Config\Services::validation()
        ];
        return view('admin/barang/add', $data);
    }

    public function simpan()
    {

        if (!$this->validate([
            'nm_barang' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Nama barang wajib diisi!',
                ]
            ],
            'satuan' => [
                'rules' => 'required|max_length[10]',
                'errors' => [
                    'required' => 'Satuan wajib diisi!',
                    'max_length' => 'Panjang maksimal untuk kolom ini sebesar 10 huruf!'
                ]
            ],
            'status' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Status wajib diisi!',
                ]
            ],
            'gambar' => [
                'rules' => 'uploaded[gambar]|is_image[gambar]|mime_in[gambar,image/jpg,image/jpeg,image/png]',
                'errors' => [
                    'uploaded' => 'Gambar wajib diisi!',
                    'is_image' => 'Yang anda pilih bukan gambar!',
                    'mime_in' => 'Yang anda pilih bukan gambar!',
                ]
            ],
        ])) {
            return redirect()->to(base_url('/item/add'))->withInput();
        }


        $idBarang = $this->barangModel->kodegen();
        $stok = 0;
        $gambar = $this->request->getFile('gambar');
        if ($gambar->getError() == 4) {
            $gambar = 'default.jpg';
        } else {
            $gambar = $gambar->getName();
            $gambar = $idBarang . '-' . $gambar;
        }

        $data = [
            'id_barang' => $idBarang,
            'nm_barang' => $this->request->getVar('nm_barang'),
            'spek' => $this->request->getVar('spek'),
            'satuan' => ucwords($this->request->getVar('satuan')),
            'stok' => $stok,
            'status' => $this->request->getVar('status'),
            'gambar' => $gambar,
        ];

        $this->request->getFile('gambar')->move('./assets/img/barang/', $gambar);

        $this->db->transStart();
        $this->barangModel->insert($data);
        $this->db->transComplete();

        if ($this->db->transStatus() == false) {
            session()->setflashdata('failed', 'Data barang gagal ditambah.');
            return redirect()->to(base_url('item/add'));
        } elseif ($this->db->transStatus() == true) {
            session()->setflashdata('success', 'Data barang berhasil ditambah.');
            return redirect()->to(base_url('item'));
        }
    }

    public function ubah($idBarang)
    {
        $barang = $this->barangModel->find($idBarang);
        if (empty($barang)) {
            session()->setflashdata('failed', 'Oops... Data tidak ditemukan. Silahkan pilih data.');
            return redirect()->to(base_url('/item'))->withInput();
        }

        $data = [
            'title' => 'Edit Data Barang',
            'barang'  => $barang,
            'act'   => 'barang',
            'validation' => \Config\Services::validation()
        ];
        return view('admin/barang/edit', $data);
    }

    public function ubah_data($idBarang)
    {
        if (!$this->validate([
            'nm_barang' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Nama barang wajib diisi!',
                ]
            ],
            'satuan' => [
                'rules' => 'required|max_length[10]',
                'errors' => [
                    'required' => 'Satuan wajib diisi!',
                    'max_length' => 'Panjang maksimal untuk kolom ini sebesar 10 huruf!'
                ]
            ],
            'status' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Status wajib diisi!',
                ]
            ],

        ])) {
            return redirect()->to(base_url('/item/edit/' . $idBarang))->withInput();
        }

        $barang = $this->barangModel->find($idBarang);
        if (empty($barang)) {
            session()->setflashdata('failed', 'Oops... Data tidak ditemukan. Silahkan pilih data.');
            return redirect()->to(base_url('/item'))->withInput();
        }

        // jika gambar tidak diubah 
        if ($this->request->getFile('gambar')->getError() == 4) {
            $gambar = $barang['gambar'];
        } else {
            $gambar = $this->request->getFile('gambar');
            $gambar = $gambar->getName();
            $gambar = $idBarang . '-' . $gambar;
        }

        $data = [
            'nm_barang' => $this->request->getVar('nm_barang'),
            'spek' => $this->request->getVar('spek'),
            'satuan' => ucwords($this->request->getVar('satuan')),
            'status' => $this->request->getVar('status'),
            'gambar' => $gambar,
        ];
        if ($this->request->getFile('gambar')->getError() != 4) {
            unlink('./assets/img/barang/' . $barang['gambar']);
            $this->request->getFile('gambar')->move('./assets/img/barang/', $gambar);
        }


        $this->db->transStart();
        $this->barangModel->update($barang['id_barang'], $data);
        $this->db->transComplete();

        if ($this->db->transStatus() == false) {
            session()->setflashdata('failed', 'Data barang gagal diubah.');
            return redirect()->to(base_url('item'));
        } elseif ($this->db->transStatus() == true) {
            session()->setflashdata('success', 'Data barang berhasil diubah.');
            return redirect()->to(base_url('item'));
        }
    }

    public function data_barang()
    {
        $request = \Config\Services::request();
        $keyword = $request->getPostGet('term');
        $barang = $this->barangModel->cari_barang($keyword);
        $w = array();
        foreach ($barang as $a) :
            $w[] = [
                "label" => $a['id_barang'] . ' - ' . $a['nm_barang'],
                "id_barang" => $a['id_barang'],
            ];
        endforeach;
        echo json_encode($w);
    }

    public function hapus($id)
    {

        $barang = $this->barangModel->find($id);

        if (empty($barang)) {
            session()->setflashdata('failed', 'Oops... Data tidak ditemukan. Silahkan pilih data.');
            return redirect()->to(base_url('/item'));
        }
        // unlink gambar
        unlink('./assets/img/barang/' . $barang['gambar']);
        $this->db->transStart();
        $this->barangModel->delete($id);
        $this->db->transComplete();
        if ($this->db->transStatus() == false) {
            session()->setflashdata('failed', 'Data barang gagal dihapus.');
            return redirect()->to(base_url('item'));
        } elseif ($this->db->transStatus() == true) {
            session()->setflashdata('success', 'Data barang berhasil dihapus.');
            return redirect()->to(base_url('item'));
        }
    }
}
