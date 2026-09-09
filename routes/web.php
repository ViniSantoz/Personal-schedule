<?php


use App\Http\Controllers\CategoriaController;
use Illuminate\Support\Facades\Route;

Route::view('/', 'welcome')->name('home');

Route::resource('categorias',CategoriaController::class);

Route::middleware(['auth', 'verified'])->group(function () {
    Route::view('dashboard', 'dashboard')->name('dashboard');
});

require __DIR__.'/settings.php';
