<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Coupons;
use Illuminate\Http\Request;

class CouponController extends Controller
{
    public function index()
    {
        $coupons = Coupons::all();
        return view('admin.pages.Coupon.index', compact('coupons'));
    }


    public function create()
    {
        return view('admin.pages.Coupon.add');
    }


    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'code' => 'required|string|unique:coupons',
            'name' => 'required|string',
            'description' => 'nullable|string',
            'type' => 'required|string|in:fixed,percentage',
            'value' => 'required|numeric',
            'min_order_amount' => 'nullable|numeric',
            'quantity' => 'nullable|integer',
            'usage_limit_per_user' => 'nullable|integer',
            'start_date' => 'nullable|date',
            'end_date' => 'nullable|date|after_or_equal:start_date',
            'is_active' => 'required|boolean',
        ]);

        Coupons::create($validatedData); // Lưu vào database
        return redirect()->route('admin.pages.Coupon.index')->with('success', 'Mã giảm giá đã được tạo thành công!');

    }


    public function show(string $id)
    {
        //
    }


    public function edit(Coupons $coupon)
    {
        return view('admin.pages.Coupon.Edit',compact('coupon'));
    }


    public function update(Request $request, Coupons $coupon)
    {
        $validatedData = $request->validate([
            'code' => 'required|unique:coupons,name,' . $coupon->id . '|max:255',
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'type' => 'required|string|in:fixed,percentage',
            'value' => 'required|numeric|min:0',
            'min_order_amount' => 'nullable|numeric|min:0',
            'quantity' => 'nullable|integer|min:0',
            'usage_limit_per_user' => 'nullable|integer|min:0',
            'start_date' => 'nullable|date',
            'end_date' => 'nullable|date|after_or_equal:start_date',
            'is_active' => 'required|boolean',
        ]);

        // Cập nhật mã giảm giá
        $coupon->update($validatedData);

        return redirect()->route('admin.pages.Coupon.index')->with('success', 'Cập nhật mã giảm giá thành công!');

    }


    public function destroy(Coupons $coupon)
    {
        $coupon->delete();

        return redirect()->route('admin.pages.Coupon.index')->with('success', 'Xóa mã thành công!');
    }
}
