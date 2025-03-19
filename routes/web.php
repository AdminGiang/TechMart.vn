<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('pages.home');
})->name('home');

// Route::get('/about', function () {
//     return view('pages.about');
// });

Route::get('/', function () {
    return view('pages.contact');
})->name('contact');