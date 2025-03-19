<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CartController;

Route::get('/', function () {
    return view('pages.home');
})->name('home');

// Shop route using ProductController
Route::get('/shop', [ProductController::class, 'index'])->name('shop');
Route::get('/product/{id}', [ProductController::class, 'show'])->name('product.detail');

Route::get('/login', function () {
    return view('pages.login');
});

Route::get('/contact', function () {
    return view('pages.contact');
})->name('contact');

// Cart routes
Route::get('/cart', [CartController::class, 'index'])->name('cart');
Route::post('/cart/add', [CartController::class, 'add'])->name('cart.add');
Route::delete('/cart/{id}', [CartController::class, 'remove'])->name('cart.remove');
Route::put('/cart/{id}', [CartController::class, 'update'])->name('cart.update');
Route::delete('/cart', [CartController::class, 'clear'])->name('cart.clear');