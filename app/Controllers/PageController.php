<?php

namespace App\Controllers;

use App\Models\PageModel;
use App\Models\PageCategoryModel;

class PageController extends BaseController
{
    public function index($category)
    {
        $pageModel = new PageModel();
        $categoryModel = new PageCategoryModel();

        // Cari kategori berdasarkan nama
        $categoryData = $categoryModel->where('category_name', $category)->first();

        if (!$categoryData) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException("Kategori tidak ditemukan.");
        }

        // Ambil halaman berdasarkan kategori
        $page = $pageModel->where('category_id', $categoryData['id'])
                          ->where('pages_status', 'publik')
                          ->first();

        if (!$page) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException("Halaman tidak ditemukan.");
        }

        $data = [
            'page' => $page, // Data halaman
        ];

        return view('tentang/dinamis', $data); // Gunakan view dinamis
    }
}
