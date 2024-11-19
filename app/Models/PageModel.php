<?php

namespace App\Models;

use CodeIgniter\Model;

class PageModel extends Model
{
    protected $table = 'pages';
    protected $primaryKey = 'pages_id';
    protected $allowedFields = [
        'pages_title',
        'pages_author',
        'pages_posted',
        'pages_updated',
        'pages_body',
        'pages_img',
        'pages_status',
        'pages_name',
        'users_id'
    ];
}
