<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;


Route::get('/home', [HomeController::class, 'home'])->name('home'); 

Route::get('/contact', function () {
    return view('pages.contact');
})->name('contact');

Route::get('/blog', function () {
    return view('pages.blog');
})->name('blog');

Route::get('/', function () {
    return view('pages.login');
})->name('login');

Route::get('/register', function () {
    return view('pages.register');
})->name('register');

Route::get('/product', [ProductController::class, 'product'])->name('product'); 

Route::get('/section-products', [ProductController::class, 'getProducts'])->name('products.section');

Route::get('/products/filter', [ProductController::class, 'filter'])->name('products.filter');

Route::get('/about', function () {
    return view('pages.about');
})->name('about');

Route::get('/productdetail', function () {
    return view('pages.productdetail');
})->name('productdetail');
// cart
Route::get('/cart', function () {
    return view('pages.cart');
})->name('cart');

Route::get('/checkout', function () {
    return view('pages.checkout');
})->name('checkout');

Route::get('/services', function () {
    return view('pages.services');
})->name('services');
