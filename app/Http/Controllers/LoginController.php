<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function showloginForm()
    {
        return view('pages.login'); 
    }
    // public function login(Request $request) 
    // {
    //     $credentials = $request->validate([
    //         'email' => 'required|email',
    //         'password' => 'required|string',
    //     ]);

    //     $credentials = $request->only('email', 'password');
    //     $remember = $request->has('remember'); // Kiểm tra checkbox Remember Me

    //     if (Auth::attempt()($credentials)) { // Kiểm tra mật khẩu có khớp với mật khẩu đã hash trong database không
    //         $user = Auth::user();
    //         return redirect()->route('home');
    //     }
    //     return response()->json(['message' => 'Sai thông tin đăng nhập'], 401);
    // }
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required|string',
        ]);

        $remember = $request->has('remember'); // Kiểm tra checkbox Remember Me

        if (Auth::attempt($credentials, $remember)) { // Kiểm tra mật khẩu có khớp với mật khẩu đã hash trong database không
            return redirect()->route('home'); // Nếu khớp thì chuyển hướng về trang chủ
        }

        return response()->json(['message' => 'Sai thông tin đăng nhập'], 401);
    }
}
