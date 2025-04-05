<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Products;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Log;

class ProductController extends Controller
{
    
    public function index()
    {
        $products = Products::all();
        return view('admin.pages.Product.index', compact('products'));
    }

    
    public function create()
    {
        
        $categories = Category::all();
        $brands = Brand::all();
        return view('admin.pages.product.create', compact('categories', 'brands'));
    }

   
    public function store(Request $request)
{
    if ($request->hasFile('hinh_anh')) {
        $path = $request->file('hinh_anh')->store('products', 'public');
        
    }

    $request->validate([
        'name' => 'required',
        'description' => 'nullable',
        'category_id' => 'required|exists:categories,id',
        'brand_id' => 'required|exists:brands,id',
        'price' => 'required|numeric',
        'discount' => 'nullable|integer',
        'image' => 'nullable|image|mimes:jpg,jpeg,png',
        'stock' => 'required|integer',
        'warranty_period' => 'nullable|string',
        'stock_status' => 'required|string',
    ]);

    $data = $request->all();

    if ($request->hasFile('image')) {
        $image = $request->file('image');
        $filename = time().'_'.$image->getClientOriginalName();
        $image->move(public_path('products/images'), $filename);
        $data['image'] = 'products/images/'.$filename;
    }

    Products::create($data);

    return redirect()->back()->with('success', 'Thêm sản phẩm thành công!');
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
        // 1. Xác thực và ủy quyền (ví dụ sử dụng Gate)
        if (!Gate::allows('delete-product')) { // Hoặc một logic kiểm tra quyền khác
            abort(403, 'Bạn không có quyền xóa sản phẩm này.');
        }

        // 2. Tìm sản phẩm (kiểm tra sự tồn tại)
        $product = Products::find($id);

        if (!$product) {
            return redirect()->route('admin.products.index')->with('error', 'Không tìm thấy sản phẩm!');
        }

        // 3. Thực hiện xóa và xử lý lỗi
        try {
            $product->delete(); // Hoặc Product::destroy($id);
            return redirect()->route('admin.products.index')->with('success', 'Xóa sản phẩm thành công!');
        } catch (\Exception $e) {
            // Ghi log lỗi (khuyến nghị)
            Log::error('Lỗi xóa sản phẩm ID ' . $id . ': ' . $e->getMessage());
            return redirect()->route('admin.products.index')->with('error', 'Đã xảy ra lỗi khi xóa sản phẩm. Vui lòng thử lại sau.');
        }
    }
}
