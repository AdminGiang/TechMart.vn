<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Discount extends Model
{
    protected $fillable = [
        'product_id',
        'discount_percentage',
        'discount_amount',
        'final_price',
        'start_date',
        'end_date',
        'is_active',
        'discount_type',
        'description'
    ];

    protected $casts = [
        'start_date' => 'datetime',
        'end_date' => 'datetime',
        'is_active' => 'boolean',
        'discount_percentage' => 'decimal:2',
        'discount_amount' => 'decimal:2',
        'final_price' => 'decimal:2'
    ];

    // Quan hệ với sản phẩm
    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    // Kiểm tra xem giảm giá có đang hoạt động không
    public function isValid()
    {
        $now = now();
        return $this->is_active &&
               (!$this->start_date || $this->start_date <= $now) &&
               (!$this->end_date || $this->end_date >= $now);
    }

    // Tính giá sau khi giảm
    public function calculateFinalPrice($originalPrice)
    {
        if (!$this->isValid()) {
            return $originalPrice;
        }

        if ($this->discount_type === 'percentage') {
            return $originalPrice * (1 - $this->discount_percentage / 100);
        }

        if ($this->discount_type === 'fixed') {
            return max(0, $originalPrice - $this->discount_amount);
        }

        return $originalPrice;
    }
}
