<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AdminController;
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

require __DIR__.'/auth.php';

Route::get('/login_test',function(){
    return view('Login.login');
});



Route::middleware('admin')->group(function () {
Route::get('/item',function(){
    return view('Item.index');
});

Route::get('/user/userMenu',function(){
    return view('user.userMenu');
});
//for the categories
    Route::get('/add_category', [AdminController::class, 'addCategory'])->name('admin.addcategory');

    Route::post('/add_category', [AdminController::class, 'postAddCategory'])->name('admin.postaddcategory');

    Route::get('/view_category', [AdminController::class, 'viewCategory'])->name('admin.viewcategory');

    Route::get('/delete_category/{id}', [AdminController::class, 'deleteCategory'])->name('admin.categorydelete');

    Route::get('/update_category/{id}', [AdminController::class, 'updateCategory'])->name('categorytoupdate');

    Route::post('/update_category/{id}', [AdminController::class, 'postUpdateCategory'])->name('admin.postupdatecategory');


//for the products
    Route::get('/delete_product/{id}', [AdminController::class, 'deleteProduct'])->name('admin.productdelete');

    Route::post('/updated_product/{id}', [AdminController::class, 'updateProduct'])->name('admin.producttoupdate');   

    Route::get('/update_product/{id}', [AdminController::class, 'editProduct'])->name('producttoupdate');
    
    Route::get('/add_product', [AdminController::class, 'addProduct'])->name('admin.addproduct');

    Route::get('/view_product', [AdminController::class, 'viewProduct'])->name('admin.viewproduct');

    Route::post('/add_product', [AdminController::class, 'postAddProduct'])->name('admin.postaddproduct');

    //for search product
    Route::any('/search_product', [AdminController::class, 'searchProduct'])->name('admin.searchproduct');
});