<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Products;
use App\Models\CartItem;
use App\Models\Coupons;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;


class CartController extends Controller
{
    public function addToCart(Request $request)
    {
        $cart = Session::get('cart', []);

        $productId = $request->input('id');
        $productName = $request->input('name');
        $productPrice = $request->input('price');
        $productImage = $request->input('image'); // Lấy hình ảnh từ request


        // Kiểm tra nếu sản phẩm đã tồn tại trong giỏ hàng
        if (isset($cart[$productId])) {
            $cart[$productId]['quantity']++;
        } else {
            $cart[$productId] = [
                'name' => $productName,
                'price' => $productPrice,
                'image' => $productImage, // Lưu hình ảnh vào session
                'quantity' => 1,
            ];
        }

        session()->put('cart', $cart);

        return response()->json([
            'success' => true,
            'cart_count' => count($cart)
        ]);
    }

    public function showCart()
    {
        // Lấy giỏ hàng từ session
        $cart = Session::get('cart', []);

        // Tính tổng tiền
        $totalPrice = array_reduce($cart, function ($sum, $item) {
            return $sum + ($item['price'] * $item['quantity']);
        }, 0);
        // Đặt phí vận chuyển (ví dụ: 30,000 VND)
         $shipping = 30000;

         // Tính tổng cộng (tạm tính + phí vận chuyển)
        $total = $totalPrice + $shipping;

        // Trả về view với dữ liệu giỏ hàng
        return view('pages.cart', compact('cart', 'totalPrice', 'shipping', 'total'));
    }

    public function updateCart(Request $request)
    {
        $cart = Session::get('cart', []);

        $productId = $request->input('id');
        $quantity = $request->input('quantity');

        if (isset($cart[$productId]) && $quantity > 0) {
            $cart[$productId]['quantity'] = $quantity;
            Session::put('cart', $cart);

            // Tính lại tổng tiền cho sản phẩm
            $itemTotal = $cart[$productId]['price'] * $cart[$productId]['quantity'];

            // Tính tổng tiền giỏ hàng
            $totalPrice = array_reduce($cart, function ($sum, $item) {
                return $sum + ($item['price'] * $item['quantity']);
            }, 0);

            // Phí vận chuyển
            $shipping = 30000;

            // Tổng cộng
            $total = $totalPrice + $shipping;

            return response()->json([
                // 'message' => 'Số lượng sản phẩm đã được cập nhật!',
                'itemTotal' => $itemTotal,
                'totalPrice' => $totalPrice,
                'shipping' => $shipping,
                'total' => $total,
            ]);
        }
    }        

    public function removeFromCart(Request $request)
    {
        $cart = Session::get('cart', []);

        $productId = $request->input('id');

        if (isset($cart[$productId])) {
            unset($cart[$productId]);
            Session::put('cart', $cart);

            // Tính lại tổng tiền giỏ hàng
            $totalPrice = array_reduce($cart, function ($sum, $item) {
                return $sum + ($item['price'] * $item['quantity']);
            }, 0);

           // Phí vận chuyển
            $shipping = count($cart) > 0 ? 30000 : 0; // Chỉ tính phí vận chuyển nếu có sản phẩm

            // Tổng cộng
            $total = $totalPrice + $shipping;

            return response()->json([
                'totalPrice' => $totalPrice,
                'shipping' => $shipping,
                'total' => $total,
            ]);
        }
    }

    
}
