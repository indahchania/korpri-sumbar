<?php

namespace App\Models;

use CodeIgniter\Model;

class ContentModel extends Model
{
    protected $table = 'content';
    protected $primaryKey = 'content_id';
    protected $allowedFields = [
        'content_title', 'content_author', 'content_body', 'content_status', 
        'content_category', 'content_img', 'content_file', 'users_id'
    ];

    public function getContentsWithCategory()
    {
        return $this->db->table($this->table)
            ->select('content.*, content_category.category_name')
            ->join('content_category', 'content.content_category = content_category.concategory_id', 'left')
            ->get()
            ->getResultArray();
    }

    public function getCategories()
    {
        return $this->db->table('content_category')
            ->select('concategory_id, category_name')
            ->get()
            ->getResultArray();
    }
}
