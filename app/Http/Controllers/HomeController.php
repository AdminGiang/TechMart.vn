<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Products;

class HomeController extends Controller
{
    public function home()
    {
        $products = Products::inRandomOrder()->take(3)->get(); // Lấy 3 sản phẩm bất kỳ từ database // Lấy tất cả sản phẩm từ database
        return view('pages.home', compact('products'));
    }
}
