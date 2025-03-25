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
        public function login(Request $request)
    {
        $credentials = $request->validate([ // Kiểm tra dữ liệu nhập vào
            'email' => 'required|email',
            'password' => 'required|string', 
        ]);

        $remember = $request->has('remember'); // Kiểm tra checkbox Remember Me

        if (Auth::attempt($credentials, $remember)) { // Kiểm tra mật khẩu có khớp với mật khẩu đã hash trong database không
            return redirect()->route('home'); // Nếu khớp thì chuyển hướng về trang chủ
        }

        return redirect()->route('error')->with('error'); /// Nếu không khớp thì hiển thị thông báo lỗi
    }
}
