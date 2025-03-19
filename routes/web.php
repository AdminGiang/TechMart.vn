<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;

// Route::get('/', function () {
//     return view('home');
// });

Route::get('/', function () {
    return view('pages.index');
});

Route::get('/shop', [ProductController::class, 'index'])->name('shop');

Route::get('/Home', function () {
    return view('pages.index');
});

Route::get('/login', function () {
    return view('pages.login');
});