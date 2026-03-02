<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('index');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

Route::get('/login_test',function(){
    return view('Login.login');
});

Route::get('/item',function(){
    return view('Item.index');
});
Route::get('/order',function(){
    return view('Order.index');
});
Route::get('/user',function(){
    return view('User.index');
});

Route::get('/user/userMenu',function(){
    return view('user.userMenu');
});