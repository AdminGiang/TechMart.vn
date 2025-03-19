<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $table = 'products';
    protected $primaryKey = 'Id';
    public $timestamps = true;

    protected $fillable = [
        'Name',
        'Description',
        'CategoryId',
        'UserId',
        'Price',
        'IsPublish',
        'Sale',
        'Image',
        'Tag',
        'IsTagBlog',
        'Count'
    ];

    protected $casts = [
        'IsPublish' => 'boolean',
        'IsTagBlog' => 'boolean',
        'Price' => 'float',
        'Sale' => 'float',
        'Count' => 'integer'
    ];

    public function discounts()
    {
        return $this->hasMany(Discount::class);
    }

    public function getActiveDiscount()
    {
        return $this->discounts()
                    ->where('is_active', true)
                    ->where(function($query) {
                        $now = now();
                        $query->where(function($q) use ($now) {
                            $q->whereNull('start_date')
                              ->orWhere('start_date', '<=', $now);
                        })
                        ->where(function($q) use ($now) {
                            $q->whereNull('end_date')
                              ->orWhere('end_date', '>=', $now);
                        });
                    })
                    ->latest()
                    ->first();
    }

    public function getDiscountedPrice()
    {
        $discount = $this->getActiveDiscount();
        if ($discount) {
            return $discount->calculateFinalPrice($this->price);
        }
        return $this->price;
    }

    public function getDiscountPercentage()
    {
        $discount = $this->getActiveDiscount();
        if ($discount && $discount->discount_type === 'percentage') {
            return $discount->discount_percentage;
        }
        if ($discount && $discount->discount_type === 'fixed') {
            return round(($discount->discount_amount / $this->price) * 100, 2);
        }
        return 0;
    }
} 