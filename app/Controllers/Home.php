<?php

namespace App\Controllers;
use App\Models\ContentModel;

class Home extends BaseController
{
    public function index()
    {
        return view('welcome_message');
    }

    public function admin()
    {
        return view('admin/index');
    }
}
