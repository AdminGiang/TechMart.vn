<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;

Route::get('/', function () {
    return view('home');
});

Route::get('/shop', [ProductController::class, 'index'])->name('shop');

Route::get('/index.html', function () {
    return redirect('/Home');
});
