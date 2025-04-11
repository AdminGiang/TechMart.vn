<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::with('user')->orderBy('created_at', 'desc')->get();
        return view('admin.pages.Order.index', compact('orders'));
    }

    public function show($id)
    {
        $order = Order::with(['user', 'orderitems.product'])->findOrFail($id);
        return view('admin.pages.Order.show', compact('order'));
    }

    public function destroy(string $id)
    {
        $order = Order::find($id);
       if(!$order) {
            return redirect()->route('admin.orders.index')->with('error', 'Đơn hàng không tồn tại!');
        }
        $order->delete();
        return redirect()->route('admin.orders.index')->with('success', 'Xóa đơn hàng thành công!');
    }
}
