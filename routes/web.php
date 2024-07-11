<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;


Route::get('/', [AuthController::class, 'createAdmin']);
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
// Route::get('/home', [AuthController::class, 'login'])->name('login');
Route::post('/login', [AuthController::class, 'loginPost'])->name('login');
Route::get('/login', [AuthController::class, 'login'])->name('login'); 
Route::post('/register', [AuthController::class, 'registerPost'])->name('register');
Route::get('/register', [AuthController::class, 'register'])->name('register'); 
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::group(['middleware' => 'auth'], function () {
    Route::get('/welcome', [AuthController::class, 'welcome'])->name('welcome');
});

Route::group(['middleware' => ['auth']], function () {
    Route::get('/produk', [ProdukController::class, 'index'])->name('produks.index');
    Route::get('/produk/create', [ProdukController::class, 'create'])->name('produks.create');
    Route::post('/produk', [ProdukController::class, 'store'])->name('produks.store');
    Route::get('/produk/{produk}/edit', [ProdukController::class, 'edit'])->name('produks.edit');
    Route::put('/produk/{produk}', [ProdukController::class, 'update'])->name('produks.update');
    Route::delete('/produk/{produk}', [ProdukController::class, 'destroy'])->name('produks.destroy');
});