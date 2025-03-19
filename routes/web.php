<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;

Route::get('/', function () {
    return view('pages.home');
})->name('home');


Route::get('/shop', [ProductController::class, 'index'])->name('shop');

Route::get('/login', function () {
    return view('pages.login');
});
