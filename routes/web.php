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

<<<<<<< HEAD
Route::get('/product', [ProductController::class, 'product'])->name('product');  // Trang sản phẩm
Route::get('/section-products', [ProductController::class, 'getProducts'])->name('products.section'); // Lấy sản phẩm theo danh mục
Route::get('/products/filter', [ProductController::class, 'filter'])->name('products.filter'); // Lọc sản phẩm
//Route::get('/products/search', [ProductController::class, 'search'])->name('products.search'); // Route xử lý AJAX search sản phẩm
=======
Route::get('/product', [ProductController::class, 'product'])->name('product');
>>>>>>> 18d20e0d4032a5771f05d93bb0bb65c9b49d2816


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

Route::get('/error', function () { // Trang lỗi
    return view('pages.error');
})->name('error');

Route::get('/profile', function () {
    if (!Auth::check()) {
        return redirect()->route('login'); // Chưa đăng nhập -> Chuyển hướng đến trang đăng nhập
    }
    return view('pages.profile', [
        'user' => Auth::user(), // Thông tin user
        'created_at' => Auth::user()->created_at->format('d/m/Y') // Định dạng ngày
        ]); 
})->name('profile')->middleware('auth'); // Trang cá nhân

Route::get('/register', [RegisterController::class, 'showRegisterForm'])->name('register'); // Trang đăng ký
Route::post('/register', [RegisterController::class, 'register']); // Xử lý đăng ký

Route::get('/', [LoginController::class, 'showloginForm'])->name('login');
Route::post('/', [LoginController::class, 'login']); // Xử lý đăng nhập

Route::post('/logout', [LogoutController::class, 'logout'])->name('logout');

<<<<<<< HEAD
 // Tìm kiếm sản phẩm

=======
Route::prefix('admin')->group(function () {
    // Route::get('/', [AdminController::class, 'home'])->name('admin');
    Route::get('/admin', [AdminController::class, 'home'])->name('admin');
});
>>>>>>> 18d20e0d4032a5771f05d93bb0bb65c9b49d2816
