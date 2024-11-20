<?php

namespace App\Controllers;

use App\Models\ContentModel;

class Media extends BaseController
{
    public function __construct()
    {
        helper('text'); // Load helper di constructor
    }

    public function index($category)
    {
        $contentModel = new ContentModel();

        // Pemetaan kategori
        $categories = [
            'berita' => 11,
            'kegiatan' => 12,
            'pengumuman' => 13,
            'publikasi' => 14,
        ];

        // Validasi kategori
        if (!isset($categories[$category])) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException("Kategori tidak ditemukan: $category");
        }

        // Ambil konten berdasarkan kategori
        $contents = $contentModel->where('content_category', $categories[$category])
            ->where('content_status', 'publik')
            ->findAll();

        // Tampilkan view dengan data
        return view('media/media', [
            'contents' => $contents,
            'activeCategory' => $category,
        ]);
    }
}
