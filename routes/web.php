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

Route::get('/calc', function () {
    return view('calc');
})->name('calc');

Route::get('/search', [ProductController::class, 'search']) ->name('search');
Route::get('/produto/{id}', [ProductController::class, 'show'])->name('produto.show');
Route::get('/hubtv1', [HubProductController::class, 'hubtv1'])->name('hubtv1');
Route::get('/cases', [CasesImagesController::class, 'cases'])->name('cases');

Route::get('/admin', [ProductController::class, 'admin'])->name('admin');
Route::post('/admin/store', [ProductController::class, 'store'])->name('admin.store');
Route::delete('/admin/{product}', [ProductController::class, 'destroy'])->name('admin.destroy');

Route::get('/admin/{product}/edit', [ProductController::class, 'edit'])->name('admin.edit');
Route::put('/admin/{product}', [ProductController::class, 'update'])->name('admin.update');