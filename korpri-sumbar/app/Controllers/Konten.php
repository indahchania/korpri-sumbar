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

    public function edit_konten($content_id)
    {
        $contentModel = new ContentModel();

        // Ambil data konten berdasarkan ID
        $data['content'] = $contentModel->find($content_id);

        // Ambil semua kategori dari database
        $data['categories'] = $contentModel->getCategories();

        // Kirim data ke view
        return view('admin/edit/edit_konten', $data);
    }

    public function update_konten($content_id)
    {
        $contentModel = new ContentModel();

        // Ambil data konten lama
        $existingContent = $contentModel->find($content_id);
        if (!$existingContent) {
            return redirect()->back()->with('error', 'Content not found.');
        }

        // Proses upload gambar baru jika ada
        $contentImg = $this->request->getFile('content_img');
        $newImgName = $existingContent['content_img']; // Default ke gambar lama
        if ($contentImg && $contentImg->isValid() && !$contentImg->hasMoved()) {
            // Hapus gambar lama jika ada
            if ($existingContent['content_img'] && file_exists('uploads/konten/' . $existingContent['content_img'])) {
                unlink('uploads/konten/' . $existingContent['content_img']);
            }
            $newImgName = $contentImg->getRandomName();
            $contentImg->move('uploads/konten', $newImgName);
        }

        // Proses upload file baru jika ada
        $contentFile = $this->request->getFile('content_file');
        $newFileName = $existingContent['content_file']; // Default ke file lama
        if ($contentFile && $contentFile->isValid() && !$contentFile->hasMoved()) {
            // Hapus file lama jika ada
            if ($existingContent['content_file'] && file_exists('uploads/konten/' . $existingContent['content_file'])) {
                unlink('uploads/konten/' . $existingContent['content_file']);
            }
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
        ];

        // Simpan perubahan
        try {
            $contentModel->update($content_id, $data);
            session()->setFlashdata('message', 'Content successfully updated.');
            return redirect()->to(base_url('konten'));
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Failed to update content: ' . $e->getMessage());
        }
    }

    public function delete_konten($content_id)
    {
        $contentModel = new ContentModel();

        // Ambil data konten berdasarkan ID
        $existingContent = $contentModel->find($content_id);
        if (!$existingContent) {
            return redirect()->back()->with('error', 'Content not found.');
        }

        // Hapus gambar jika ada
        if ($existingContent['content_img'] && file_exists('uploads/konten/' . $existingContent['content_img'])) {
            unlink('uploads/konten/' . $existingContent['content_img']);
        }

        // Hapus file jika ada
        if ($existingContent['content_file'] && file_exists('uploads/konten/' . $existingContent['content_file'])) {
            unlink('uploads/konten/' . $existingContent['content_file']);
        }

        // Hapus data konten
        $contentModel->delete($content_id);
        session()->setFlashdata('message', 'Content successfully deleted.');
        return redirect()->to(base_url('konten'));
    }
}
