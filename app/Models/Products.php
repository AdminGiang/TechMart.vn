<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    use HasFactory;

    protected $table = 'products'; // Bảng trong database

    protected $fillable = [
        'name', 'description', 'categoryId', 'userId', 'price', 
        'isPublish', 'sale', 'image', 'tag', 'isTagBlog', 'saleId', 'count'
    ];
}
