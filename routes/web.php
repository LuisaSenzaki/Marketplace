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

// Route::get('/calc', function () {
//     return view('calc');
// })->name('calc');

Route::get('/search', [ProductController::class, 'search']) ->name('search');
Route::get('/produto/{id}', [ProductController::class, 'show'])->name('produto.show');
Route::get('/produtohub/{id}', [HubProductController::class, 'show'])->name('produto-hub.show');
Route::get('/hubtv1', [HubProductController::class, 'hubtv1'])->name('hubtv1');
Route::get('/cases', [CasesImagesController::class, 'cases'])->name('cases');

Route::get('/admin', [ProductController::class, 'admin'])->name('admin');
Route::post('/admin/store', [ProductController::class, 'store'])->name('admin.store');
Route::delete('/admin/{product}', [ProductController::class, 'destroy'])->name('admin.destroy');

Route::resource('hub-admin', HubProductController::class)
    ->names('hub-admin')
    ->parameters(['hub-admin' => 'hubProduct']);


Route::get('/admin/{product}/edit', [ProductController::class, 'edit'])->name('admin.edit');
Route::put('/admin/{product}', [ProductController::class, 'update'])->name('admin.update');

use App\Http\Controllers\CalcController;

Route::get('/calc', [CalcController::class, 'calc'])->name('calc');
Route::delete('/produto/{id}', [CalcController::class, 'remover'])->name('remover.produto');

Route::post('/adicionar-a-calculadora/{id}', [CalcController::class, 'adicionar'])->name('calc.adicionar');
Route::post('/calculadora/limpar', [CalcController::class, 'limpar'])->name('calc.limpar');
