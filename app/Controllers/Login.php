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
            $checkPassword = password_verify($password, $cek['users_pass']);
            if ($checkPassword) {
                //password valid
                $sessData = [
                    'users_id' => $cek['users_id'],
                    'users_uname' => $cek['users_uname'],
                    'users_nama' => $cek['users_name'],
                    'users_email' => $cek['users_email'],
                    'users_status' => $cek['users_status'],
                    'logged_in' => TRUE
                ];
                $session->set($sessData);
                return redirect()->to('/admin');
            }else {
                //password tidak valid
                session()->setFlashdata('pesan', 'Kata Sandi Salah!');
                return redirect()->to('/login');
            }
        }else {
            session()->setFlashdata('pesan', 'Nama Pengguna Salah!');
            return redirect()->to('/login');
        }
    }

    public function logout()
    {
        $session = session();
        $session->destroy();
        return redirect()->to('/login');
    }
}