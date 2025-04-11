<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;

class Authenticate extends Middleware
{
    protected function redirectTo($request)
{
    if (! $request->expectsJson()) {
        // Nếu URL bắt đầu bằng 'admin' thì redirect về login của admin
        if ($request->is('admin') || $request->is('admin/*')) {
            return route('admin.pages.auth.login');
        }

        // Ngược lại (User) thì về login mặc định
        return route('login');
    }
}
}
