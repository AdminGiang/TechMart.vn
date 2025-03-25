<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class RegisterController extends Controller
{
    public function showRegisterForm()
    {
        return view('pages.register'); // Đảm bảo file này tồn tại trong resources/views/auth
    }
    // Xử lý đăng ký
    public function register(Request $request)
    {
        //dd($request->all());
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users', // Email không trùng
            'password' => 'required|string|min:3',
            'phone' => 'required|string|max:15|unique:users', // Số điện thoại không trùng
            'address' => 'required|string|max:500',
            //'created_at' => now(), // Lưu thời gian hiện tại
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'phone' => $request->phone,
            'address' => $request->address,
            'created_at' => now(), // Lưu thời gian hiện tại
        ]);
        session(['registered_email' => $request->email]); // Lưu email vào session để hiển thị ở trang login
        return redirect()->route('login');
    }
    
}
