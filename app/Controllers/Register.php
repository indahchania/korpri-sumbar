<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\RequestInterface;
use App\Models\UserModel;

class Register extends BaseController {

    public function index() 
    {
        return view('auth/register');
    }

    public function registerAction() {
        $userModel = new UserModel();

        $nama = $this->request->getPost('nama');
        $username = $this->request->getPost('username');
        $email = $this->request->getPost('email');
        $password = $this->request->getPost('password');

        $password = password_hash($password, PASSWORD_BCRYPT);

        $data = [
            'users_name' => $nama,
            'users_uname' => $username,
            'users_email' => $email,
            'users_pass' => $password
        ];

        $r = $userModel->insert($data);

        if ($r) {
            session()->setFlashdata('pesan', 'Pendaftaran Berhasil');
            return redirect()->to('/login');
        } else {
            echo "Daftar Gagal";
        }
    }
    
}