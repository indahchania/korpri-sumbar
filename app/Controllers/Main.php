<?php

namespace App\Controllers;

use App\Controllers\BaseController;
<<<<<<< HEAD
use App\Models\ContentModel;
use App\Models\PagesModel;
=======
>>>>>>> f3902e17febd08a7c839eaa2b0b3d75cf8967ad8

class Main extends BaseController
{
    public function dashboard()
    {
<<<<<<< HEAD
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
=======
        return view('main/dashboard');
    }
}
>>>>>>> f3902e17febd08a7c839eaa2b0b3d75cf8967ad8
