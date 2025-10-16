<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\LokasiBarangController;
use App\Http\Controllers\PerolehanBarangController;
use App\Http\Controllers\PenggunaController;
use App\Http\Controllers\PeranController;
use App\Http\Controllers\HakAksesController;

// =========================
// 🔹 PAGE UTAMA
// =========================
Route::get('/', fn() => view('pagehome.index'))->name('home');

// =========================
// 🔹 HALAMAN RUANGAN (Publik)
// =========================
Route::get('/ruangan-publik', [LokasiBarangController::class, 'publicIndex'])->name('ruangan.public');

// =========================
// 🔹 HALAMAN BARANG (Publik)
// =========================
Route::get('/ruangan/{id}/barang', [App\Http\Controllers\LokasiBarangController::class, 'showBarang'])->name('barang.per.ruangan');

// =========================
// 🔹 AUTH ROUTES (login/register)
// =========================
require __DIR__ . '/auth.php';

// =========================
// 🔹 ADMIN AREA (BUTUH LOGIN)
// =========================
Route::middleware(['auth'])->group(function () {

    // Dashboard Admin
    Route::get('/admin/dashboard', fn() => view('admin.dashboard'))->name('admin.dashboard');

    // Redirect /dashboard → admin.dashboard
    Route::get('/dashboard', fn() => redirect()->route('admin.dashboard'))->name('dashboard');

    // Profil Pengguna
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // CRUD Data
    Route::resource('barang', BarangController::class);
    Route::resource('lokasi', LokasiBarangController::class);
    Route::resource('perolehan', PerolehanBarangController::class);
    Route::resource('pengguna', PenggunaController::class);
    Route::resource('peran', PeranController::class);
    Route::resource('hak', HakAksesController::class);
});
