<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DishController;
use App\Http\Controllers\CartController;

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

// Dish routes

Route::view('/createDish', 'dishes.createDish')->name('createDish');
Route::post('/createDish', [DishController::class, 'store'])->name('createDish.store');
Route::get('/dishes', [DishController::class, 'index'])->middleware('auth')->name('dishes');
Route::get('/dishes/{dish}/edit', [DishController::class, 'edit'])->middleware('auth')->name('dishes.edit');
Route::patch('/dishes/{dish}/update', [DishController::class, 'update'])->name('dishes.update');
Route::delete('/dishes/{dish}/destroy', [DishController::class, 'destroy'])->name('dishes.destroy');

// Cart routes
Route::view('/cart', 'cart.cart')->name('cart');
Route::post('/cart/add', [CartController::class, 'addToCart'])->name('cart.add');

require __DIR__ . '/auth.php';
