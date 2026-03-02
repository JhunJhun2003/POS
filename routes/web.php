<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('Login.login');
});

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

// Route::middleware('auth')->group(function () {
//     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
// });

Route::middleware('admin')->group(function () {

    Route::get('/register', [RegisteredUserController::class, 'create']);
    Route::get('/dashboard', [AdminController::class, 'index'])->name('admin.index');
    Route::get('/item', [AdminController::class, 'item'])->name('admin.item');
    Route::get('/bill', [AdminController::class, 'bill'])->name('admin.bill');
    // Add these routes to your web.php
Route::post('/get-item-price', [AdminController::class, 'getItemPrice'])->name('admin.get.item.price');
Route::post('/save-bill', [AdminController::class, 'saveBill'])->name('admin.save.bill');
    Route::get('/report', [AdminController::class, 'report'])->name('admin.report');

    Route::get('/user', [AdminController::class, 'user'])->name('admin.user');
    Route::get('/user/userMenu', [AdminController::class, 'userMenu'])->name('admin.userMenu');
    // Route::get('/inventory', [AdminController::class, 'inventory'])->name('admin.inventory');
    Route::post('/inventory', [AdminController::class, 'store'])->name('inventory.store');
    Route::post('/user', [AdminController::class, 'userStore'])->name('admin.addUser');
});

require __DIR__.'/auth.php';
