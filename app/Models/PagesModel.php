<?php

namespace App\Models;

use CodeIgniter\Model;

class PagesModel extends Model
{
    protected $table = 'pages';
    protected $primaryKey = 'pages_id';
    protected $allowedFields = [
        'pages_title',
        'pages_author',
        'pages_body',
        'pages_status',
        'pages_category',
        'pages_img',
        'users_id'
    ];

    public function getPagesByCategory($categoryId)
    {
        return $this->where('pages_category', $categoryId)
            ->where('pages_status', 'publik') // Ambil hanya yang berstatus 'publik'
            ->findAll();
    }

    public function getPagesWithCategory()
    {
        return $this->db->table($this->table)
            ->select('pages.*, pages_category.category_name')
            ->join('pages_category', 'pages.pages_category = pages_category.pagescategory_id', 'left')
            ->get()
            ->getResultArray();
    }

    public function getCategories()
    {
        return $this->db->table('pages_category')
            ->select('pagescategory_id, category_name')
            ->get()
            ->getResultArray();
    }
}
