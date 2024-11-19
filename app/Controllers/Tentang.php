<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Tentang extends BaseController
{
    public function sejarah()
    {
        return view('tentang/sejarah');
    }

    public function visiMisi()
    {
        return view('tentang/visiMisi');
    }

    // Tambahkan metode untuk setiap submenu lainnya
}
