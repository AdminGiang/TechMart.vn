<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Admin;

class AdminController extends Controller
{
    public function login()
    {
        return view('admin.pages.Login.index');
    }

    public function index()
    {
        $adms = Admin::all();
        return view('admin.pages.Admin.index', compact('adms'));
    }

    public function create()
    {
        return view('admin.pages.Admin.add');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:admins|max:255',
            'email' => 'required|email|unique:admins|max:255',
            'password' => 'required',
            'phone' => 'required|numeric|digits_between:10,12',
        ]);
        //dd($request->all());
        Admin::create($request->all());

        return redirect()->route('admin.pages.Admin.index')->with('success', 'Thêm admin thành công!');
    }

    // public function edit(Brand $brand)
    // {
    //     return view('admin.pages.Brand.edit', compact('brand'));
    // }

    // public function update(Request $request, Brand $brand)
    // {
    //     $request->validate([
    //         'name' => 'required|unique:brands,name,' . $brand->id . '|max:255',
    //     ]);

    //     $brand->update($request->all());

    //     return redirect()->route('admin.pages.Brand.index')->with('success', 'Cập nhật thương hiệu thành công!');
    // }


    // public function destroy(Brand $brand)
    // {
    //     $brand->delete();

    //     return redirect()->route('admin.pages.Brand.index')->with('success', 'Xóa thương hiệu thành công!');
    // }
}
