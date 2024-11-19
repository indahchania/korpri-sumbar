<?php 

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\RequestInterface;
use App\Models\PagesModel;

class Pages extends BaseController {

    public function index()
    {
        return view('admin/pages');
    }

    public function create_pages()
    {
        return view('admin/create/create_pages');
    }

    public function save_pages()
    {
        $PagesModel = new PagesModel();
        $data = [
            'pages_title' => $this->request->getPost('pages_title'),
            'pages_body' => $this->request->getPost('pages_body'),
            'pages_status' => $this->request->getPost('pages_status'),
        ];
    }
}