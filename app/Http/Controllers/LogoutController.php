<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LogoutController extends Controller
{
    public function logout(Request $request)
    {
        Auth::logout(); // Đăng xuất
        return redirect()->route('login'); // Chuyển hướng về trang đăng nhập
    }
}
