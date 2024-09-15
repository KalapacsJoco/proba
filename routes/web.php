<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\RedirectIfAdmin;
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

// Bejelentkezés után ezt a middleware-t fogjuk használni
// Admin útvonal
// Route::get('/admin', function () {
//     return view('dishes.admin');
// })->middleware('auth');

// Dishes útvonal
Route::get('/dishes', [DishController::class, 'index'])->middleware('auth');
//Route::post('/admin', [DishController::class, 'store'])->name('admin.store');

require __DIR__.'/auth.php';
