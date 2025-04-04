<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;


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

        if (Auth::attempt($credentials)) {
            $user = Auth::user(); 
            // dd($user->role);
            if ($user->role === 'admin') {
                return redirect()->route('admin.dashboard'); // Chuyển hướng admin đến dashboard
            }
    
            return redirect()->route('/home'); // Người dùng bình thường về trang chủ
        }
    
        return back()->withErrors(['login' => 'Bạn đã nhập tài khoản hoặc mật khẩu không đúng!']);
    }
    
}
