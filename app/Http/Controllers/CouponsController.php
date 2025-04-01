<?php

namespace App\Http\Controllers;

use App\Models\Coupons;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;



class CouponsController extends Controller
{
    public function applyVoucher(Request $request)
    {
        $request->validate([
            'voucher_code' => 'required|string',
            'order_amount' => 'required|numeric|min:0',
        ]);

        $Coupons = Coupons::where('code', $request->voucher_code)->first();

        if (!$Coupons) {
            return response()->json(['error' => 'Mã voucher không hợp lệ.'], 404);
        }

        if (!$Coupons->isValid($request->order_amount, Auth::id())) {
            return response()->json(['error' => 'Voucher không thể được áp dụng.'], 400);
        }

        $discountAmount = $Coupons->apply($request->order_amount);

        return response()->json(['success' => 'Voucher đã được áp dụng.', 'discount' => $discountAmount, 'voucher_code' => $Coupons->code]);
    }

}
