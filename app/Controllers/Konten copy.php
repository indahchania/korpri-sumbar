<?php 

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ContentModel;

class Konten extends BaseController {

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
    $data['categories'] = $contentModel->getCategories(); // Ambil data kategori dari database
    return view('admin/create/create_konten', $data);
}


    public function save_konten()
{
    $contentModel = new ContentModel();
    $db = \Config\Database::connect();

    // Ambil users_id dari session
    $users_id = session()->get('users_id');
    if (!$users_id) {
        return redirect()->to('/login')->with('error', 'Session expired, please log in again.');
    }

    // Ambil input dari form
    $contentCategory = $this->request->getPost('content_category');

    // Validasi kategori konten (apakah kategori ada dalam database)
    $categoryExists = $db->table('content_category')
        ->where('concategory_id', $contentCategory)
        ->countAllResults();

    if ($categoryExists === 0) {
        return redirect()->back()->with('error', 'Kategori konten tidak valid.');
    }

    // Proses upload gambar (optional)
    $contentImg = $this->processFile('content_img', 'uploads/konten/');
    $contentFile = $this->processFile('content_file', 'uploads/konten/');

    // Data untuk disimpan
    $data = [
        'content_title'   => $this->request->getPost('content_title'),
        'content_author'  => $this->request->getPost('content_author'),
        'content_body'    => $this->request->getPost('content_body'),
        'content_img'     => $contentImg,
        'content_file'    => $contentFile,
        'content_status'  => $this->request->getPost('content_status'),
        'content_category'=> $contentCategory,
        'users_id'        => $users_id,
    ];

    // Simpan ke database
    try {
        $contentModel->insert($data);
        session()->setFlashdata('message', 'Konten berhasil disimpan.');
        return redirect()->to(base_url('konten'));
    } catch (\Exception $e) {
        return redirect()->back()->with('error', 'Gagal menyimpan konten: ' . $e->getMessage());
    }
}

/**
 * Helper untuk memproses file
 *
 * @param string $fileInputName
 * @param string $uploadPath
 * @return string|null
 */
private function processFile(string $fileInputName, string $uploadPath): ?string
{
    $file = $this->request->getFile($fileInputName);
    if ($file && $file->isValid() && !$file->hasMoved()) {
        $newFileName = $file->getRandomName();
        $file->move($uploadPath, $newFileName);
        return $uploadPath . $newFileName;
    }
    return null;
}

}
