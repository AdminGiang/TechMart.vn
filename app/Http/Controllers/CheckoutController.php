<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Products;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;
use App\Models\CartItem;

class CheckoutController extends Controller
{
    public function index()
    {
        // Lấy giỏ hàng từ database
        $cartItems = CartItem::with('product')
            ->where('user_id', Auth::id())
            ->get();

        if ($cartItems->isEmpty()) {
            return redirect()->route('cart')->with('error', 'Giỏ hàng của bạn đang trống!');
        }

        // Tính tổng tiền
        $totalPrice = $cartItems->sum(function($item) {
            return $item->price * $item->quantity;
        });

        $shipping = 30000;
        $total = $totalPrice + $shipping;

        // Lấy thông tin user
        $user = Auth::user();

        // Xử lý tên người dùng
        $nameParts = explode(' ', $user->name);
        $lastName = array_pop($nameParts);
        $firstName = implode(' ', $nameParts);

        // Chuyển đổi cartItems thành định dạng cần thiết cho view
        $cart = $cartItems->map(function($item) {
            return [
                'id' => $item->product_id,
                'name' => $item->product->name,
                'price' => $item->price,
                'quantity' => $item->quantity,
                'image' => $item->product->image
            ];
        })->toArray();

        return view('pages.checkout', compact('cart', 'totalPrice', 'shipping', 'total', 'user', 'firstName', 'lastName'));
    }

    public function process(Request $request)
    {
        try {
            Log::info('Bắt đầu xử lý đơn hàng');

            $request->validate([
                'payment_method' => 'required', // Trường payment_method là bắt buộc
                'first_name' => 'required|string|max:255',
                'last_name' => 'required|string|max:255',
                'email' => 'required|email|max:255',
                'phone' => 'required|string|max:20',
                'address' => 'required|string|max:255',
                'city' => 'required|string|max:255',
                // 'payment_method' => 'required|in:momo,paypal',
            ]);

            Log::info('Validation thành công');

            // Lấy giỏ hàng từ database
            $cartItems = CartItem::with('product')
                ->where('user_id', Auth::id())
                ->get();

            if ($cartItems->isEmpty()) {
                Log::warning('Giỏ hàng trống');
                return redirect()->route('cart')->with('error', 'Giỏ hàng của bạn đang trống!');
            }

            // Bắt đầu transaction
            DB::beginTransaction();

            try {
                // Tính tổng tiền
                $totalPrice = $cartItems->sum(function($item) {
                    return $item->price * $item->quantity;
                });

                $shipping = 30000;
                $total = $totalPrice + $shipping;

                Log::info('Tổng tiền: ' . $total);

                // Tạo đơn hàng mới
                $order = Order::create([
                    'user_id' => Auth::id(),
                    'total_price' => $total,
                    'status' => 'pending',
                    'payment_method' => $request->payment_method,
                    'shipping_address' => $request->address,
                    'shipping_city' => $request->city,
                    'notes' => $request->order_notes
                ]);

                Log::info('Đã tạo đơn hàng với ID: ' . $order->id);

                // Thêm các sản phẩm vào đơn hàng
                foreach ($cartItems as $item) {
                    // Kiểm tra số lượng sản phẩm trong kho
                    $product = $item->product;
                    if ($product->stock < $item->quantity) {
                        throw new \Exception('Sản phẩm ' . $product->name . ' không đủ số lượng trong kho');
                    }

                    OrderItem::create([
                        'order_id' => $order->id,
                        'product_id' => $product->id,
                        'quantity' => $item->quantity,
                        'price' => $item->price
                    ]);

                    // Cập nhật số lượng sản phẩm trong kho
                    $product->stock -= $item->quantity;
                    $product->save();
                }

                Log::info('Đã thêm sản phẩm vào đơn hàng');

                // Xóa giỏ hàng sau khi đặt hàng thành công
                CartItem::where('user_id', Auth::id())->delete();

                // Commit transaction
                DB::commit();

                Log::info('Chuyển hướng đến trang thành công');
                return redirect()->route('checkout.success')->with('success', 'Đặt hàng thành công!');
            } catch (\Exception $e) {
                // Rollback transaction nếu có lỗi
                DB::rollBack();
                throw $e;
            }
        } catch (\Exception $e) {
            Log::error('Lỗi khi xử lý đơn hàng: ' . $e->getMessage());
            return back()->with('error', 'Có lỗi xảy ra khi đặt hàng: ' . $e->getMessage());
        }
    }

    public function success()
    {
        Log::info('Hiển thị trang thành công');
        return view('pages.checkout-success');
    }



}
