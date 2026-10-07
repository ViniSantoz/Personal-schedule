<?php

use App\Http\Controllers\PriorityController;
use App\Http\Controllers\CategoryController;
use Illuminate\Support\Facades\Route;

Route::view('/', 'welcome')->name('home');


Route::middleware(['auth', 'verified'])->group(function () {
    Route::view('dashboard', 'dashboard')->name('dashboard');
    Route::resource('categories',CategoryController::class);
    Route::resource('priorities', PriorityController::class);
}); 

require __DIR__.'/settings.php';
