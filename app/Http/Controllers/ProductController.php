<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Products;

class ProductController extends Controller
{
    public function product()
    {
        $products = Products::inRandomOrder()->take(8)->get(); // Lấy 6 sản phẩm bất kỳ từ database // Lấy tất cả sản phẩm từ database
        return view('pages.product', compact('products'));
    }
}
