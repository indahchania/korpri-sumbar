<?php

namespace Config;

use CodeIgniter\Config\AutoloadConfig;

class Autoload extends AutoloadConfig
{
    public $psr4 = [
        APP_NAMESPACE => APPPATH,
    ];

    public $classmap = [];

    public $files = [];

    /**
     * -------------------------------------------------------------------
     * Helpers
     * -------------------------------------------------------------------
     * Daftar helper yang akan di-load secara otomatis
     *
     * Tambahkan nama helper di array ini agar helper tersedia di seluruh aplikasi.
     */
    public $helpers = [
        'text', // Tambahkan helper text di sini
    ];
}
