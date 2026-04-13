<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PublicOrderController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\OrderController;

// --- Vistas sin registro (Públicas) ---
// Reemplazamos el 'welcome' de Breeze por tu buscador de Halcón
Route::get('/', [PublicOrderController::class, 'index'])->name('home');
Route::post('/search', [PublicOrderController::class, 'search'])->name('public.search');

// --- Dashboard de Breeze ---
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// --- Vistas protegidas (Requieren Login) ---
Route::middleware('auth')->group(function () {
    
    // Rutas de Perfil (Generadas por Breeze)
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Módulo de Usuarios (Halcón)
    Route::resource('users', UserController::class);

    // Módulo de Órdenes (Halcón)
    Route::get('/orders/archived', [OrderController::class, 'archived'])->name('orders.archived');
    Route::post('/orders/{id}/restore', [OrderController::class, 'restore'])->name('orders.restore');
    Route::resource('orders', OrderController::class);
});

// Archivo de rutas de autenticación de Breeze
require __DIR__.'/auth.php';