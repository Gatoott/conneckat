<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\EskulController;
use App\Http\Controllers\PendaftaranController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', [EskulController::class, 'index']);

Route::get('/login', function () {
    return view('login');
});
Route::post('/login', [UserController::class, 'login']);
Route::post('/register', [UserController::class, 'register']);
Route::post('/logout', [UserController::class, 'logout']);


Route::get('/admin', [AdminController::class, 'admin']);

Route::post('/pembina', [UserController::class, 'store']);
Route::post('/delete-pembina/{id_user}', [UserController::class, 'destroy'])->name('pembina_destroy');

Route::post('/eskul', [EskulController::class, 'store']);
Route::put('/eskul/{id_eskul}', [EskulController::class, 'update'])->name('eskul_update');
Route::post('/eskul/{id_eskul}', [EskulController::class, 'destroy'])->name('eskul_destory');

Route::post('/pendaftaran', [PendaftaranController::class, 'store']);
Route::post('/delete-pendaftar/{id_pendaftar}', [PendaftaranController::class, 'destroy'])->name('pendaftar_destroy');
