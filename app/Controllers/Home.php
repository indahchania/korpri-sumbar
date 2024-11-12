<?php

namespace App\Controllers;
use App\Models\ContentModel;

class Home extends BaseController
{
    public function index()
    {
        return view('welcome_message');
    }

    public function register()
    {
        return view('auth/register');
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

    public function karir()
    {
        return view('admin/karir');
    }

    public function create_konten()
    {
        return view('admin/create_konten');
    }

    public function save_konten()
    {
        $contentModel = new ContentModel();
        $data = [
            'content_title' => $this->request->getPost('content_title'),
            'content_author' => $this->request->getPost('content_author'),
            'content_body' => $this->request->getPost('content_body'),
            'content_img' => $this->request->getPost('content_img'),
            'content_file' => $this->request->getPost('content_file'),
            'content_status' => $this->request->getPost('content_status'),
            'content_category' => $this->request->getPost('content_category'),
        ];
        $contentModel->insert($data);
        return redirect()->to('/konten');
    }

    public function create_pages()
    {
        return view('admin/create_pages');
    }

    public function create_karir()
    {
        return view('admin/create_karir');
    }
}
