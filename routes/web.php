<?php

use Illuminate\Support\Facades\Route;

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