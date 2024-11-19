<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ContentModel;

class Konten extends BaseController
{
    public function index()
    {
        $contentModel = new ContentModel();

        // Ambil data dengan kategori
        $data['contents'] = $contentModel->getContentsWithCategory();

        // Kirim data ke view
        return view('admin/konten', $data);
    }

    public function create_konten()
    {
        $contentModel = new ContentModel();

        // Ambil semua kategori dari database
        $data['categories'] = $contentModel->getCategories();

        // Kirim data kategori ke view
        return view('admin/create/create_konten', $data);
    }

    public function save_konten()
    {
        $contentModel = new ContentModel();
        $db = \Config\Database::connect();

        // Ambil users_id dari session
        $users_id = session()->get('users_id');

        // Proses upload gambar
        $contentImg = $this->request->getFile('content_img');
        $newImgName = null;
        if ($contentImg && $contentImg->isValid() && !$contentImg->hasMoved()) {
            $newImgName = $contentImg->getRandomName();
            $contentImg->move('uploads/konten', $newImgName);
        }

        // Proses upload file
        $contentFile = $this->request->getFile('content_file');
        $newFileName = null;
        if ($contentFile && $contentFile->isValid() && !$contentFile->hasMoved()) {
            $newFileName = $contentFile->getRandomName();
            $contentFile->move('uploads/konten', $newFileName);
        }

        // Ambil input dari form
        $data = [
            'content_title'    => $this->request->getPost('content_title'),
            'content_author'   => $this->request->getPost('content_author'),
            'content_body'     => $this->request->getPost('content_body'),
            'content_img'      => $newImgName,
            'content_file'     => $newFileName,
            'content_status'   => $this->request->getPost('content_status'),
            'content_category' => $this->request->getPost('content_category'),
            'users_id'         => $users_id,
        ];

        // Validasi kategori
        $categoryExists = $db->table('content_category')
            ->where('concategory_id', $data['content_category'])
            ->countAllResults();

        if ($categoryExists === 0) {
            return redirect()->back()->with('error', 'Invalid content category selected.');
        }

        // Simpan data
        try {
            $contentModel->insert($data);
            session()->setFlashdata('message', 'Content successfully created.');
            return redirect()->to(base_url('konten'));
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Failed to save content: ' . $e->getMessage());
        }
    }
}
