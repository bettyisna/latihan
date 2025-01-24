<?php

use App\Http\Controllers\BarangController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('barang', [BarangController::class, 'index'])->name('read.barang');
Route::post('create-barang', [BarangController::class,'create'])->name('create.barang');