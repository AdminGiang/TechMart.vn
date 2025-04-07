<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    public function index()
    {
        $brands = Brand::all();
        return view('admin.pages.Brand.index', compact('brands'));
    }

    public function create()
    {
        return view('admin.pages.Brand.add');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:brands|max:255',
        ]);

        Brand::create($request->all());

        return redirect()->route('admin.pages.Brand.index')->with('success', 'Thêm thương hiệu thành công!');
    }

    public function edit(Brand $brand)
    {
        return view('admin.pages.Brand.edit', compact('brand'));
    }

    public function update(Request $request, Brand $brand)
    {
        $request->validate([
            'name' => 'required|unique:brands,name,' . $brand->id . '|max:255',
        ]);

        $brand->update($request->all());

        return redirect()->route('admin.pages.Brand.index')->with('success', 'Cập nhật thương hiệu thành công!');
    }


    public function destroy(Brand $brand)
    {
        $brand->delete();

        return redirect()->route('admin.pages.Brand.index')->with('success', 'Xóa thương hiệu thành công!');
    }

}
