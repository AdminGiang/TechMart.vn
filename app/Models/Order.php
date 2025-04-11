<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'shipping_id',
        'coupon_id',
        'total_price',
        'status',
        'payment_method',
        'shipping_address',
        'shipping_city',
        'notes'
    ];

    protected $attributes = [
        'status' => 'pending'
    ];

    // Mối quan hệ với User
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Mối quan hệ với OrderItem
    public function orderitems()
    {
        return $this->hasMany(OrderItem::class);
    }   

    // Mối quan hệ với Shipping
    public function shipping()
    {
        return $this->belongsTo(Shipping::class);
    }

    // Mối quan hệ với Coupon
    public function coupon()
    {
        return $this->belongsTo(Coupons::class);
    }

    // Mối quan hệ với OrderItems
    public function items()
    {
        return $this->hasMany(OrderItem::class);
    }

    // Tính tổng tiền của đơn hàng
    public function calculateTotal()
    {
        $subtotal = $this->items->sum(function($item) {
            return $item->price * $item->quantity;
        });

        // Nếu có mã giảm giá
        if ($this->coupon) {
            $discount = $this->coupon->calculateDiscount($subtotal);
            $subtotal -= $discount;
        }

        // Nếu có phí vận chuyển
        if ($this->shipping) {
            $subtotal += $this->shipping->fee;
        }

        return $subtotal;
    }
} 