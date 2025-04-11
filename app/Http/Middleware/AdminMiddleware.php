<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class AdminMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        // Kiểm tra đăng nhập và quyền admin
        if (Auth::check() && Auth::user()->role === 'admin') {
            return $next($request);
        }

        // Nếu không phải admin → chuyển hướng về trang login hoặc home
        return redirect()->route('admin.pages.auth.login')->with('error', 'Bạn không có quyền truy cập!');
    }
}
