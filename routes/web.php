<?php

use App\Http\Controllers\BarangController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/lay', function () {
    return view('layout.app');
});


Route::get('barang', [BarangController::class, 'index'])->name('read.barang');
Route::post('create-barang', [BarangController::class,'create'])->name('create.barang');
Route::get('/posts/{id}/edit', [BarangController::class, 'edit'])->name('edit.barang');
Route::put('/posts/{id}', [BarangController::class, 'update'])->name('update.barang');