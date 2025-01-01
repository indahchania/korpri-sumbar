<?php

namespace App\Controllers;

use CodeIgniter\Controller;

class Kontak extends Controller
{
    public function index()
    {
        return view('kontak');
    }

    public function send()
    {
        $validation = \Config\Services::validation();
        
        // Validasi input form
        if ($this->request->getMethod() == 'post' && $this->validate([
            'name'    => 'required|min_length[3]|max_length[255]',
            'email'   => 'required|valid_email',
            'message' => 'required|min_length[10]',
        ])) {
            // Jika validasi berhasil, lakukan pengolahan pesan (misalnya kirim email)
            $name = $this->request->getPost('name');
            $email = $this->request->getPost('email');
            $message = $this->request->getPost('message');
            
            // Simpan data atau kirim email
            // Misalnya menggunakan Email Library CodeIgniter:
            $emailService = \Config\Services::email();
            $emailService->setTo('admin@korpri-sumbar.or.id');
            $emailService->setSubject('Pesan dari ' . $name);
            $emailService->setMessage('Pesan dari ' . $name . ' (' . $email . '):\n\n' . $message);

            if ($emailService->send()) {
                return redirect()->to('/kontak')->with('message', 'Pesan berhasil dikirim!');
            } else {
                return redirect()->to('/kontak')->with('error', 'Gagal mengirim pesan. Silakan coba lagi.');
            }
        } else {
            // Jika validasi gagal, kembali ke halaman kontak dengan error
            return redirect()->to('/kontak')->withInput()->with('error', 'Form tidak valid.');
        }
    }
}
