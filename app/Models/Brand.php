<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Brand extends Model
{
    use HasFactory;

    protected $table = 'brands'; // Tên bảng trong database
    protected $fillable = ['name', 'slug', 'logo', 'description', 'status'];

    // Quan hệ với sản phẩm: Một thương hiệu có nhiều sản phẩm
    public function products()
    {
        return $this->hasMany(Products::class, 'brand_id'); // Một thương hiệu có nhiều sản phẩm
    }
}
