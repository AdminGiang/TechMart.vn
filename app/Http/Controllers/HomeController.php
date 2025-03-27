<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Products;
use App\Models\Brand;
use App\Models\Review;

class HomeController extends Controller
{
    public function home(Request $request)
    {
        $products = Products::inRandomOrder()->take(3)->get(); //

        $brands = Brand::where('status', 1)
        ->orderBy('id', 'asc') // Sắp xếp theo ID tăng dần
        ->take(3) // Giới hạn 3 thương hiệu đầu tiên
        ->get();

        $randomReviews = Review::with('user:id,name')
        ->inRandomOrder()
        ->paginate(1); 
        // phân trang load lại mỗi cmt 
        if ($request->ajax()) {
            return view('pages.partials.reviews', compact('randomReviews'))->render();
        }
    
        return view('pages.home', compact('products', 'brands', 'randomReviews'));
    }
}
