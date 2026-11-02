<?php

use Illuminate\Support\Facades\Route;

// Auth
Route::prefix('auth')->group(function () {
    Route::post('/register', [\App\Http\Controllers\AuthController::class, 'register']);
    Route::post('/login', [\App\Http\Controllers\AuthController::class, 'login']);
    Route::post('/logout', [\App\Http\Controllers\AuthController::class, 'logout'])->middleware('auth:sanctum');
    Route::get('/user', [\App\Http\Controllers\AuthController::class, 'user'])->middleware('auth:sanctum');
});

// Users
Route::middleware('auth:sanctum')->prefix('users')->group(function () {
    Route::get('/', [\App\Http\Controllers\UserController::class, 'index']);
    Route::get('/{id}', [\App\Http\Controllers\UserController::class, 'show']);
    Route::put('/{id}', [\App\Http\Controllers\UserController::class, 'update']);
    Route::delete('/{id}', [\App\Http\Controllers\UserController::class, 'destroy']);
});
