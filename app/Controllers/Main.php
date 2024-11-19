<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Main extends BaseController
{
    public function dashboard()
    {
        return view('main/dashboard');
    }
}