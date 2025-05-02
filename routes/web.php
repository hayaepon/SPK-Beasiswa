<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\KriteriaController;
use App\Http\Controllers\SubKriteriaController;
use App\Http\Controllers\CalonPenerimaController;
use App\Http\Controllers\PerhitunganSMARTController;
use App\Http\Controllers\HasilSeleksiController;
use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;

// Route untuk halaman utama
Route::get('/', function () {
    return view('welcome');
});

// Rute untuk dashboard umum
Route::middleware(['auth', 'verified'])->group(function () {
    // Rute untuk dashboard
    Route::get('/dashboard', function () {
        return view('dashboard'); // Mengarahkan ke dashboard/index.blade.php
    })->name('dashboard');

    // Rute untuk dashboard Super Admin
    Route::get('/dashboard-superadmin', function () {
        if (Auth::check() && Auth::user()->role === 'superadmin') {
            return view('dashboard-superadmin');
        }
        abort(403); // atau redirect('/login') jika ingin arahkan ulang
    })->middleware(['auth']);
    

    // Rute untuk dashboard Admin
    Route::get('/dashboard-admin', function () {
        if (Auth::check() && Auth::user()->role === 'admin') {
            return view('dashboard-admin');
        }
        abort(403);
    })->middleware(['auth']);
    

    // Route untuk Kriteria & Bobot
    Route::get('/kriteria', [KriteriaController::class, 'index'])->name('kriteria.index');
    Route::post('/kriteria', [KriteriaController::class, 'store'])->name('kriteria.store');
    Route::get('/kriteria/edit/{id}', [KriteriaController::class, 'edit'])->name('kriteria.edit');
    Route::put('/kriteria/update/{id}', [KriteriaController::class, 'update'])->name('kriteria.update');
    Route::delete('/kriteria/destroy/{id}', [KriteriaController::class, 'destroy'])->name('kriteria.destroy');
});

// Route untuk Sub Kriteria
Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/subkriteria', [SubKriteriaController::class, 'index'])->name('subkriteria.index');
    Route::get('/subkriteria/create', [SubKriteriaController::class, 'create'])->name('subkriteria.create');
    Route::post('/subkriteria', [SubKriteriaController::class, 'store'])->name('subkriteria.store');
    Route::get('/subkriteria/edit/{id}', [SubKriteriaController::class, 'edit'])->name('subkriteria.edit');
    Route::put('/subkriteria/update/{id}', [SubKriteriaController::class, 'update'])->name('subkriteria.update');
    Route::delete('/subkriteria/destroy/{id}', [SubKriteriaController::class, 'destroy'])->name('subkriteria.destroy');
});

// Route untuk Data Calon Penerima
Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/data-calon-penerima', [CalonPenerimaController::class, 'index'])->name('data-calon-penerima');
    Route::post('/calon-penerima', [CalonPenerimaController::class, 'store'])->name('calon-penerima.store');
    Route::get('/calon-penerima/edit/{id}', [CalonPenerimaController::class, 'edit'])->name('calon-penerima.edit');
    Route::put('/calon-penerima/update/{id}', [CalonPenerimaController::class, 'update'])->name('calon-penerima.update');
    Route::delete('/calon-penerima/{id}', [CalonPenerimaController::class, 'destroy'])->name('calon-penerima.destroy');
});

//Route perhitungan smart
Route::middleware(['auth', 'verified'])->group(function () {
    // Rute untuk halaman Perhitungan SMART untuk Super Admin
    Route::get('/perhitungan-smart', [PerhitunganSMARTController::class, 'index'])->name('perhitungan-smart.index');
    
    // Rute untuk tombol Hitung
    Route::post('/perhitungan-smart/hitung', [PerhitunganSMARTController::class, 'hitung'])->name('perhitungan-smart.hitung');
});

//route hasil seleksi
Route::get('/hasil-seleksi', [HasilSeleksiController::class, 'index'])->name('hasil-seleksi');

//Route to show the admin management page
Route::get('/manajemen_admin', [AdminController::class, 'index'])->name('admin.index');

// Route to handle the form submission for adding an admin
Route::post('/manajemen_admin', [AdminController::class, 'store'])->name('admin.store');

// Route untuk profile
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
