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
Route::post('/barang/create', [BarangController::class,'create'])->name('create.barang');
Route::get('/barang/{id}/edit', [BarangController::class, 'edit'])->name('edit.barang');
Route::put('/barang/{id}', [BarangController::class, 'update'])->name('update.barang');
Route::delete('/barang/{id}', [BarangController::class, 'destroy'])->name('delete.barang');
