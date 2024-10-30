<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {
        return view('auth/login');
    }

    public function register()
    {
        return view('auth/register');
    }

    public function login()
    {
        return view('auth/login');
    }

    public function admin()
    {
        return view('admin/index');
    }

    public function konten()
    {
        return view('admin/konten');
    }

    public function pages()
    {
        return view('admin/pages');
    }
}
