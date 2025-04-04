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
        try {
            // Validate dữ liệu
            $request->validate([
                'name' => 'required|string|max:255',
                'email' => 'required|string|email|max:255|unique:users',
                'password' => 'required|string|min:6',
                'phone' => 'required|string|max:15|unique:users',
                'address' => 'required|string|max:500',
            ], [
                'name.required' => 'Vui lòng nhập tên người dùng',
                'email.required' => 'Vui lòng nhập email',
                'email.email' => 'Email không hợp lệ',
                'email.unique' => 'Email đã được sử dụng',
                'password.required' => 'Vui lòng nhập mật khẩu',
                'password.min' => 'Mật khẩu phải có ít nhất 6 ký tự',
                'phone.required' => 'Vui lòng nhập số điện thoại',
                'phone.max' => 'Số điện thoại không được vượt quá 15 ký tự',
                'phone.unique' => 'Số điện thoại đã được sử dụng',
                'address.required' => 'Vui lòng nhập địa chỉ',
                'address.max' => 'Địa chỉ không được vượt quá 500 ký tự'
            ]);

            // Tạo user mới
            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'phone' => $request->phone,
                'address' => $request->address,
            ]);

            // Lưu email vào session để hiển thị ở trang login
            session(['registered_email' => $user->email]);
            session(['registered_name' => $user->name]);
            session(['registered_phone' => $user->phone]);
            session(['registered_address' => $user->address]);
            // Đăng nhập người dùng

            return redirect()->route('login', 'contact.form')->with('success', 'Đăng ký thành công! Vui lòng đăng nhập.');

        } catch (\Illuminate\Validation\ValidationException $e) {
            return back()->withErrors($e->validator)->withInput();
        } catch (\Exception $e) {
            return back()->with('error', 'Có lỗi xảy ra. Vui lòng thử lại sau.')->withInput();
        }
    }
    
}
