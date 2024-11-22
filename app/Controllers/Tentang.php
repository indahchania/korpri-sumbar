<?php

namespace App\Controllers;

use App\Models\PagesModel;
use App\Models\PageCategoryModel;

class Tentang extends BaseController
{
    public function index($categoryName = null)
    {
        $pagesModel = new PagesModel();
        $pageCategoryModel = new PageCategoryModel();

        // Daftar kategori asli (dengan spasi)
        $categories = $pageCategoryModel->findAll();
        
        // Ganti tanda hubung (-) menjadi spasi untuk kategori yang diterima di URL
        if ($categoryName) {
            $categoryNameFormatted = str_replace('-', ' ', $categoryName); // Mengubah "visi-dan-misi" menjadi "Visi dan Misi"
            $selectedCategory = $pageCategoryModel->where('category_name', $categoryNameFormatted)->first();
            
            if ($selectedCategory) {
                $pages = $pagesModel->where('pages_category', $selectedCategory['pagescategory_id'])
                                    ->where('pages_status', 'publik')
                                    ->findAll();
            } else {
                throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound("Kategori tidak ditemukan.");
            }
        }

        // Kirim data ke view
        return view('tentang/tentang', [
            'categories' => $categories,
            'pages' => $pages,
            'selectedCategory' => $categoryName,
        ]);
    }
}
