<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LibroController;
use App\Http\Controllers\AuthController;

Route::get('/libros', [LibroController::class, 'index']);
Route::get('/libros/{id}', [LibroController::class, 'show']);
Route::middleware('auth:sanctum')->group(function(){
    Route::post('/libros', [LibroController::class, 'store']);
    Route::delete('/libros/{id}', [LibroController::class, 'destroy']);
});
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);