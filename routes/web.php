<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\HomeController;

Route::resource('mahasiswa', MahasiswaController::class);

Auth::routes();

Route::get('/', [MahasiswaController::class, 'index']);

Route::get('/home', [HomeController::class, 'index'])->name('home');
