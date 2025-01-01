<?php

namespace App\Models;

use CodeIgniter\Model;

class PagesModel extends Model
{
    protected $table = 'pages';
    protected $primaryKey = 'pages_id';
    protected $allowedFields = [
<<<<<<< HEAD
        'pages_title',
        'pages_author',
        'pages_body',
        'pages_status',
        'pages_category',
        'pages_img',
        'users_id'
=======
        'pages_title', 'pages_author', 'pages_body', 'pages_status', 
        'pages_category', 'pages_img', 'users_id'
>>>>>>> f3902e17febd08a7c839eaa2b0b3d75cf8967ad8
    ];

    public function getPagesWithCategory()
    {
        return $this->db->table($this->table)
            ->select('pages.*, pages_category.category_name')
            ->join('pages_category', 'pages.pages_category = pages_category.pagescategory_id', 'left')
            ->get()
            ->getResultArray();
    }

<<<<<<< HEAD
    public function getPagesByCategory($categoryId)
    {
        return $this->where('pages_category', $categoryId)
            ->orderBy('pages_id', 'DESC') // Mengurutkan berdasarkan ID terbaru
            ->findAll();
    }

=======
>>>>>>> f3902e17febd08a7c839eaa2b0b3d75cf8967ad8
    public function getCategories()
    {
        return $this->db->table('pages_category')
            ->select('pagescategory_id, category_name')
            ->get()
            ->getResultArray();
    }
<<<<<<< HEAD
=======
    
>>>>>>> f3902e17febd08a7c839eaa2b0b3d75cf8967ad8
}
