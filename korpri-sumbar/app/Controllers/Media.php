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

    // Fungsi untuk menampilkan detail konten
    public function detail($id)
    {
        $contentModel = new ContentModel();

        // Ambil konten beserta kategori berdasarkan ID
        $content = $contentModel->getContentWithCategory($id);

        if (!$content) {
            // Jika konten tidak ditemukan, kembalikan ke halaman sebelumnya dengan pesan error
            return redirect()->back()->with('error', 'Konten tidak ditemukan.');
        }

        // Tampilkan halaman detail dengan data
        return view('media/mediaDetail', ['content' => $content]);
    }
}
