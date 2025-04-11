<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Shipping extends Model
{
    protected $table = 'shippings';

    protected $fillable = [
        'address',
        'phone',
        'status'
    ];
    // Mối quan hệ với Order
    public function orders()
    {
        return $this->hasMany(Order::class);
    }

    public function items()
    {
        return $this->hasMany(OrderItem::class);
    }
}
