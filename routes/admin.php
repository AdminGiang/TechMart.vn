<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\BannerController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\AdminController;


// Route::prefix('admin')->group(function () {
//     Route::get('/dashboard', [DashboardController::class, 'home'])->name('admin.dashboard');
//     Route::get('/product', function () { return view('admin.pages.Product.Product'); })->name('admin.Product');
//     Route::get('/product/edit', function () { return view('admin.pages.Product.EditProduct'); })->name('admin.Product.Edit');
//     Route::get('/product/detail', function () { return view('admin.pages.Product.DetailProduct'); })->name('admin.Product.Detail');
//     Route::get('/product/add', function () { return view('admin.pages.Product.AddProduct'); })->name('admin.Product.Add');


//     Route::get('/category', function () { return view('admin.pages.Category.Category'); })->name('admin.Category');
//     Route::get('/category/edit', function () { return view('admin.pages.Category.EditCategory'); })->name('admin.Category.Edit');
//     Route::get('/category/detail', function () { return view('admin.pages.Category.DetailCategory'); })->name('admin.Category.Detail');
//     Route::get('/category/add', function () { return view('admin.pages.Category.AddCategory'); })->name('admin.Category.Add');


//     Route::get('/brand', function () { return view('admin.pages.Brand.Brand'); })->name('admin.Brand');
//     Route::get('/brand/detail', function () { return view('admin.pages.Brand.DetailBrand'); })->name('admin.Brand.Detail');
//     Route::get('/brand/edit', function () { return view('admin.pages.Brand.EditBrand'); })->name('admin.Brand.Edit');
//     Route::get('/brand/add', function () { return view('admin.pages.Brand.AddBrand'); })->name('admin.Brand.Add');


//     Route::get('/order', function () { return view('admin.pages.Order.Order'); })->name('admin.Order');
//     Route::get('/oder/detail', function () { return view('admin.pages.Order.OrderItem'); })->name('admin.Order.Detail');


//     Route::get('/role', function () { return view('admin.pages.Role.Role'); })->name('admin.Role');
//     Route::get('/role/detail', function () { return view('admin.pages.Role.DetailRole'); })->name('admin.Role.Detail');
//     Route::get('/role/edit', function () { return view('admin.pages.Role.EditRole'); })->name('admin.Role.Edit');
//     Route::get('/role/add', function () { return view('admin.pages.Role.AddRole'); })->name('admin.Role.Add');


//     Route::get('/Staff', function () { return view('admin.pages.Staff.Staff'); })->name('admin.Staff');
//     Route::get('/Staff/edit', function () { return view('admin.pages.Staff.EditStaff'); })->name('admin.Staff.Edit');
//     Route::get('/Staff/detail', function () { return view('admin.pages.Staff.DetailStaff'); })->name('admin.Staff.Detail');
//     Route::get('/Staff/add', function () { return view('admin.pages.Staff.AddStaff'); })->name('admin.Staff.Add');


//     Route::get('/User', function () { return view('admin.pages.User.User'); })->name('admin.User');
//     Route::get('/User/detail', function () { return view('admin.pages.User.DetailUser'); })->name('admin.User.Detail');


//     // Route::get('/banner', function () { return view('admin.pages.Banner.index'); })->name('admin.Banner');
//     //  Route::get('/banner/detail', function () { return view('admin.pages.Banner'); })->name('admin.Banner.Detail');
//     // Route::get('/banner/edit', function () { return view('admin.pages.Banner.EditRole'); })->name('admin.Banner.Edit');
//     //Route::get('/banner/add', function () { return view('admin.pages.Banner.create'); })->name('admin.banners.create');

// });






