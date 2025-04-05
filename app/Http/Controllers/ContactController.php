<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contacts;
use Illuminate\Support\Facades\Auth;


class ContactController extends Controller
{
    //đăng nhập sẻ tự điền thông tin
    public function AutoFill()
    {
        // Lấy thông tin đã đăng nhập
        $user = Auth::user();
        $name = session('name', $user->name);

        return view('pages.contact', [
            'name' => $name,
            'email' => $user->email,
            'phone' => $user->phone,
        ]);
    }

    public function sentContact(Request $request)
    {
        // Xác thực dữ liệu từ form
        $request->validate([
            'content' => 'required|string|max:1000',
        ]);
        try{
        // Tạo contact mới
        Contacts::create([
            'userid' => Auth::id(),
            'name' => Auth::user()->name,
            'email' => Auth::user()->email,
            'phone' => Auth::user()->phone,
            'content' => $request->input('content'),
            'status' => 'pending', // Mặc định trạng thái là "pending"
        ]);
       // session(['name' => Auth::user()->name]);
         // Xóa session sau khi gửi liên hệ thành công
         session()->forget(['registered_name', 'registered_email', 'registered_phone']);
        return redirect()->route('contact.form')->with('success', 'gửi thành công!');

        }
        catch(\Exception $e){
            return redirect()->route('contact.form')->with('error', 'Đã xảy ra lỗi. Vui lòng thử lại.');

        }
    }


}
