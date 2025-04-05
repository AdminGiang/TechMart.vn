<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\VnPay_paymentController;
use App\Http\Controllers\CouponsController;

require __DIR__.'/admin.php';

Route::get('/home', [HomeController::class, 'home'])->name('home')->middleware('auth'); // Trang chủ

Route::get('/contact', function () { // Trang liên hệ
    return view('pages.contact');
})->name('contact');
Route::middleware(['auth'])->group(function () {
    Route::get('/contact/form', [ContactController::class, 'AutoFill'])->name('contact.form');
    Route::post('/contact/submit', [ContactController::class, 'sentContact'])->name('contact.submit');
});
Route::get('/contact', function () {
    if (Auth::check()) {
        $user = Auth::user();

        return view('pages.contact', [
            'username' => $user->username,
            'email' => $user->email,
            'phone' => $user->phone,
        ]);
    }

    return redirect()->route('login')->with('error', 'Vui lòng đăng nhập để liên hệ!');
})->name('contact');



Route::get('/blog', function () { // Trang blog
    return view('pages.blog');
})->name('blog');

Route::get('/product', [ProductController::class, 'product'])->name('product');
  // Trang sản phẩm
Route::get('/section-products', [ProductController::class, 'getProducts'])->name('products.section');
 // Lấy sản phẩm theo danh mục
Route::get('/products/filter', [ProductController::class, 'filter'])->name('products.filter');
// Lọc sản phẩm
Route::get('/product/{id}', [ProductController::class, 'show'])->name('product.show');

Route::post('/review/store', [ReviewController::class, 'store'])->name('review.store')->middleware('auth');

Route::get('/about', function () {
    return view('pages.about');
})->name('about');

Route::post('/cart/add', [CartController::class, 'addToCart'])->name('cart.add'); // Thêm sản phẩm vào giỏ hàng

Route::get('/cart', [CartController::class, 'showCart'])->name('cart'); // Xem giỏ hàng

Route::post('/cart/update', [CartController::class, 'updateCart'])->name('cart.update');

Route::post('/cart/remove', [CartController::class, 'removeFromCart'])->name('cart.remove'); // Xóa sản phẩm khỏi giỏ hàng

Route::get('/cart/mini', [CartController::class, 'getMiniCart'])->name('cart.mini');

Route::get('/checkout', [CheckoutController::class, 'index'])->name('checkout')->middleware('auth');

Route::post('/checkout', [CheckoutController::class, 'process'])->name('checkout.process')->middleware('auth');

Route::get('/checkout/success', [CheckoutController::class, 'success'])->name('checkout.success')->middleware('auth');

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


// Route::middleware(['auth'])->group(function () {
//     Route::get('/admin/dashboard', [DashboardController::class, 'home'])->name('admin.dashboard')->middleware('admin');
// });


Route::post('/', [LoginController::class, 'login']); // Xử lý đăng nhập

Route::post('/logout', [LogoutController::class, 'logout'])->name('logout');

Route::get('/search-suggestions', [ProductController::class, 'searchSuggestions'])->name('search.suggestions');
Route::get('/product/search', [ProductController::class, 'search'])->name('product.search');


