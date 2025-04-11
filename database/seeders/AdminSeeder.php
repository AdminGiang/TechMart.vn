<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Admin;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    public function run(): void
    {
        Admin::create([
            'username' => 'superadmin',
            'email' => 'admin@example.com',
            'phone' => '0123456789',
            'password' => Hash::make('password123'),
            'role' => 'superadmin',
            'is_active' => 1,
            'email_verified_at' => now(),
            'last_login_ip' => request()->ip(),
            'last_login_at' => now(),
        ]);
    }
}
