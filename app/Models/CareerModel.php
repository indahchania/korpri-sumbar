<?php

namespace App\Models;

use CodeIgniter\Model;

class CareerModel extends Model
{
    protected $table = 'career'; // Nama tabel
    protected $primaryKey = 'career_id'; // Primary key
    protected $allowedFields = [
        'career_title', 'career_author', 'career_body', 'career_status',
        'career_category', 'career_img', 'users_id'
    ];

    /**
     * Mengambil semua data karir beserta nama kategori.
     *
     * @return array
     */
    public function getCareersWithCategory()
    {
        return $this->db->table($this->table)
            ->select('career.*, career_category.category_name')
            ->join('career_category', 'career.career_category = career_category.carcategory_id', 'left')
            ->orderBy('career_posted', 'DESC') // Tambahkan sorting berdasarkan tanggal posting
            ->get()
            ->getResultArray();
    }

    /**
     * Mengambil data karir berdasarkan nama kategori.
     *
     * @param string $categoryName
     * @return array
     */
    public function getCareersWithCategoryByCategoryName($categoryName)
    {
        return $this->db->table($this->table)
            ->select('career.*, career_category.category_name')
            ->join('career_category', 'career.career_category = career_category.carcategory_id', 'left')
            ->where('career.career_status', 'publik') // Tambahkan filter status "publik"
            ->where('career_category.category_name', $categoryName) // Filter berdasarkan nama kategori
            ->orderBy('career_posted', 'DESC') // Tambahkan sorting berdasarkan tanggal posting
            ->get()
            ->getResultArray();
    }

    /**
     * Mengambil semua kategori dari tabel `career_category`.
     *
     * @return array
     */
    public function getCategories()
    {
        return $this->db->table('career_category')
            ->select('carcategory_id, category_name')
            ->orderBy('category_name', 'ASC') // Sorting berdasarkan nama kategori
            ->get()
            ->getResultArray();
    }
}
