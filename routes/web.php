<?php

use Illuminate\Support\Facades\Route;

Route::get('/', [ProductController::class, 'home'])->name('home'); 

Route::get('/contact', function () {
    return view('pages.contact');
})->name('contact');
<<<<<<< HEAD

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

=======

Route::get('/blog', function () {
    return view('pages.blog');
})->name('blog');

Route::get('/login', function () {
    return view('pages.login');
})->name('login');

Route::get('/register', function () {
    return view('pages.register');
})->name('register');


Route::get('/product', function () {
    return view('pages.product');
})->name('product');

Route::get('/productdetail', function () {
    return view('pages.productdetail');
})->name('productdetail');
// cart
Route::get('/cart', function () {
    return view('pages.cart');
})->name('cart');




>>>>>>> 207589b054b5ab8fb412005e15352a82bec3e38a
