<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class ProductDetail extends Model
{
    use HasFactory;

    protected $table = 'product_details';

    protected $fillable = [
        'product_id', 
        'color', 
        'storage_capacity', 
        'screen_size', 
        'battery_capacity', 
        'chipset', 
        'camera', 
        'extra_features'
    ];

    public function product() {
        return $this->belongsTo(Products::class, 'product_id');
    }
}
