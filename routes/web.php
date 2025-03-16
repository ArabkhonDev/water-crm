<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\OrderController;



Route::get('/', function () {
    return view('welcome');
});

// Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


// Route::prefix('test')->group(function () {
Route::resource('customers', CustomerController::class);
Route::resource('orders', OrderController::class);
// });

Route::get('login', function () {
    return "login";
});


Route::get('register', function () {
    return "register";
});
