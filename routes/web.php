<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DishController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
Route::view('/createDish', 'dishes.createDish')->name('createDish');
Route::post('/createDish', [DishController::class, 'store'])->name('createDish.store');
Route::get('/dishes', [DishController::class, 'index'])->middleware('auth')->name('dishes');
Route::get('/dishes/{dish}/edit', [DishController::class, 'edit'])->middleware('auth')->name('dishes.edit');
Route::patch('/dishes/{dish}/update', [DishController::class, 'update'])->name('dishes.update');

require __DIR__ . '/auth.php';
