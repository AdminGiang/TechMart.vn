<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;
use App\Models\CartItem;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Products;
use App\Models\Coupons;

class CheckoutController extends Controller
{
    /**
     * Hiển thị trang thanh toán
     */
    public function index()
    {
        // Lấy giỏ hàng của người dùng từ database
        $cartItems = CartItem::with('product')->where('user_id', Auth::id())->get();

        if ($cartItems->isEmpty()) {
            return redirect()->route('cart')->with('error', 'Giỏ hàng của bạn đang trống!');
        }

        // Tính tổng tiền hàng
        $totalPrice = $cartItems->sum(function ($item) {
            return $item->price * $item->quantity;
        });

        $shipping = 30000; // Phí vận chuyển cố định
        $discount = 0;     // Giá trị giảm giá ban đầu
        $total = $totalPrice + $shipping; // Tổng tiền ban đầu

        // Lấy thông tin người dùng
        $user = Auth::user();
        $nameParts = explode(' ', $user->name);
        $lastName = array_pop($nameParts);
        $firstName = implode(' ', $nameParts);

        // Chuyển đổi cartItems sang dạng cần thiết cho view
        $cart = $cartItems->map(function ($item) {
            return [
                'id' => $item->product_id,
                'name' => $item->product->name,
                'price' => $item->price,
                'quantity' => $item->quantity,
                'image' => $item->product->image,
            ];
        })->toArray();

        return view('pages.checkout', compact('cart', 'totalPrice', 'shipping', 'discount', 'total', 'user', 'firstName', 'lastName'));
    }

    /**
     * Xử lý đơn hàng sau khi thanh toán
     */
    public function process(Request $request)
    {
        try {
            Log::info('Bắt đầu xử lý đơn hàng');

            // Xác thực dữ liệu gửi từ form
            $request->validate([
                'payment_method' => 'required|string',
                'first_name' => 'required|string|max:255',
                'last_name' => 'required|string|max:255',
                'email' => 'required|email|max:255',
                'phone' => 'required|string|max:20',
                'address' => 'required|string|max:255',
                'city' => 'required|string|max:255',
                'voucher_code' => 'nullable|string',
            ]);

            // Lấy giỏ hàng từ database
            $cartItems = CartItem::with('product')->where('user_id', Auth::id())->get();

            if ($cartItems->isEmpty()) {
                Log::warning('Giỏ hàng trống');
                return redirect()->route('cart')->with('error', 'Giỏ hàng của bạn đang trống!');
            }

            // Bắt đầu transaction
            DB::beginTransaction();

            try {
                // Tính tổng tiền hàng
                $totalPrice = $cartItems->sum(function ($item) {
                    return $item->price * $item->quantity;
                });

                $shipping = 30000; // Phí vận chuyển cố định
                $discount = 0;     // Giá trị giảm giá ban đầu
                $total = $totalPrice + $shipping; // Tổng tiền ban đầu

                // Kiểm tra mã giảm giá nếu người dùng nhập
                if ($request->filled('voucher_code')) {
                    $voucherCode = $request->voucher_code;
                    $coupon = Coupons::where('code', $voucherCode)->where('is_active', true)->first();

                    if (!$coupon) {
                        DB::rollBack();
                        return back()->with('error', 'Mã giảm giá không tồn tại!');
                    }

                    if (!$coupon->isValid($totalPrice, Auth::id())) {
                        DB::rollBack();
                        return back()->with('error', 'Mã giảm giá không thể áp dụng!');
                    }

                    // Tính giá trị giảm giá và cập nhật tổng tiền
                    $discount = $coupon->apply($totalPrice);
                    $total = $totalPrice - $discount + $shipping;

                    Log::info('Áp dụng mã giảm giá: ' . $voucherCode . ', giảm giá: ' . $discount);
                }

                if ($request->filled('voucher_code')) {
                    $voucherCode = $request->voucher_code;
                    $coupon = Coupons::where('code', $voucherCode)->where('is_active', true)->first();

                    if (!$coupon) {
                        DB::rollBack();
                        return back()->with('error', 'Mã giảm giá không tồn tại!');
                    }

                    if (!$coupon->isValid($totalPrice, Auth::id())) {
                        DB::rollBack();
                        return back()->with('error', 'Mã giảm giá không thể áp dụng!');
                    }

                    // Tính giá trị giảm giá
                    $discount = $coupon->apply($totalPrice);
                    $total = $totalPrice - $discount + $shipping;

                    Log::info('Áp dụng mã giảm giá: ' . $voucherCode . ', giảm giá: ' . $discount);

                    // Ghi lại việc sử dụng mã giảm giá vào bảng user_coupons
                    DB::table('user_coupons')->insert([
                        'user_id' => Auth::id(),
                        'voucher_id' => $coupon->id,
                        'created_at' => now(),
                        'updated_at' => now(),
                    ]);
                }

                // Tạo đơn hàng
                $order = Order::create([
                    'user_id' => Auth::id(),
                    'total_price' => $total,
                    'status' => 'pending',
                    'payment_method' => $request->payment_method,
                    'shipping_address' => $request->address,
                    'shipping_city' => $request->city,
                    'notes' => $request->order_notes,
                ]);

                Log::info('Đã tạo đơn hàng với ID: ' . $order->id);

                // Thêm các sản phẩm vào đơn hàng
                foreach ($cartItems as $item) {
                    $product = $item->product;

                    // Kiểm tra số lượng tồn kho
                    if ($product->stock < $item->quantity) {
                        DB::rollBack();
                        return back()->with('error', 'Sản phẩm "' . $product->name . '" không đủ số lượng trong kho!');
                    }

                    // Thêm sản phẩm vào bảng OrderItem
                    OrderItem::create([
                        'order_id' => $order->id,
                        'product_id' => $product->id,
                        'quantity' => $item->quantity,
                        'price' => $item->price,
                    ]);

                    // Cập nhật kho
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

    public function applyCoupon(Request $request)
    {
        try {
            $request->validate([
                'voucher_code' => 'required|string',
                'total_price' => 'required|numeric|min:0',
            ]);

            $voucherCode = $request->input('voucher_code');
            $totalPrice = $request->input('total_price');

            $coupon = Coupons::where('code', $voucherCode)->where('is_active', true)->first();

            if (!$coupon) {
                return response()->json(['error' => 'Mã giảm giá không tồn tại.'], 404);
            }

            if (!$coupon->isValid($totalPrice, Auth::id())) {
                return response()->json(['error' => 'Mã giảm giá không thể áp dụng.'], 400);
            }

            $discount = $coupon->apply($totalPrice);

            return response()->json([
                'success' => true,
                'discount' => $discount,
                'voucher_code' => $coupon->code,
            ]);
        } catch (\Exception $e) {
            Log::error('Lỗi khi áp dụng mã giảm giá: ' . $e->getMessage());
            return response()->json(['error' => 'Đã xảy ra lỗi không mong muốn.'], 500);
        }
    }
    /**
     * Hiển thị trang thành công sau khi thanh toán
     */
    public function success()
    {
        Log::info('Hiển thị trang thành công');
        return view('pages.checkout-success');
    }
}
