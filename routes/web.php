<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('pages.home');
});

Route::get('/contact', function () {
    return view('pages.contact'); 
})->name('contact');

Route::get('/about', function () {
    return view('pages.home');
})->name('home');