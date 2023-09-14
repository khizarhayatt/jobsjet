<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Routes
|--------------------------------------------------------------------------
*/

Route::get('/login2', [LoginController::class, 'login'])->name('admin.login');
Route::get('/', [LoginController::class, 'login'])->name('admin.login');
//admin routes
Route::middleware(['guest'])->group(function () {
    // Route::middleware(['guest', 'throttle:60,1'])->group(function () {

    Route::get('/login', [LoginController::class, 'login'])->name('admin.login');
    Route::post('/login', [LoginController::class, 'verify'])->name('admin.verify');

    Route::get('/register', [RegisterController::class, 'register'])->name('admin.register');
    Route::post('/register', [RegisterController::class, 'create'])->name('admin.create');

    Route::get('/reset', [RegisterController::class, 'reset'])->name('admin.resetview');
    Route::post('/reset', [RegisterController::class, 'reset'])->name('admin.reset');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');
    Route::post('/logout', [LoginController::class, 'logout'])->name('admin.logout');
});