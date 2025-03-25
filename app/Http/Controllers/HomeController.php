<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Products;
use App\Models\Brand;

class HomeController extends Controller
{
    public function home()
    {
        $products = Products::inRandomOrder()->take(3)->get();
        $brands = Brand::where('status', 1)
        ->orderBy('id', 'asc') // Sắp xếp theo ID tăng dần
        ->take(3) // Giới hạn 3 thương hiệu đầu tiên
        ->get();
    // return view('pages.home', compact('brands')); // Lấy 3 sản phẩm bất kỳ từ database // Lấy tất cả sản phẩm từ database
        return view('pages.home', compact('products','brands'));
    }
//     public function brands()
// {
    // $brands = Brand::where('status', 1)
    // ->orderBy('id', 'asc') // Sắp xếp theo ID tăng dần
    // ->take(3) // Giới hạn 3 thương hiệu đầu tiên
    // ->get();
    // return view('pages.home', compact('brands'));
// }
}
