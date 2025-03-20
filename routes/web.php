<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;

Route::get('/', function () {
    return view('pages.home');
})->name('home');

Route::get('/contact', function () {
    return view('pages.contact');
})->name('contact');

Route::get('/blog', function () {
    return view('pages.blog');
})->name('blog');

Route::get('/product', function () {
    return view('pages.product');
})->name('product');

Route::get('/productdetail', function () {
    return view('pages.productdetail');
})->name('productdetail');



// Route::get('/shop', [ProductController::class, 'index'])->name('shop');

// Route::get('/Home', function () {
//     return view('pages.index');
// });

// Route::get('/', function () {
//     return view('home');
// });

// Route::get('/', function () {
//     return view('index');
// });

// Route::get('/shop', [ProductController::class, 'index'])->name('shop');

// Route::get('/Home', function () {
//     return view('pages.index');
// });

// Route::get('/login', function () {
//     return view('pages.login');
// });

Route::get('/checkout', function () {
    return view('pages.checkout');
})->name('checkout');

