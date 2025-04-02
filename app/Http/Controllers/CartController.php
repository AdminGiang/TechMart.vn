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
        if (!Auth::check()) {
            return response()->json([
                'success' => false,
                'message' => 'Vui lòng đăng nhập để thêm sản phẩm vào giỏ hàng'
            ]);
        }

        try {
            $productId = $request->input('id');
            $product = Products::findOrFail($productId);

            // Kiểm tra xem sản phẩm đã tồn tại trong giỏ hàng chưa
            $cartItem = CartItem::where('user_id', Auth::id())
                ->where('product_id', $productId)
                ->first();

            if ($cartItem) {
                // Nếu đã tồn tại thì tăng số lượng
                $cartItem->quantity += 1;
                $cartItem->save();
            } else {
                // Nếu chưa tồn tại thì tạo mới
                CartItem::create([
                    'user_id' => Auth::id(),
                    'product_id' => $productId,
                    'quantity' => 1,
                    'price' => $product->price
                ]);
            }

            // Lấy số lượng sản phẩm trong giỏ hàng
            $cartCount = CartItem::where('user_id', Auth::id())->sum('quantity');

            return response()->json([
                'success' => true,
                'message' => 'Sản phẩm đã được thêm vào giỏ hàng',
                'cart_count' => $cartCount
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Có lỗi xảy ra khi thêm sản phẩm vào giỏ hàng: ' . $e->getMessage()
            ]);
        }
    }

    public function showCart()
    {
        if (!Auth::check()) {
            return redirect()->route('login');
        }

        // Lấy giỏ hàng từ database
        $cartItems = CartItem::with('product')
            ->where('user_id', Auth::id())
            ->get();

        // Tính tổng tiền
        $totalPrice = $cartItems->sum(function($item) {
            return $item->price * $item->quantity;
        });

        // Đặt phí vận chuyển (ví dụ: 30,000 VND)
        $shipping = 30000;

        // Tính tổng cộng (tạm tính + phí vận chuyển)
        $total = $totalPrice + $shipping;

        // Trả về view với dữ liệu giỏ hàng
        return view('pages.cart', compact('cartItems', 'totalPrice', 'shipping', 'total'));
    }

    public function updateCart(Request $request)
    {
        if (!Auth::check()) {
            return response()->json([
                'success' => false,
                'message' => 'Vui lòng đăng nhập để cập nhật giỏ hàng'
            ]);
        }

        $productId = $request->input('product_id');
        $quantity = $request->input('quantity');

        $cartItem = CartItem::where('user_id', Auth::id())
            ->where('product_id', $productId)
            ->first();

        if ($cartItem) {
            $cartItem->quantity = $quantity;
            $cartItem->save();

            return response()->json([
                'success' => true,
                'message' => 'Cập nhật số lượng thành công'
            ]);
        }

        return response()->json([
            'success' => false,
            'message' => 'Không tìm thấy sản phẩm trong giỏ hàng'
        ]);
    }

    public function removeFromCart(Request $request)
    {
        if (!Auth::check()) {
            return response()->json([
                'success' => false,
                'message' => 'Vui lòng đăng nhập để xóa sản phẩm khỏi giỏ hàng'
            ]);
        }

        $productId = $request->input('product_id');

        $cartItem = CartItem::where('user_id', Auth::id())
            ->where('product_id', $productId)
            ->first();

        if ($cartItem) {
            $cartItem->delete();

            return response()->json([
                'success' => true,
                'message' => 'Xóa sản phẩm khỏi giỏ hàng thành công'
            ]);
        }

        return response()->json([
            'success' => false,
            'message' => 'Không tìm thấy sản phẩm trong giỏ hàng'
        ]);
    }
}
