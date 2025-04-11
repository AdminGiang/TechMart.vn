<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Laravel\Sanctum\HasApiTokens;

class Admin extends Authenticatable
{
    use HasApiTokens, Notifiable, SoftDeletes;

    protected $table = 'admins';
    
    protected $fillable = [
        'username',
        'email',
        'phone',
        'avatar',
        'password',
        'is_active',
        'email_verified_at',
        'role',
        'permissions',
        'last_login_ip',
        'last_login_at',
    ];

    protected $hidden = [
        'password',
        'remember_token',
        'permissions',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'last_login_at' => 'datetime',
        'is_active' => 'boolean',
    ];

    // =============================
    // ===== QUAN HỆ MỞ RỘNG =======
    // =============================

    // 1. Admin tạo nhiều sản phẩm (nếu có cột admin_id trong bảng products)
    public function products()
    {
        return $this->hasMany(Products::class);
    }

    // // 2. Admin có nhiều logs hoạt động
    // public function logs()
    // {
    //     return $this->hasMany(Log::class);
    // }

    // 3. Admin tạo nhiều đơn hàng (nếu có)
    public function orders()
    {
        return $this->hasMany(Order::class);
    }

    // Có thể mở rộng thêm quan hệ với banners, categories,...
}
