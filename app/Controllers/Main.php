<?php

namespace App\Controllers;

use App\Controllers\BaseController;

use App\Models\ContentModel;
use App\Models\PagesModel;


class Main extends BaseController
{
    public function dashboard()
    {

        $contentModel = new ContentModel();
        $pagesModel = new PagesModel();

        // Ambil data konten berita terbaru
        $data['contents'] = $contentModel->orderBy('content_posted', 'DESC')->findAll();

        // Ambil data struktur organisasi
        $data['pages'] = $pagesModel->getPagesByCategory(5);

        // Kirim data ke view
        return view('main/dashboard', $data);
    }
}
