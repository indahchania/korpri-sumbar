<?php

namespace App\Models;

use CodeIgniter\Model;

class ContentModel extends Model
{
    protected $table            = 'content';
    protected $primaryKey       = 'content_id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        "content_title",
        "content_author",
        "content_body",
        "content_img",
        "content_file",
        "content_status",
        "content_category",
        "content_posted",
        "content_updated",
        "users_id"
    ];

    protected bool $allowEmptyInserts = false;
    protected bool $updateOnlyChanged = true;

    // Dates
    protected $useTimestamps = false; // Karena menggunakan content_posted dan content_updated
    protected $dateFormat    = 'datetime';

    // Validation
    protected $validationRules      = [];
    protected $validationMessages   = [];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;

    // Callbacks
    protected $allowCallbacks = true;

    /**
     * Get all contents with their categories (Admin)
     *
     * @return array
     */
    public function getContentsWithCategory(): array
    {
        return $this->db->table($this->table)
            ->select('content.*, content_category.category_name')
            ->join('content_category', 'content.content_category = content_category.concategory_id', 'left')
            ->get()
            ->getResultArray();
    }

    /**
     * Get content by category (User)
     *
     * @param int $categoryId
     * @return array
     */
    public function getContentByCategory(int $categoryId): array
    {
        return $this->db->table($this->table)
            ->select('content.*, content_category.category_name')
            ->join('content_category', 'content.content_category = content_category.concategory_id', 'left')
            ->where('content_category', $categoryId)
            ->where('content_status', 'publik') // Hanya konten publik
            ->orderBy('content_posted', 'DESC')
            ->get()
            ->getResultArray();
    }

    /**
     * Get single content with its category details (User)
     *
     * @param int $contentId
     * @return array|null
     */
    public function getContentWithCategory(int $contentId): ?array
    {
        return $this->db->table($this->table)
            ->select('content.*, content_category.category_name, content.content_posted, content.content_updated')
            ->join('content_category', 'content.content_category = content_category.concategory_id', 'left')
            ->where('content.content_id', $contentId)
            ->get()
            ->getRowArray();
    }

    /**
     * Get all categories (Admin/User)
     *
     * @return array
     */
    public function getCategories(): array
    {
        return $this->db->table('content_category')
            ->select('concategory_id, category_name')
            ->get()
            ->getResultArray();
    }
}
