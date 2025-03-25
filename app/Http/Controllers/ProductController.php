<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Products;
use App\Models\Review;

class ProductController extends Controller
{
    public function product()
    {
        //$products = Products::inRandomOrder()->take(8)->get();
        $products = Products::inRandomOrder()->paginate(6);
        return view('pages.product', compact('products'));
    }

    public function show($id) {
        $product = Products::with(['details', 'brand'])->findOrFail($id);
        $relatedProducts = Products::where('category_id', $product->category_id)
            ->where('id', '!=', $id)
            ->inRandomOrder()
            ->take(3)
            ->get();
        
        // Lấy tổng số đánh giá
        $totalReviews = Review::where('product_id', $id)->count();
        
        // Lấy đánh giá của sản phẩm với phân trang
        $reviews = Review::with('user')
            ->where('product_id', $id)
            ->orderBy('created_at', 'desc')
            ->paginate(4);
        
        // Tính điểm đánh giá trung bình từ tất cả đánh giá
        $averageRating = Review::where('product_id', $id)->avg('rating') ?? 0;
        
        return view('pages.productdetail', compact('product', 'relatedProducts', 'reviews', 'averageRating', 'totalReviews'));
    }
    

    public function filter(Request $request)
    {
        $query = Products::query();

        // Lọc theo danh mục
        if ($request->has('category')) {
            $query->whereIn('Category', $request->category);
        }

        // Lọc theo hãng
        if ($request->has('brand')) {
            $query->whereIn('Brand', $request->brand);
        }

        // Lọc theo khoảng giá
        if ($request->has('price_range')) {
            list($min, $max) = explode('-', $request->price_range);
            $query->whereBetween('Price', [$min, $max]);
        }
        //hiển thị 6 sản phẩm trên mỗi trang khi lọc
        $products = $query->paginate(6);        
        return view('pages.Product', compact('products'));
    }

        // Search sản phẩm
       // Hiển thị trang danh sách sản phẩm
       public function search(Request $request)
       {
           $query = Products::query();
       
           if ($request->has('search')) {
               $query->where('name', 'like', '%' . $request->search . '%');
           }
       
           $products = $query->paginate(6); // Phân trang
       
           return view('pages.Product', compact('products'));
       }


}
