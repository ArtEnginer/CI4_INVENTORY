<?php

namespace App\Controllers;

use App\Models\WebModel;

class Web extends BaseController
{
    protected $webModel;

    public function __construct()
    {
        $this->webModel = new WebModel();
        $this->actsettings= 'settings';
    }

    public function index()
    {
        

        $web = $this->webModel->find(1);
        $data = [
            'title' => 'Pengaturan',
            'web' => $web,
            'act'   => $this->actsettings,
        ];
        return view('admin/web/index', $data);
    }

    // function to upload logo
    public function uploadLogo()
    {
        $config['upload_path'] = './assets/img/';
        $config['allowed_types'] = 'jpg|png|jpeg';
        $config['max_size'] = '2048';
        $config['remove_space'] = TRUE;
        $config['overwrite'] = TRUE;
        $config['file_name'] = 'logo';

        $this->load->library('upload', $config);
        if ($this->upload->do_upload('logo')) {
            $data = array('upload_data' => $this->upload->data());
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Logo berhasil diupload</div>');
            redirect('admin/web');
        } else {
            $error = array('error' => $this->upload->display_errors());
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">' . $error['error'] . '</div>');
            redirect('admin/web');
        }
    }

    public function ubah()
    {
        $web = $this->webModel->find(1);
        $data = [
            'title' => 'Pengaturan',
            'web' => $web,
            'act'   => $this->actsettings,
            'validation' => \Config\Services::validation()
        ];
        return view('admin/web/edit', $data);
    }

    public function ubah_data($idWeb)
    {
        if (!$this->validate([
            'nm_web' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Nama website wajib diisi!',
                ]
            ],
            'alamat' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Alamat wajib diisi!'
                ]
            ],
            'email' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Email wajib diisi!'
                ]
            ],
            'telp' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Telepon wajib diisi!'
                ]
            ],
            'min_stok' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Minimal stok wajib diisi!'
                ]
            ],
           'logo' => [
                'rules' => 'max_size[logo,20408]|is_image[logo]|mime_in[logo,image/jpg,image/jpeg,image/png]',
                'errors' => [
                    'max_size' => 'Ukuran gambar terlalu besar!',
                    'is_image' => 'Yang anda pilih bukan gambar!',
                    'mime_in' => 'Yang anda pilih bukan gambar!',
                   
                ]
            ]
        ])) {
            return redirect()->to(base_url('/settings/edit/'))->withInput();
    }

        $web = $this->webModel->find($idWeb);
        $password = $this->request->getVar('password');

        // save logo in folder assets/img
        if ($this->request->getFile('logo')->getName() != '') {
            $logo = $this->request->getFile('logo');
            // get extension file
            $ext = pathinfo($logo->getName(), PATHINFO_EXTENSION);
            // rename
            
            $path = './assets/img/upload/';

            // if  file exist then replace using new file and old file will be deleted
            if (file_exists($path . $web['logo'])) {
                unlink($path . $web['logo']);
                $logo->move($path, 'logo.' . $ext);
                 
                }else{
                $logo->move($path, 'logo.' . $ext);

}



$logoname = 'logo.' . $ext;
} else {
    
          return redirect()->to(base_url('/settings/edit/'))->withInput();
        } 

        $data = [
            'nm_web' => $this->request->getVar('nm_web'),
            'alamat' => $this->request->getVar('alamat'),
            'email' => $this->request->getVar('email'),
            'telp' => $this->request->getVar('telp'),
            'min_stok' => $this->request->getVar('min_stok'),
            'logo' =>   $logoname,
        ];

       
        
        // $data = [
        //     'id_web' => $web['id_web'],
        //     'nm_web' => $this->request->getVar('nm_web'),
        //     'alamat' => $this->request->getVar('alamat'),
        //     'email' => $this->request->getVar('email'),
        //     'telp' => $this->request->getVar('telp'),
        //     'min_stok' => $this->request->getVar('min_stok'),
        //     'logo' => $web->logo = $file->getName(),
        // ];

        $this->db->transStart();
        $this->webModel->update($web['id_web'], $data);
        $this->db->transComplete();

        if ($this->db->transStatus() == false) {
            session()->setflashdata('failed', 'Pengaturan gagal diubah.');
            return redirect()->to(base_url('settings/edit'));
        } elseif ($this->db->transStatus() == true) {
            session()->setflashdata('success', 'Pengaturan berhasil diubah.');
            return redirect()->to(base_url('settings'));
        }
    }
}
?>