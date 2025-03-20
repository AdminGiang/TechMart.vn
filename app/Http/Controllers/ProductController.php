<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Products;

class ProductController extends Controller
{
    public function home()
    {
        $products = Products::all(); // Lấy tất cả sản phẩm từ database
        return view('pages.home', compact('products'));
    }
}
