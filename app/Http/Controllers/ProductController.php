<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Products;

class ProductController extends Controller
{
    public function product()
    {
        //$products = Products::inRandomOrder()->take(8)->get();
        $products = Products::inRandomOrder()->paginate(8);
        return view('pages.product', compact('products'));
    }
}
