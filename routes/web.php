<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;

Route::get('/home', function () {
    return view('home');
}) ->name('home');

Route::get('/header', function () {
    return view('header');
});

Route::get('/cases', function () {
    return view('cases');
})->name('cases');

Route::get('/adm', function () {
    return view('admin');
})->name('admin');

Route::get('/search', [ProductController::class, 'search']) ->name('search');
