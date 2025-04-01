<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    use HasFactory;

    protected $table = 'products';

    protected $fillable = [
        'name', 
        'description', 
        'category_id', 
        'brand_id', 
        'price', 
        'discount', 
        'stock', 
        'image', 
        'warranty_period', 
        'stock_status'
    ];

    public function details() {
        return $this->hasOne(ProductDetail::class, 'product_id');
    }

    public function category() {
        return $this->belongsTo(Category::class, 'category_id'); 
    }

    public function brand() {
        return $this->belongsTo(Brand::class, 'brand_id');
    }
}
