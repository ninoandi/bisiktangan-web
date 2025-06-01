<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AlphabetController;
use App\Http\Controllers\KataKerjaController;
use App\Http\Controllers\KataTanyaController;
use App\Http\Controllers\KataSifatController;
use App\Http\Controllers\InformasiController;

use App\Http\Controllers\PasswordResetController;


Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/alphabet', [AlphabetController::class, 'apiIndex']);
Route::get('/katakerja', [KataKerjaController::class, 'apiIndex']);
Route::get('/katatanya', [KataTanyaController::class, 'apiIndex']);
Route::get('/katasifat', [KataSifatController::class, 'apiIndex']);
Route::get('/informasi', [InformasiController::class, 'apiIndex']);



Route::post('/request-otp', [PasswordResetController::class, 'requestOtp']);
Route::post('/verify-otp', [PasswordResetController::class, 'verifyOtp']);
Route::post('/reset-password', [PasswordResetController::class, 'resetPassword']);
