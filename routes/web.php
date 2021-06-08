<?php

use App\Http\Controllers\UjianController;
use Illuminate\Support\Facades\Route;

Route::get('/', [UjianController::class, 'index']);
// Route::get('/siswa', [GuruController::class, 'index']);
Route::get('/siswa/create', [UjianController::class, 'create']);
// Route::post('/siswa/simpan', [UjianController::class, 'store']);
// Route::get('/siswa/edit{id}', [UjianController::class, 'edit']);
Route::resource('siswa', UjianController::class);