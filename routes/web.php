<?php

use App\Http\Controllers\admin\AdminController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Auth;

Route::get('/home', [HomeController::class, 'home'])->name('home')->middleware('auth'); // Trang chủ

Route::get('/contact', function () { // Trang liên hệ
    return view('pages.contact');
})->name('contact');

Route::get('/blog', function () { // Trang blog
    return view('pages.blog');
})->name('blog');

Route::get('/product', [ProductController::class, 'product'])->name('product'); // Trang sản phẩm

Route::get('/register', function () {
    return view('pages.register');
})->name('register');

Route::get('/product', [ProductController::class, 'product'])->name('product');

Route::get('/section-products', [ProductController::class, 'getProducts'])->name('products.section');

Route::get('/products/filter', [ProductController::class, 'filter'])->name('products.filter');

Route::get('/about', function () {
    return view('pages.about');
})->name('about');

Route::get('/productdetail', function () { // Trang chi tiết sản phẩm
    return view('pages.productdetail');
})->name('productdetail');
// cart
Route::get('/cart', function () { // Trang giỏ hàng
    return view('pages.cart');
})->name('cart');

Route::get('/checkout', function () { // Trang thanh toán
    return view('pages.checkout');
})->name('checkout');

Route::get('/services', function () { // Trang dịch vụ
    return view('pages.services');
})->name('services');

Route::get('/profile', function () {
    return view('pages.profile', [
        'user' => Auth::user(),
        'created_at' => Auth::user()->created_at->format('d/m/Y') // Định dạng ngày
    ]);
})->name('profile')->middleware('auth');

Route::get('/', [RegisterController::class, 'showRegisterForm'])->name('register'); // Trang đăng ký
Route::post('/', [RegisterController::class, 'register']); // Xử lý đăng ký

Route::get('/login', [LoginController::class, 'showloginForm'])->name('login'); // Trang đăng nhập
Route::post('/login', [LoginController::class, 'login']); // Xử lý đăng nhập

Route::post('/logout', [LogoutController::class, 'logout'])->name('logout');

Route::prefix('admin')->group(function () {
    // Route::get('/', [AdminController::class, 'home'])->name('admin');
    Route::get('/admin', [AdminController::class, 'home'])->name('admin');
});
