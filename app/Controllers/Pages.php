<?php 

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\PagesModel;
use App\Models\PageCategoryModel;

class Pages extends BaseController 
{
    public function index()
    {
        $PagesModel = new PagesModel();

        // Ambil data dengan kategori
        $data['pages'] = $PagesModel->getPagesWithCategory();

        return view('admin/pages', $data);
    }

    public function create_pages()
    {
        $PagesModel = new PagesModel();

        // Ambil semua kategori dari database
        $data['categories'] = $PagesModel->getCategories();

        // Kirim data kategori ke view
        return view('admin/create/create_pages', $data);
    }

    public function save_pages()
    {
        $PagesModel = new PagesModel();
        $db = \Config\Database::connect();

        // Ambil users_id dari session
        $users_id = session()->get('users_id');

        // Proses upload gambar
        $pagesImg = $this->request->getFile('pages_img');
        $newImgName = null;
        if ($pagesImg && $pagesImg->isValid() && !$pagesImg->hasMoved()) {
            $newImgName = $pagesImg->getRandomName();
            $pagesImg->move('uploads/pages', $newImgName);
        }

        // Ambil input dari form
        $data = [
            'pages_title'    => $this->request->getPost('pages_title'),
            'pages_author'   => $this->request->getPost('pages_author'),
            'pages_body'     => $this->request->getPost('pages_body'),
            'pages_img'      => $newImgName,
            'pages_status'   => $this->request->getPost('pages_status'),
            'pages_category' => $this->request->getPost('pages_category'),
            'users_id'       => $users_id,
        ];

        // Validasi kategori
        $categoryExists = $db->table('pages_category')
            ->where('pagescategory_id', $data['pages_category'])
            ->countAllResults();

        if ($categoryExists === 0) {
            return redirect()->back()->with('error', 'Invalid pages category selected.');
        }

        // Simpan data
        try {
            $PagesModel->insert($data);
            session()->setFlashdata('message', 'pages successfully created.');
            return redirect()->to(base_url('pages'));
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Failed to save pages: ' . $e->getMessage());
        }
    }

    public function edit_pages($pages_id)
    {
        $PagesModel = new PagesModel();

        // Ambil data pages berdasarkan ID
        $data['pages'] = $PagesModel->find($pages_id);

        // Ambil semua kategori dari database
        $data['categories'] = $PagesModel->getCategories();

        // Kirim data ke view
        return view('admin/edit/edit_pages', $data);
    }

    public function update_pages($pages_id)
    {
        $PagesModel = new PagesModel();

        // Ambil data pages lama
        $existingPages = $PagesModel->find($pages_id);
        if (!$existingPages) {
            return redirect()->back()->with('error', 'Pages not found.');
        }

        // Proses upload gambar baru jika ada
        $pagesImg = $this->request->getFile('pages_img');
        $newImgName = $existingPages['pages_img']; // Default ke gambar lama
        if ($pagesImg && $pagesImg->isValid() && !$pagesImg->hasMoved()) {
            // Hapus gambar lama jika ada
            if ($existingPages['pages_img'] && file_exists('uploads/pages/' . $existingPages['pages_img'])) {
                unlink('uploads/pages/' . $existingPages['pages_img']);
            }
            $newImgName = $pagesImg->getRandomName();
            $pagesImg->move('uploads/pages', $newImgName);
        }

        // Ambil input dari form
        $data = [
            'pages_title'    => $this->request->getPost('pages_title'),
            'pages_author'   => $this->request->getPost('pages_author'),
            'pages_body'     => $this->request->getPost('pages_body'),
            'pages_img'      => $newImgName,
            'pages_status'   => $this->request->getPost('pages_status'),
            'pages_category' => $this->request->getPost('pages_category'),
        ];

        // Simpan perubahan
        try {
            $PagesModel->update($pages_id, $data);
            session()->setFlashdata('message', 'pages successfully updated.');
            return redirect()->to(base_url('pages'));
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Failed to update pages: ' . $e->getMessage());
        }
    }

    public function delete_pages($pages_id)
    {
        $PagesModel = new PagesModel();

        $existingPages = $PagesModel->find($pages_id);
        if (!$existingPages) {
            return redirect()->back()->with('error', 'pages not found.');
        }

        if ($existingPages['pages_img'] && file_exists('uploads/pages/' . $existingPages['pages_img'])) {
            unlink('uploads/pages/' . $existingPages['pages_img']);
        }

        $PagesModel->delete($pages_id);
        session()->setFlashdata('message', 'pages successfully deleted.');
        return redirect()->to(base_url('pages'));
    }

    public function tentang($categoryId = null)
    {
        $pagesModel = new PagesModel();
        $pagesCategoryModel = new PageCategoryModel();

        // Ambil kategori
        $categories = $pagesCategoryModel->getCategories();

        // Logging untuk memastikan kategori ID diterima dengan benar
        log_message('debug', 'Category ID: ' . $categoryId);
        log_message('debug', 'Categories: ' . json_encode($categories));

        // Jika ID kategori tidak null, ambil halaman berdasarkan kategori
        $pages = [];
        if ($categoryId) {
            $pages = $pagesModel->where('pages_category', $categoryId)
                                ->where('pages_status', 'publik')
                                ->findAll();
        }

        return view('tentang/tentang', [
            'categories' => $categories,
            'pages' => $pages,
            'selectedCategory' => $categoryId,
        ]);
    }
}
