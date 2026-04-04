<?php

use App\Http\Controllers\EskulController;
use App\Http\Controllers\PendaftaranController;
use App\Http\Controllers\StorageController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::post('register', [UserController::class, 'register']);
Route::post('login', [UserController::class, 'login']);
Route::post('/{id}/pendaftaran/{id_kelas}', [PendaftaranController::class, 'store']);


Route::middleware('auth:sanctum')->group(function () {
    Route::post('eskul', [EskulController::class, 'store']);
});