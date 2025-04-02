<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Products;
use App\Models\Brand;
use App\Models\Banner;
use App\Models\Category;
use App\Models\Review;

class HomeController extends Controller
{
    public function home(Request $request)
    {
        // Tối ưu truy vấn banners với eager loading
        $banners = Banner::orderBy('created_at', 'desc')->get();

        // Tối ưu truy vấn sản phẩm mới với eager loading và random
        $products = Products::with(['brand', 'category'])
            ->inRandomOrder()
            ->take(3)
            ->get();

        // Tối ưu truy vấn thương hiệu - chỉ lấy các cột tồn tại
        $brands = Brand::select('id', 'name')
            ->orderBy('name')
            ->get();

        // Tối ưu truy vấn sản phẩm tất cả với eager loading và phân trang
        $productsall = Products::with(['brand', 'category'])
            ->orderBy('created_at', 'desc')
            ->paginate(6);

        // Tối ưu truy vấn đánh giá
        $reviews = Review::with(['user', 'product'])
            ->orderBy('created_at', 'desc')
            ->take(5)
            ->get();

        $categories = Category::with('products')->get();

        // Lấy đánh giá ngẫu nhiên
        $randomReviews = Review::with('user:id,name')
            ->inRandomOrder()
            ->paginate(1); 

        // Nếu là request AJAX, trả về partial view
        if ($request->ajax()) {
            return view('pages.partials.reviews', compact('randomReviews'))->render();
        }
    
        // Trả về view chính với tất cả dữ liệu
        return view('pages.home', compact(
            'banners', 
            'products', 
            'brands', 
            'productsall', 
            'reviews', 
            'categories',
            'randomReviews'
        ));
    }
}
