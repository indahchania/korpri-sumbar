<?php 

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\RequestInterface;
use App\Models\CareerModel;

class Karir extends BaseController {
    public function index() 
    {
        return view ('admin/karir');
    }

    public function create_karir() 
    {
        return view ('admin/create/create_karir');
    }

    public function save_karir(){
        $careerModel = new CareerModel();
        $data = [
            'career_title' => $this->request->getPost('career_title'),
            'career_author' => $this->request->getPost('career_author'),
            'career_body' => $this->request->getPost('career_body'),
            'career_img' => $this->request->getPost('career_img'),
            'career_file' => $this->request->getPost('career_file'),
            'career_status' => $this->request->getPost('career_status'),
            'career_category' => $this->request->getPost('career_category'),
        ];
        $careerModel->insert($data);
        return redirect()->to('/karir');
    }
}