<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\KamusController;
use App\Http\Controllers\AlphabetController;
use App\Http\Controllers\KataKerjaController;
use App\Http\Controllers\KataSifatController;
use App\Http\Controllers\KataTanyaController;


Route::get('/', function () {
    return view('index');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

Route::get('/buat-user', [UserController::class, 'createUser']);

Route::get('/kamus', [App\Http\Controllers\KamusController::class, 'kamus'])->name('kamus');

Route::prefix('kamus')->group(function () {
    Route::get('/alphabet', [KamusController::class, 'alphabet'])->name('kamus.alphabet');
    Route::get('/kata-tanya', [KamusController::class, 'kataTanya'])->name('kamus.katatanya');
    Route::get('/kata-kerja', [KamusController::class, 'kataKerja'])->name('kamus.katakerja');
    Route::get('/kata-sifat', [KamusController::class, 'kataSifat'])->name('kamus.katasifat');
   
});

//alphabet
Route::prefix('kamus')->group(function () {
    Route::get('/alphabet', [AlphabetController::class, 'index'])->name('kamus.alphabet'); // Menampilkan daftar alphabet

    // Menyimpan data (POST)
    Route::post('/alphabet', [AlphabetController::class, 'store'])->name('alphabet.store');

    // Mengupdate data (PUT/PATCH)
    Route::put('/alphabet/{id}', [AlphabetController::class, 'update'])->name('alphabet.update');

    // Menghapus data (DELETE)
    Route::delete('/alphabet/{id}', [AlphabetController::class, 'destroy'])->name('alphabet.destroy');
});

//katakerja
Route::prefix('kamus')->group(function () {
    Route::get('/katakerja', [KataKerjaController::class, 'index'])->name('kamus.katakerja'); // Menampilkan daftar alphabet

    // Menyimpan data (POST)
    Route::post('/katakerja', [KataKerjaController::class, 'store'])->name('katakerja.store');

    // Mengupdate data (PUT/PATCH)
    Route::put('/katakerja/{id}', [KataKerjaController::class, 'update'])->name('katakerja.update');

    // Menghapus data (DELETE)
    Route::delete('/katakerja/{id}', [KataKerjaController::class, 'destroy'])->name('katakerja.destroy');
});

//katasifat
Route::prefix('kamus')->group(function () {
    Route::get('/katasifat', [KataSifatController::class, 'index'])->name('kamus.katasifat'); // Menampilkan daftar alphabet

    // Menyimpan data (POST)
    Route::post('/katasifat', [KataSifatController::class, 'store'])->name('katasifat.store');

    // Mengupdate data (PUT/PATCH)
    Route::put('/katasifat/{id}', [KataSifatController::class, 'update'])->name('katasifat.update');

    // Menghapus data (DELETE)
    Route::delete('/katasifat/{id}', [KataSifatController::class, 'destroy'])->name('katasifat.destroy');
});

//katatanya
Route::prefix('kamus')->group(function () {
    Route::get('/katatanya', [KataTanyaController::class, 'index'])->name('kamus.katatanya'); // Menampilkan daftar alphabet

    // Menyimpan data (POST)
    Route::post('/katatanya', [KataTanyaController::class, 'store'])->name('katatanya.store');

    // Mengupdate data (PUT/PATCH)
    Route::put('/katatanya/{id}', [KataTanyaController::class, 'update'])->name('katatanya.update');

    // Menghapus data (DELETE)
    Route::delete('/katatanya/{id}', [KataTanyaController::class, 'destroy'])->name('katatanya.destroy');
});

Route::get('/history', [App\Http\Controllers\HistoryController::class, 'history'])->name('history');