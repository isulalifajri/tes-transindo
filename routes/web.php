<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AuthenticationController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('detail-product/{id}', [HomeController::class, 'detailProduct'])->name('detail.product');

Route::get('/login', [AuthenticationController::class, 'register'])->name('register');
Route::group(['middleware' => 'guest'], function () {
    Route::get('/register', [AuthenticationController::class, 'register'])->name('register');
    Route::post('/registerakun', [AuthenticationController::class, 'registerakun'])->name('registerakun');
    Route::get('/login', [AuthenticationController::class, 'login'])->name('login');
    Route::post('/authenticate', [AuthenticationController::class, 'authenticate'])->name('authenticate');
});

Route::group(['middleware' => 'auth'], function () {
    Route::get('order', [OrderController::class, 'index'])->name('order');
    Route::get('order/pesanan', [OrderController::class, 'pesanan'])->name('order.pesanan');
    Route::get('order/cetak/{id}', [OrderController::class, 'cetak'])->name('cetak');
    Route::post('/checkout/{id}', [OrderController::class, 'checkout'])->name('checkout');
    Route::post('/logout', [AuthenticationController::class, 'logout'])->name('logout');
    
    
    Route::get('/profile/{id}', [ProfileController::class,'index'])->name('profile');
    Route::put('/profile/update/{id}', [ProfileController::class, 'updateprofile'])->name('profile.update');
    Route::put('/profile/password/{id}', [ProfileController::class, 'updatepassword'])->name('profile.password');
});

Route::group(['middleware' => ['auth', 'merchant']], function () {
    Route::get('product', [ProductController::class, 'index'])->name('product');
    Route::get('product/tambah-data', [ProductController::class, 'create'])->name('tambah-data');
    Route::post('product/store', [ProductController::class, 'store'])->name('store');
    Route::get('product/{id}/edit', [ProductController::class, 'edit'])->name('product.edit');
    Route::put('product/{id}/update', [ProductController::class, 'update'])->name('product.update');
    Route::delete('product/delete/{id}', [ProductController::class, 'destroy'])->name('destroy');


    Route::put('order/updateStatus/{id}', [OrderController::class, 'updateStatus'])->name('updateStatus');

});

