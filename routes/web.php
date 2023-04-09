<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\backend\adminController;
use  App\Http\Controllers\frontend\frontendController;
use App\Http\Controllers\backend\backendController;
use App\Http\Controllers\backend\productController;
use App\Http\Controllers\backend\userController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

//frontend
Route::controller(frontendController::class)->group(function () {
    Route::get('/', 'home')->name('home');
    Route::get('/shop', 'shop')->name('shop');
    Route::get('/singleProduct/{id?}', 'singleProduct')->name('singleProduct');
    Route::get('/cart', 'cart')->name('cart');
    Route::get('/checkout', 'checkout')->name('checkout');
});
//

//admin
Route::controller(adminController::class)->group(function(){
    Route::get('/adminLogin','destroy')->name('adminlogout');
    // Route::get('/adminLogout','destroy')->name('adminlogout');
});


//backend
// Dashboard 
Route::get('/dashboard', [backendController::class, 'dashboard'])->name('dashboard');

//Users
Route::controller(userController::class)->group(function () {
    Route::get('/users', 'index')->name('users');
});

// Products 
Route::controller(productController::class)->group(function () {
    Route::get('/product', 'index')->name('product');
    Route::get('/manageProduct', 'manageProduct')->name('manageProduct');
    Route::post('/addProduct', 'addProduct')->name('addProduct');
    Route::put('/updateProduct/{id}', 'update')->name('updateProduct');
    Route::get('/editProduct/{id}', 'edit')->name('editProduct');
    Route::get('/statusChange/{id}', 'statusChange')->name('Product.statusChange');
    Route::get('/deleteProduct/{id}', 'destroy')->name('deleteProduct');
});






Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
