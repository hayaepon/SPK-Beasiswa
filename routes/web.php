<?php
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\KriteriaController;
use App\Http\Controllers\SubKriteriaController;
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
        return view('dashboard-superadmin');
    });

    // Rute untuk dashboard Admin
    Route::get('/dashboard-admin', function () {
        return view('dashboard-admin');
    });

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

// Route untuk profile
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
