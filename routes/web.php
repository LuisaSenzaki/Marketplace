<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CasesImagesController;
use App\Http\Controllers\HubProductController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CalcController;

Route::get('/home', function () {
    return view('home');
}) ->name('home');

Route::get('/header', function () {
    return view('header');
});

Route::get('/search', [ProductController::class, 'search']) ->name('search');
Route::get('/produto/{id}', [ProductController::class, 'show'])->name('produto.show');
Route::get('/produtohub/{id}', [HubProductController::class, 'show'])->name('produto-hub.show');
Route::get('/hubtv1', [HubProductController::class, 'hubtv1'])->name('hubtv1');
Route::get('/cases', [CasesImagesController::class, 'cases'])->name('cases');
Route::get('/calc', [CalcController::class, 'calc'])->name('calc');
Route::delete('/produto/{id}', [CalcController::class, 'remover'])->name('remover.produto');

Route::post('/adicionar-a-calculadora/{id}', [CalcController::class, 'adicionar'])
    ->name('calc.adicionar');

// GET → apenas redireciona de volta (ou para a calc)
Route::get('/adicionar-a-calculadora/{id}', function () {
    return redirect()->back();
});
Route::post('/calculadora/limpar', [CalcController::class, 'limpar'])->name('calc.limpar');

Route::get('/calc/count', [CalcController::class, 'count'])->name('calc.count');

Route::get('/', function () {
    return view('home');
});

Route::get('/dashboard', function () {
    return view('home');
})->middleware(['auth', 'verified'])->name('dashboard');

// ----- Rotas autenticadas (usuário comum) -----
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// ----- Rotas ADMIN protegidas por Gate can:admin -----
Route::middleware(['auth', 'can:admin'])->group(function () {
    Route::get('/admin', [ProductController::class, 'admin'])->name('admin');
    Route::post('/admin/store', [ProductController::class, 'store'])->name('admin.store');
    Route::delete('/admin/{product}', [ProductController::class, 'destroy'])->name('admin.destroy');

    Route::resource('hub-admin', HubProductController::class)
        ->names('hub-admin')
        ->parameters(['hub-admin' => 'hubProduct']);

    Route::get('/admin/{product}/edit', [ProductController::class, 'edit'])->name('admin.edit');
    Route::put('/admin/{product}', [ProductController::class, 'update'])->name('admin.update');
    Route::get('/products/{id}/video-id', [ProductController::class, 'getVideoId']);
});

require __DIR__.'/auth.php';
