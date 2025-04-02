<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Products;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    
    public function index()
    {
        $products = Products::all();
        return view('admin.pages.Product.index', compact('products'));
    }

    
    public function create()
    {
        return view('admin.pages.Product.create');
    }

   
    public function store(Request $request)
    {
        Products::create($request->all());
        return redirect()->route('product.index')->with('success', 'Sản phẩm đã thêm!');
    }

    
    public function show(string $id)
    {
        //
    }

   
    public function edit(string $id)
    {
        $product = Products::findOrFail($id);
        return view('admin.pages.Product.edit', compact('product'));
    }

    
    public function update(Request $request, string $id)
    {
        $product = Products::findOrFail($id);
        $product->update($request->all());
        return redirect()->route('product.index')->with('success', 'Cập nhật thành công!');
    }

   
    public function destroy(string $id)
    {
        Products::destroy($id);
        return redirect()->route('product.index')->with('success', 'Xóa sản phẩm thành công!');
    }
}
