<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\Products;

class ProductDetailController extends Controller
{
    public function addToCart(Request $request)
    {
        // Lấy giỏ hàng từ session
        $cart = Session::get('cart', []);

        // Lấy thông tin sản phẩm từ database
        $productId = $request->input('id');
        $product = Products::findOrFail($productId);

        // Kiểm tra nếu sản phẩm đã tồn tại trong giỏ hàng
        if (isset($cart[$productId])) {
            $cart[$productId]['quantity']++;
        } else {
            $cart[$productId] = [
                'name' => $product->name,
                'price' => $product->price,
                'image' => $product->image,
                'quantity' => 1,
            ];
        }

        // Lưu giỏ hàng vào session
        Session::put('cart', $cart);

        return response()->json([
            'message' => 'Sản phẩm đã được thêm vào giỏ hàng!',
            'cart_count' => count($cart),
        ]);
    }
}