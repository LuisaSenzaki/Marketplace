<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;

Route::get('/home', function () {
    return view('home');
});

Route::get('/header', function () {
    return view('header');
});

Route::get('/cases', function () {
    return view('cases');
});

Route::get('/search', function () {
    return view('search');
});

Route::get('/adm', function () {
    return view('admin');
});

Route::get('/search', [ProductController::class, 'search']);
