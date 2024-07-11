<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PenjualanController;
use App\Http\Controllers\PelangganController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\ChartController;
use App\Http\Controllers\COAController;
use App\Http\Controllers\KartuStokController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\BebanController;
use App\Http\Controllers\DataBebanController;


Route::get('/', [AuthController::class, 'createAdmin']);
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