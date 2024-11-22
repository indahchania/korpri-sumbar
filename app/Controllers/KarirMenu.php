<?php

namespace App\Controllers;

use App\Models\CareerModel;

class KarirMenu extends BaseController
{
    public function index()
    {
        $careerModel = new CareerModel();
    
        // Ambil kategori dari query string jika ada
        $category = $this->request->getGet('category');
    
        // Filter berdasarkan kategori jika ada
        if ($category) {
            $data['career'] = $careerModel->getCareersWithCategoryByCategoryName($category);
            $data['selectedCategory'] = $category;
        } else {
            // Ambil semua data jika kategori tidak dipilih
            $data['career'] = $careerModel->getCareersWithCategory();
            $data['selectedCategory'] = 'Semua Kategori';
        }
    
        // Ambil kategori yang tersedia untuk ditampilkan di breadcrumb dan filter
        $data['categories'] = $careerModel->getCategories();
    
        return view('karirMenu/karirMenu', $data);
    }
  
    public function detail($id)
    {
        $careerModel = new CareerModel();

        // Ambil data karir berdasarkan ID, beserta nama kategori
        $career = $careerModel->db->table('career')
            ->select('career.*, career_category.category_name')
            ->join('career_category', 'career.career_category = career_category.carcategory_id', 'left')
            ->where('career.career_id', $id)
            ->get()
            ->getRowArray();

        // Periksa jika data tidak ditemukan
        if (!$career) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound("Karir dengan ID $id tidak ditemukan.");
        }

        // Set gambar default jika tidak ada gambar
        if (empty($career['career_img'])) {
            $career['career_img'] = 'mediaDefault.png';
        }

        $data['career'] = $career;

        // Tampilkan view detail
        return view('karirMenu/detail', $data);
    }
}
