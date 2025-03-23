<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Products;

class ProductController extends Controller
{
    public function product()
    {
<<<<<<< HEAD
        //$products = Products::inRandomOrder()->take(8)->get();
        $products = Products::inRandomOrder()->paginate(8);
=======
        // $products = Products::inRandomOrder()->take(8)->get();
        $products = Products::paginate(4);
         // Lấy 6 sản phẩm bất kỳ từ database // Lấy tất cả sản phẩm từ database
        // $products = Products::orderByRaw('RAND()')->paginate(4);
>>>>>>> 13307ea57f60cd5f09b74a8a00880031b0b795ee
        return view('pages.product', compact('products'));
    }
}
