<?php

use App\Http\Controllers\CasesImagesController;
use App\Http\Controllers\HubProductController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;

Route::get('/home', function () {
    return view('home');
}) ->name('home');

Route::get('/header', function () {
    return view('header');
});

Route::get('/adm', function () {
    return view('admin');
})->name('admin');

Route::get('/search', [ProductController::class, 'search']) ->name('search');
Route::get('/hubtv1', [HubProductController::class, 'hubtv1'])->name('hubtv1');
Route::get('/cases', [CasesImagesController::class, 'cases'])->name('cases');