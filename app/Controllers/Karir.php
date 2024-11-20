<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\CareerModel;

class Karir extends BaseController
{
    public function index()
    {
        $careerModel = new CareerModel();

        // Ambil data dengan kategori
        $data['career'] = $careerModel->getCareersWithCategory();

        // Kirim data ke view
        return view('admin/karir', $data);
    }

    public function create_karir()
    {
        $careerModel = new CareerModel();

        // Ambil semua kategori dari database
        $data['categories'] = $careerModel->getCategories();

        // Kirim data kategori ke view
        return view('admin/create/create_karir', $data);
    }

    public function save_karir()
    {
        $careerModel = new CareerModel();
        $db = \Config\Database::connect();

        // Ambil users_id dari session
        $users_id = session()->get('users_id');

        // Proses upload gambar
        $careerImg = $this->request->getFile('career_img');
        $newImgName = null;
        if ($careerImg && $careerImg->isValid() && !$careerImg->hasMoved()) {
            $newImgName = $careerImg->getRandomName();
            $careerImg->move('uploads/karir', $newImgName);
        }

        // Ambil input dari form
        $data = [
            'career_title'    => $this->request->getPost('career_title'),
            'career_author'   => $this->request->getPost('career_author'),
            'career_body'     => $this->request->getPost('career_body'),
            'career_img'      => $newImgName,
            'career_status'   => $this->request->getPost('career_status'),
            'career_category' => $this->request->getPost('career_category'),
            'users_id'        => $users_id,
        ];

        // Validasi kategori
        $categoryExists = $db->table('career_category')
            ->where('carcategory_id', $data['career_category'])
            ->countAllResults();

        if ($categoryExists === 0) {
            return redirect()->back()->with('error', 'Invalid career category selected.');
        }

        // Simpan data
        try {
            $careerModel->insert($data);
            session()->setFlashdata('message', 'Career successfully created.');
            return redirect()->to(base_url('karir'));
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Failed to save career: ' . $e->getMessage());
        }
    }

    public function edit_karir($career_id)
    {
        $careerModel = new CareerModel();

        // Ambil data karir berdasarkan id
        $data['career'] = $careerModel->find($career_id);

        // Ambil semua kategori dari database
        $data['categories'] = $careerModel->getCategories();

        // Kirim data ke view
        return view('admin/edit/edit_karir', $data);
    }

    public function update_karir($career_id)
    {
        $careerModel = new CareerModel();

        // Ambil data karir lama
        $existingCareer = $careerModel->find($career_id);
        if (!$existingCareer) {
            return redirect()->back()->with('error', 'Career not found.');
        }

        // Proses upload gambar baru jika ada
        $careerImg = $this->request->getFile('career_img');
        $newImgName = $existingCareer['career_img']; // Default ke gambar lama
        if ($careerImg && $careerImg->isValid() && !$careerImg->hasMoved()) {
            if ($existingCareer['career_img'] && file_exists('uploads/karir/' . $existingCareer['career_img'])) {
                unlink('uploads/karir/' . $existingCareer['career_img']);
            }
            $newImgName = $careerImg->getRandomName();
            $careerImg->move('uploads/karir', $newImgName);
        }

        $data = [
            'career_title'    => $this->request->getPost('career_title'),
            'career_author'   => $this->request->getPost('career_author'),
            'career_body'     => $this->request->getPost('career_body'),
            'career_img'      => $newImgName,
            'career_status'   => $this->request->getPost('career_status'),
            'career_category' => $this->request->getPost('career_category'),
        ];

        try {
            $careerModel->update($career_id, $data);
            session()->setFlashdata('message', 'Career successfully updated.');
            return redirect()->to(base_url('karir'));
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Failed to update career: ' . $e->getMessage());
        }
    }

    public function delete_karir($career_id)
    {
        $careerModel = new CareerModel();

        $existingCareer = $careerModel->find($career_id);
        if (!$existingCareer) {
            return redirect()->back()->with('error', 'Career not found.');
        }

        if ($existingCareer['career_img'] && file_exists('uploads/karir/' . $existingCareer['career_img'])) {
            unlink('uploads/karir/' . $existingCareer['career_img']);
        }

        $careerModel->delete($career_id);
        session()->setFlashdata('message', 'Career successfully deleted.');
        return redirect()->to(base_url('karir'));
    }
}
