<?php

namespace App\Models;

use CodeIgniter\Model;

class CareerModel extends Model
{
    protected $table = 'career';
    protected $primaryKey = 'career_id';
    protected $allowedFields = [
        'career_title', 'career_author', 'career_body', 'career_status', 
        'career_category', 'career_img', 'users_id'
    ];

    public function getCareersWithCategory()
    {
        return $this->db->table($this->table)
            ->select('career.*, career_category.category_name')
            ->join('career_category', 'career.career_category = career_category.carcategory_id', 'left')
            ->get()
            ->getResultArray();
    }

    public function getCategories()
    {
        return $this->db->table('career_category')
            ->select('carcategory_id, category_name')
            ->get()
            ->getResultArray();
    }
    
}
