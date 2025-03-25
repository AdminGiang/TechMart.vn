<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Products;
use App\Models\CartItem;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    // Thêm sản phẩm vào giỏ hàng
   // public function addToCart(Request $request)
    //{
    //     // Kiểm tra dữ liệu đầu vào
    //     $request->validate([
    //         'product_id' => 'required|integer',
    //         'quantity' => 'required|integer|min:1'
    //     ]);

    //     // Tạo bản ghi trong bảng cart_items
    //     $cartItem = CartItem::create([
    //         'product_id' => $request->product_id,
    //         'quantity' => $request->quantity
    //     ]);

    //     // Trả về phản hồi JSON
    //     return response()->json([
    //         'message' => 'Thêm vào giỏ hàng thành công!',
    //         'data' => $cartItem
    //     ], 201);
    // }

    // // Hiển thị giỏ hàng
    // public function viewCart()
    // {
    //     $cartItems = CartItem::where('user_id', Auth::id())->get();
    //     return view('pages.cart', compact('cartItems'));
    // }
    // // Xóa sản phẩm khỏi giỏ hàng
    // public function removeFromCart(Request $request)
    // {
    //     CartItem::where('user_id', Auth::id())
    //         ->where('product_id', $request->product_id)
    //         ->delete();

    //     return response()->json(['status' => 'success', 'message' => 'Sản phẩm đã được xóa khỏi giỏ hàng']);
    // }
}
