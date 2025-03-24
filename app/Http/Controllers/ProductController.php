<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Products;


class ProductController extends Controller
{
    public function product()
    {
        //$products = Products::inRandomOrder()->take(8)->get();
        $products = Products::inRandomOrder()->paginate(6);
        return view('pages.product', compact('products'));
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

        $products = $query->paginate(6); 
        
        return view('pages.Product', compact('products'));
    }
}
