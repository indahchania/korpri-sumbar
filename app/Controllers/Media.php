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

        // Data breadcrumb
        $breadcrumb = [
            'category_name' => $category,
        ];

        // Tampilkan view dengan data
        return view('media/media', [
            'contents' => $contents,
            'activeCategory' => $category,
            'content' => $breadcrumb, // Menambahkan data breadcrumb ke view
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

        // Data breadcrumb untuk halaman detail
        $breadcrumb = [
            'category_name' => $content['category_name'] ?? 'Tidak Diketahui',
        ];

        // Tampilkan halaman detail dengan data
        return view('media/mediaDetail', [
            'content' => $content,
            'breadcrumb' => $breadcrumb, // Menambahkan breadcrumb ke detail
        ]);
    }
}
