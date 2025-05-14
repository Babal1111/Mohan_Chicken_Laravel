<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});

use App\Http\Controllers\MenuItemController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\TableController;


// Route::middleware(['auth', 'admin'])->group(function () {
//     Route::resource('categories', CategoryController::class);
//     Route::resource('menu-items', MenuItemController::class);
//     Route::resource('orders', OrderController::class);
//     Route::resource('reservations', ReservationController::class);
//     Route::resource('tables', TableController::class);
//     // Add more admin routes here
// });

// Route::middleware(['auth', 'admin'])->get('/admin', [App\Http\Controllers\AdminController::class, 'index'])->name('admin.dashboard');

// Route::get('/login', function () {
//     // Return your login view here
//     return view('auth.login');
// })->name('login');


// Route::get('/dashboard', function () {
//     return view('admin.dashboard');
// })->middleware(['auth'])->name('dashboard');


// Route::middleware(['auth'])->group(function () {
//     Route::get('/profile/edit', function () {
//         // Return a profile edit view, or your own controller
//         return view('profile.edit');
//     })->name('profile.edit');
// });

// Route::get('/logout', function () {
//     Auth::logout();
//     return redirect('/');
// })->name('logout');





// Public routes
Route::get('/', function () {
    return view('home');
});

// Add your resource routes here (without auth)
Route::resource('categories', CategoryController::class);
Route::resource('menu-items', MenuItemController::class);
Route::resource('orders', OrderController::class);
Route::resource('reservations', ReservationController::class);
Route::resource('tables', TableController::class);
// Route::post('/orders', [OrderController::class, 'store'])->name('orders.store');
