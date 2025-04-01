<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Coupons extends Model
{
    use HasFactory;

    protected $fillable = [
        'code',
        'name',
        'description',
        'type',
        'value',
        'min_order_amount',
        'quantity',
        'usage_limit_per_user',
        'start_date',
        'end_date',
        'is_active',
    ];

    public function users(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'user_vouchers')->withTimestamps();
    }

    public function isValid($orderAmount = null, $userId = null)
    {
        if (!$this->is_active || ($this->start_date && now()->lt($this->start_date)) || ($this->end_date && now()->gt($this->end_date))) {
            return false;
        }

        if ($this->min_order_amount && $orderAmount < $this->min_order_amount) {
            return false;
        }

        if ($this->quantity !== null && $this->users()->count() >= $this->quantity) {
            return false;
        }

        if ($userId && $this->usage_limit_per_user !== null && $this->users()->where('user_id', $userId)->count() >= $this->usage_limit_per_user) {
            return false;
        }

        return true;
    }

    public function apply($orderAmount)
    {
        if ($this->type === 'fixed') {
            return min($this->value, $orderAmount); // Giảm tối đa bằng giá trị đơn hàng
        } elseif ($this->type === 'percentage') {
            return round($orderAmount * ($this->value / 100), 2);
        }
        return 0;
    }
}
