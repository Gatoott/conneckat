<?php

use App\Http\Controllers\EskulController;
use Illuminate\Support\Facades\Route;

Route::get('/', [EskulController::class, 'index']);

Route::get('/login', function () {
    return view('login');
});

Route::get('/admin', function () {
    return view('admin');
});
