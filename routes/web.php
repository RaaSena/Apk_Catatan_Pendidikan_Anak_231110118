<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AnakController;

// Arahkan root langsung ke halaman anak
Route::get('/', function () {
    return redirect()->route('anak.index');
});

// Dashboard default diarahkan juga ke anak
Route::get('/dashboard', function () {
    return redirect()->route('anak.index');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    // Profile
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Anak (CRUD + Show)
    Route::get('/anak', [AnakController::class, 'index'])->name('anak.index');
    Route::get('/anak/create', [AnakController::class, 'create'])->name('anak.create');
    Route::post('/anak/store', [AnakController::class, 'store'])->name('anak.store');
    Route::get('/anak/{id}/edit', [AnakController::class, 'edit'])->name('anak.edit');
    Route::put('/anak/{id}', [AnakController::class, 'update'])->name('anak.update');
    Route::delete('/anak/{id}', [AnakController::class, 'destroy'])->name('anak.destroy');
    Route::get('/anak/{id}', [AnakController::class, 'show'])->name('anak.show');

    // Dashboard Ringkasan Anak
    Route::get('/dashboard-anak', [AnakController::class, 'dashboard'])->name('anak.dashboard');
});

require __DIR__.'/auth.php';
