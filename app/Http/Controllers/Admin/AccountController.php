<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin;

class AccountController extends Controller
{
    public function index()
    {
        $admins = Admin::all();
        return view('admin.pages.accounts.index', compact('admins'));
    }

    /**
     * Hiển thị danh sách tài khoản Admin đang bị vô hiệu hóa.
     */
    public function inactive()
    {
        $inactiveAdmins = Admin::where('is_active', false)->get();
        return view('admin.pages.accounts.inactive', compact('inactiveAdmins'));
    }

    /**
     * Kích hoạt tài khoản Admin.
     */
    public function activate(Admin $admin)
    {
        $admin->update(['is_active' => true]);
        return redirect()->route('admin.accounts.inactive')->with('success', 'Tài khoản Admin đã được kích hoạt.');
    }

    /**
     * Vô hiệu hóa tài khoản Admin.
     */
    public function deactivate(Admin $admin)
    {
        // Không cho phép vô hiệu hóa tài khoản của chính mình (nếu cần)
        if ($admin->id === auth('admin')->id()) {
            return redirect()->route('admin.pages.accounts.index')->with('error', 'Bạn không thể vô hiệu hóa tài khoản của chính mình.');
        }

        $admin->update(['is_active' => false]);
        return redirect()->route('admin.pages.accounts.index')->with('success', 'Tài khoản Admin đã bị vô hiệu hóa.');
    }

    /**
     * Hiển thị form phân quyền cho tài khoản Admin.
     */
    public function editRole(Admin $admin)
    {
        return view('admin.pages.accounts.edit_role', compact('admin'));
    }

    /**
     * Cập nhật vai trò của tài khoản Admin.
     */
    public function updateRole(Request $request, Admin $admin)
    {
        $request->validate([
            'role' => 'required|string|max:255',
        ]);

        $admin->update(['role' => $request->input('role')]);
        return redirect()->route('admin.pages.accounts.index')->with('success', 'Vai trò của tài khoản Admin đã được cập nhật.');
    }

    /**
     * Hiển thị form tạo tài khoản Admin mới.
     */
    public function create()
    {
        return view('admin.pages.accounts.create');
    }

    /**
     * Lưu tài khoản Admin mới.
     */
    public function store(Request $request)
    {
        $request->validate([
            'username' => 'required|string|max:255|unique:admins',
            'email' => 'required|string|email|max:255|unique:admins',
            'password' => 'required|string|min:8|confirmed',
            'role' => 'nullable|string|max:255',
        ]);

        Admin::create([
            'username' => $request->username,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'role' => $request->role,
            'is_active' => true, // Mặc định kích hoạt khi tạo
        ]);

        return redirect()->route('admin.pages.accounts.index')->with('success', 'Tài khoản Admin đã được tạo thành công.');
    }

    /**
     * Hiển thị form chỉnh sửa thông tin tài khoản Admin.
     */
    public function edit(Admin $admin)
    {
        return view('admin.pages.accounts.edit', compact('admin'));
    }

    /**
     * Cập nhật thông tin tài khoản Admin.
     */
    public function update(Request $request, Admin $admin)
    {
        $request->validate([
            'username' => 'required|string|max:255|unique:admins,username,' . $admin->id,
            'email' => 'required|string|email|max:255|unique:admins,email,' . $admin->id,
            'password' => 'nullable|string|min:8|confirmed',
            'role' => 'nullable|string|max:255',
        ]);

        $data = [
            'username' => $request->username,
            'email' => $request->email,
            'role' => $request->role,
        ];

        if ($request->filled('password')) {
            $data['password'] = bcrypt($request->password);
        }

        $admin->update($data);

        return redirect()->route('admin.pages.accounts.index')->with('success', 'Thông tin tài khoản Admin đã được cập nhật.');
    }

    /**
     * Xóa tài khoản Admin.
     */
    public function destroy(Admin $admin)
    {
        // Không cho phép xóa tài khoản của chính mình (nếu cần)
        if ($admin->id === auth('admin')->id()) {
            return redirect()->route('admin.pages.accounts.index')->with('error', 'Bạn không thể xóa tài khoản của chính mình.');
        }

        $admin->forceDelete();
        return redirect()->route('admin.pages.accounts.index')->with('success', 'Tài khoản Admin đã được xóa.');
    }
}
