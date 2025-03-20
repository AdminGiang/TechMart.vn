<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;

// Route::get('/', function () {
//     return view('pages.home');
// })->name('home');

Route::get('/', [ProductController::class, 'home'])->name('home'); 

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




