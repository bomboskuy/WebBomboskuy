<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\PenjualanController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('Auth/Login');
});

// LoginController
Route::get('/login', [LoginController::class, 'index'])->name('login.index');
Route::post('/login/authenticate', [LoginController::class, 'authenticate'])->name('login.authenticate');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');


// admin
Route::prefix('admin')->group(function(){

    Route::get('/dashboard', function(){
        return view('admin.dashboard');
    })->name('admin.dashboard');
    
    // PenjualanController
    Route::get('/penjualan/all', [PenjualanController::class, 'index'])->name('penjualan.index');
    Route::get('/penjualan/create', [PenjualanController::class, 'create'])->name('penjualan.create');
    Route::post('/penjualan/store', [PenjualanController::class, 'store'])->name('penjualan.store');
    Route::get('/penjualan/{id}/edit', [PenjualanController::class, 'edit'])->name('penjualan.edit');
    Route::put('/penjualan/{id}/update', [PenjualanController::class, 'update'])->name('penjualan.update');
    Route::delete('/penjualan/{id}/delete', [PenjualanController::class, 'delete'])->name('penjualan.delete');

});