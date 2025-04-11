<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Admin;

class AdminController extends Controller
{
    public function index()
{
    $admins = Admin::where('role', '!=', 'supper_admin')->get();
    return view('admin.pages.admins.index', compact('admins'));
}

public function approve($id)
{
    $admin = Admin::findOrFail($id);
    $admin->is_active = 1;
    $admin->save();

    return redirect()->back()->with('success', 'Phê duyệt thành công!');
}
}
