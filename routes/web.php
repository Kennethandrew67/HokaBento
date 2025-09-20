<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\HistoryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\Authorization;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'getContent'])->name('home');

Route::get('/menu', [MenuController::class, 'getAll'])->name('menu');

Route::middleware(['guest'])->group(function () {
    Route::get('/register', function () {
        return view('register');
    });
    Route::post('/create/user', [UserController::class, 'register'])->name('register_post');
    Route::get('/login', action: function () {
        return view('login');
    });
    Route::post('/authentication', [UserController::class, 'login'])->name('login');
});

Route::middleware(['user'])->group(function () {
    Route::get('/profile', function(){
        return view('profile');
    });
    Route::post('/update/profile', [UserController::class, 'updateUser'])->name('update.profile');
    Route::get('/history', [HistoryController::class, 'getUserHistory'])->name('get.history');
    Route::post('/logout', [UserController::class, 'logout'])->name('logout');

});

Route::middleware(['customer'])->group(function () {
    Route::post('/add/cart', [MenuController::class, 'AddCart'])->name('add.cart');
    Route::put('/cart/edit-quantity/{cartId}', [CartController::class, 'editQuantity'])->name('cart.editQuantity');
    Route::delete('/cart/remove/{cartId}', [CartController::class, 'remove'])->name('cart.remove');
    Route::get('/cart', [CartController::class, 'getUserCart'])->name('cart');
    Route::get('/checkout', [CheckoutController::class, 'getUserCart'])->name('get.checkout');
    Route::post('/transaction', [CheckoutController::class, 'createTransaction'])->name('transaction.create');
});







