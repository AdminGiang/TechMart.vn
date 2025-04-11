<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class RegisterController extends Controller
{
    protected $viewPath = 'admin.pages.';

    public function showRegisterForm()
    {
        return view($this->viewPath .'auth.register');    
    }

    public function register(Request $request)
    {
        //dd($request->all());
        $validated = $request->validate([
            'username' => 'required|string|max:255|unique:admins',
            'email' => 'required|string|email|max:255|unique:admins',
            'phone' => 'required|string|max:20|unique:admins',
            'password' => 'required|string|min:6|confirmed',
            'avatar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $data = [
            'username' => $request->username,
            'email' => $request->email,
            'phone' => $request->phone,
            'password' => Hash::make($request->password),
            'role' => 'admin',
            'is_active' => 0, // chờ duyệt
        ];

        if ($request->hasFile('avatar')) {
            $filename = time().'_'.$request->avatar->getClientOriginalName();
            $request->avatar->move(public_path('avatars'), $filename);
            $data['avatar'] = 'avatars/'.$filename;
        }

        Admin::create($data);

        return redirect()->route('admin.pages.auth.login')->with('success', 'Đăng ký thành công, vui lòng chờ phê duyệt!');
    }
}
