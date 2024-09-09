<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\FactureController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;


Route::get('/', function () {
    return view('welcome');
});

// Default dashboard route, which redirects based on user type
Route::get('/dashboard', [ProfileController::class, 'logins'])->middleware(['auth', 'verified'])->name('dashboard');

// Supplier route with middleware protection
Route::middleware('auth')->group(function () {
    Route::get('/supplier', [ProfileController::class, 'supplier'])->name('supplier');
    Route::get('/suppliers', [ProfileController::class, 'getSuppliers'])->name('suppliers.index');

});


Route::get('register', [RegisteredUserController::class, 'create'])
    ->name('register');

Route::post('register', [RegisteredUserController::class, 'store']);


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


Route::prefix('admin')->middleware('auth')->group(function () {
    Route::get('category', function () {
        return view('category.index');
    });

});
Route::get('factures/create', [FactureController::class, 'create'])->name('factures.create');
Route::post('factures', [FactureController::class, 'store'])->name('factures.store');
Route::get('factures', [FactureController::class, 'index'])->name('factures.index');
require __DIR__.'/auth.php';


