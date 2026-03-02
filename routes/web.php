<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('Login.login');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware('admin')->group(function () {
    Route::get('/dashboard', [AdminController::class, 'index'])->name('admin.index');
    Route::get('/item', [AdminController::class, 'item'])->name('admin.item');
    Route::get('/order', [AdminController::class, 'order'])->name('admin.order');
    Route::get('/report', [AdminController::class, 'report'])->name('admin.report');

    Route::get('/user', [AdminController::class, 'user'])->name('admin.user');
    Route::get('/user/userMenu', [AdminController::class, 'userMenu'])->name('admin.userMenu');
    Route::get('/inventory', [AdminController::class, 'inventory'])->name('admin.inventory');
});

require __DIR__.'/auth.php';
