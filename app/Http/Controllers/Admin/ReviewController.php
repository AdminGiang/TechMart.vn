<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Review;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    public function index()
    {
        $reviews = Review::with(['user', 'product'])
            ->orderBy('created_at', 'desc')
            ->get();
            
        return view('admin.pages.Review.Review', compact('reviews'));
    }

    public function approve(Review $review)
    {
        try {
            $review->update(['status' => 'approved']);
            return redirect()->back()->with('success', 'Đã duyệt đánh giá thành công');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Có lỗi xảy ra khi duyệt đánh giá');
        }
    }

    public function reject(Review $review)
    {
        try {
            $review->update(['status' => 'rejected']);
            return redirect()->back()->with('success', 'Đã từ chối đánh giá thành công');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Có lỗi xảy ra khi từ chối đánh giá');
        }
    }
} 