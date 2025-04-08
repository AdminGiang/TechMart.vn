<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\BannerController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\BrandController;
use App\Http\Controllers\AdminController;




Route::prefix('admin')->group(function () {

    Route::get('/dashboard', [DashboardController::class, 'home'])->name('admin.pages.dashboard.index');
   // Route để hiển thị danh sách sản phẩm
    Route::get('/product', [ProductController::class, 'index'])->name('admin.products.index');
    // Route để xử lý việc xóa sản phẩm
    Route::delete('/products/{product}', [ProductController::class, 'destroy'])->name('admin.products.destroy');
    // Route để hiển thị form thêm sản phẩm
    Route::get('/products/create', [ProductController::class, 'create'])->name('admin.products.create');
    // Route để xử lý việc lưu sản phẩm mới
    Route::post('/products', [ProductController::class, 'store'])->name('products.store');
    // Route cho xem chi tiết sản phẩm
    Route::get('/admin/products/{product}', [ProductController::class, 'show'])->name('products.show');
    // Route cho hiển thị form sửa sản phẩm
    Route::get('/admin/products/{product}/edit', [ProductController::class, 'edit'])->name('admin.products.edit');
    // Route cho xử lý việc cập nhật sản phẩm (method POST hoặc PUT/PATCH)
    Route::match(['put', 'patch'], '/admin/products/{product}', [ProductController::class, 'update'])->name('admin.products.update');



    Route::prefix('admin/categories')->name('admin.pages.Category.')->group(function () {
        Route::get('/', [CategoryController::class, 'index'])->name('index');
        Route::get('/create', [CategoryController::class, 'create'])->name('create');
        Route::post('/', [CategoryController::class, 'store'])->name('store');
        Route::get('/{category}/edit', [CategoryController::class, 'edit'])->name('edit');
        Route::match(['put', 'patch'], '/{category}', [CategoryController::class, 'update'])->name('update');
        Route::delete('/{category}', [CategoryController::class, 'destroy'])->name('destroy');
    });


    Route::prefix('admin/brands')->name('admin.pages.Brand.')->group(function () {
        Route::get('/', [BrandController::class, 'index'])->name('index');
        Route::get('/create', [BrandController::class, 'create'])->name('create');
        Route::post('/', [BrandController::class, 'store'])->name('store');
        Route::get('/{brand}/edit', [BrandController::class, 'edit'])->name('edit');
        Route::match(['put', 'patch'], '/{brand}', [BrandController::class, 'update'])->name('update');
        Route::delete('/{brand}', [BrandController::class, 'destroy'])->name('destroy');
    });

    
    Route::prefix('admin/banners')->name('admin.pages.Banners.')->group(function () {
        Route::get('/', [BannerController::class, 'index'])->name('index');
        Route::get('/create', [BannerController::class, 'create'])->name('create');
        Route::post('/', [BannerController::class, 'store'])->name('store');
        Route::get('/{banner}/edit', [BannerController::class, 'edit'])->name('edit');
        Route::match(['put', 'patch'], '/{banner}', [BannerController::class, 'update'])->name('update');
        Route::delete('/{banner}', [BannerController::class, 'destroy'])->name('destroy');
        Route::post('/{banner}/toggle-status', [BannerController::class, 'toggleStatus'])->name('toggle-status');
        Route::get('/admin/banners/{id}/toggle-status', [BannerController::class, 'toggleStatus']);
    });
 

    Route::get('/Coupon', function () { return view('admin.pages.Coupon.Index'); })->name('admin.Coupon');
    Route::get('/Coupon/edit', function () { return view('admin.pages.Coupon.Edit'); })->name('admin.Coupon.Edit');
    Route::get('/Coupon/detail', function () { return view('admin.pages.Coupon.Detail'); })->name('admin.Coupon.Detail');
    Route::get('/Coupon/add', function () { return view('admin.pages.Coupon.Add'); })->name('admin.Coupon.Add');


    Route::get('/order', function () { return view('admin.pages.Order.Order'); })->name('admin.Order');
    Route::get('/oder/detail', function () { return view('admin.pages.Order.OrderItem'); })->name('admin.Order.Detail');


    Route::get('/role', function () { return view('admin.pages.Role.Index'); })->name('admin.Role');
    Route::get('/role/detail', function () { return view('admin.pages.Role.Detail'); })->name('admin.Role.Detail');
    Route::get('/role/edit', function () { return view('admin.pages.Role.Edit'); })->name('admin.Role.Edit');
    Route::get('/role/add', function () { return view('admin.pages.Role.Add'); })->name('admin.Role.Add');


    Route::get('/Staff', function () { return view('admin.pages.Staff.Index'); })->name('admin.Staff');
    Route::get('/Staff/edit', function () { return view('admin.pages.Staff.Edit'); })->name('admin.Staff.Edit');
    Route::get('/Staff/detail', function () { return view('admin.pages.Staff.Detail'); })->name('admin.Staff.Detail');
    Route::get('/Staff/add', function () { return view('admin.pages.Staff.Add'); })->name('admin.Staff.Add');


    Route::get('/User', function () { return view('admin.pages.User.User'); })->name('admin.User');
    Route::get('/User/detail', function () { return view('admin.pages.User.DetailUser'); })->name('admin.User.Detail');


   
});
