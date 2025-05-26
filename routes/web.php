<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Arsip\KategoriController;
use App\Http\Controllers\Arsip\KodeController;
use App\Http\Controllers\Arsip\LokasiController;
use App\Http\Controllers\Arsip\BeritaController;
use App\Http\Controllers\Arsip\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('layouts.dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Tabel User
Route::get('/user', [UserController::class, 'index'])->name('user.index');
Route::get('/user/create', [UserController::class, 'create'])->name('user.create');
Route::post('/user', [UserController::class, 'store'])->name('user.store');
Route::get('/user/{user}/edit', [UserController::class, 'edit'])->name('user.edit');
Route::put('/user/{user}', [UserController::class, 'update'])->name('user.update');
Route::delete('/user/{user}', [UserController::class, 'destroy'])->name('user.destroy');

Route::get('/register', [UserController::class, 'showRegister'])->name('register');
Route::post('/register', [UserController::class, 'register']);


// Tabel Kategori
Route::get('/kategori', [KategoriController::class, 'index'])->name('kategori.index');
Route::get('/kategori/create', [KategoriController::class, 'create'])->name('kategori.create');
Route::post('/kategori', [KategoriController::class, 'store'])->name('kategori.store');
Route::get('/kategori/{kategori}/edit', [KategoriController::class, 'edit'])->name('kategori.edit');
Route::put('/kategori/{kategori}', [KategoriController::class, 'update'])->name('kategori.update');
Route::delete('/kategori/{kategori}', [KategoriController::class, 'destroy'])->name('kategori.destroy');

// Tabel Kode
Route::get('/kode', [KodeController::class, 'index'])->name('kode.index');
Route::get('/kode/create', [KodeController::class, 'create'])->name('kode.create');
Route::post('/kode', [KodeController::class, 'store'])->name('kode.store');
Route::get('/kode/{kode}/edit', [KodeController::class, 'edit'])->name('kode.edit');
Route::put('/kode/{kode}', [KodeController::class, 'update'])->name('kode.update');
Route::delete('/kode/{kode}', [KodeController::class, 'destroy'])->name('kode.destroy');

// Tabel Lokasi
Route::get('/lokasi', [LokasiController::class, 'index'])->name('lokasi.index');
Route::get('/lokasi/create', [LokasiController::class, 'create'])->name('lokasi.create');
Route::post('/lokasi', [LokasiController::class, 'store'])->name('lokasi.store');
Route::get('/lokasi/{lokasi}/edit', [LokasiController::class, 'edit'])->name('lokasi.edit');
Route::put('/lokasi/{lokasi}', [LokasiController::class, 'update'])->name('lokasi.update');
Route::delete('/lokasi/{lokasi}', [LokasiController::class, 'destroy'])->name('lokasi.destroy');

// Tabel Berita
Route::get('/berita', [BeritaController::class, 'index'])->name('berita.index');
Route::get('/berita/create', [BeritaController::class, 'create'])->name('berita.create');
Route::post('/berita', [BeritaController::class, 'store'])->name('berita.store');
Route::get('/berita/{berita}', [BeritaController::class, 'show'])->name('berita.show');
Route::get('/berita/{berita}/edit', [BeritaController::class, 'edit'])->name('berita.edit');
Route::put('/berita/{berita}', [BeritaController::class, 'update'])->name('berita.update');
Route::delete('/berita/{berita}', [BeritaController::class, 'destroy'])->name('berita.destroy');

require __DIR__.'/auth.php';

