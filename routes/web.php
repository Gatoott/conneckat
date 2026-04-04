<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\EskulController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', [EskulController::class, 'index']);

Route::get('/login', function () {
    return view('login');
});
Route::post('/login', [UserController::class, 'login']);
Route::post('/register', [UserController::class, 'register']);


Route::get('/admin', [AdminController::class, 'admin']);
Route::post('/pembina', [UserController::class, 'store']);
