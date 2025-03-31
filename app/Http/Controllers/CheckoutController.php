<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class CheckoutController extends Controller
{
    public function index()
    {
        $cart = Session::get('cart', []);
        
        if (empty($cart)) {
            return redirect()->route('cart')->with('error', 'Giỏ hàng của bạn đang trống!');
        }

        $totalPrice = array_reduce($cart, function ($sum, $item) {
            return $sum + ($item['price'] * $item['quantity']);
        }, 0);

        $shipping = 30000;
        $total = $totalPrice + $shipping;

        return view('pages.checkout', compact('cart', 'totalPrice', 'shipping', 'total'));
    }

    public function process(Request $request)
    {
        $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:20',
            'address' => 'required|string|max:255',
            'city' => 'required|string|max:255',
            'payment_method' => 'required|in:vnpay,momo,paypal',
        ]);

        $cart = Session::get('cart', []);
        
        if (empty($cart)) {
            return redirect()->route('cart')->with('error', 'Giỏ hàng của bạn đang trống!');
        }

        // Xử lý thanh toán ở đây
        // TODO: Implement payment processing logic

        // Sau khi thanh toán thành công
        Session::forget('cart');
        
        return redirect()->route('checkout.success')->with('success', 'Đặt hàng thành công!');
    }

    public function success()
    {
        return view('pages.checkout-success');
    }
} 