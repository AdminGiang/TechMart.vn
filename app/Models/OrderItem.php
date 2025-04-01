<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
    use HasFactory;

    protected $fillable = [
        'order_id',
        'product_id',
        'quantity',
        'price'
    ];

    // Mối quan hệ với Order
    public function order()
    {
        return $this->belongsTo(Order::class);
    }

    // Mối quan hệ với Product
    public function product()
    {
        return $this->belongsTo(Products::class, 'product_id');
    }

    // Tính tổng tiền của item
    public function getTotalAttribute()
    {
        return $this->price * $this->quantity;
    }
} 