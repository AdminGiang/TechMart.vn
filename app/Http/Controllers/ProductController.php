<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $query = Product::query();

        // Lọc theo danh mục
        if ($request->has('category') && is_array($request->category)) {
            $query->whereIn('CategoryId', $request->category);
        }

        // Lọc theo khoảng giá
        if ($request->filled('price_from')) {
            $query->where('Price', '>=', $request->price_from);
        }
        if ($request->filled('price_to')) {
            $query->where('Price', '<=', $request->price_to);
        }

        // Lọc theo thương hiệu (dựa vào tag)
        if ($request->has('brand') && is_array($request->brand)) {
            $query->where(function ($q) use ($request) {
                foreach ($request->brand as $brand) {
                    $q->orWhere('Tag', 'like', '%' . $brand . '%');
                }
            });
        }

        // Chỉ hiển thị sản phẩm đã được xuất bản
        $query->where('IsPublish', true);

        // Sắp xếp sản phẩm
        if ($request->filled('sort')) {
            switch ($request->sort) {
                case 'price_asc':
                    $query->orderBy('Price', 'asc');
                    break;
                case 'price_desc':
                    $query->orderBy('Price', 'desc');
                    break;
                case 'newest':
                    $query->orderBy('created_at', 'desc');
                    break;
                default:
                    $query->orderBy('Id', 'desc');
                    break;
            }
        } else {
            $query->orderBy('Id', 'desc');
        }

        $products = $query->paginate(6);

        return view('pages.shop', compact('products'));
    }
} 