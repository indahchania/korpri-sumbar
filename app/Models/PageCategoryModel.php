<?php

namespace App\Models;

use CodeIgniter\Model;

class PageCategoryModel extends Model
{
    protected $table = 'pages_category';
    protected $primaryKey = 'pagescategory_id';
    protected $allowedFields = ['category_name'];
}
