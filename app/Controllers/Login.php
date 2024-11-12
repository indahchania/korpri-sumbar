<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\RequestInterface;
use App\Models\UserModel;

class Login extends BaseController
{
    public function index()
    {
        return view('auth/login');
    }

    public function loginAction()
    {
        $session = session();
        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');
        $userCek = new UserModel();
        $cek = $userCek->where('users_uname', $username)->first();

        if ($cek) {
            //valid
        }else {
            session()->setFlashdata('pesan', 'Login Gagal!');
            return redirect()->to('/login');
        }
    }
}