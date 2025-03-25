<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\admin\AdminController;



Route::prefix('admin')->group(function () {
    // Route::get('/', [AdminController::class, 'home'])->name('admin');
    Route::get('/admin', [AdminController::class, 'home'])->name('admin.dashboard');
    Route::get('/product', function () { return view('admin.pages.Product.Products'); })->name('Product');
});
