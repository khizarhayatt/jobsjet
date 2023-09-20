<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\RoleController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Routes
|--------------------------------------------------------------------------
*/
Auth::routes();
Route::get('/', [LoginController::class, 'login'])->name('admin.login');

//admin routes
Route::middleware(['guest'])->group(function () {
    // Route::middleware(['guest', 'throttle:60,1'])->group(function () {

    Route::get('/login', [LoginController::class, 'login'])->name('admin.login');
    Route::post('/login', [LoginController::class, 'verification'])->name('auth.verification');


    Route::get('/register', [RegisterController::class, 'register'])->name('admin.register');
    Route::post('/register', [RegisterController::class, 'create'])->name('admin.create');

    // Forgot Password Routes
    Route::get('/forgot-password', [ForgotPasswordController::class, 'showLinkRequestForm'])->name('admin.password.request');
    Route::post('/forgot-password', [ForgotPasswordController::class, 'sendResetLinkEmail'])->name('admin.password.email');

    // Password Reset Routes
    Route::get('/reset-password/{token}', [ResetPasswordController::class, 'showResetForm'])->name('admin.password.reset');
    Route::post('/reset-password', [ResetPasswordController::class, 'reset'])->name('admin.password.update');
});



Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');
    Route::get('/users', [HomeController::class, 'userlist'])->name('admin.users.list');
    Route::post('/logout', [LoginController::class, 'logout'])->name('admin.logout');

   

    // Permissions
     // Show a listing of permissions
    Route::get('permissions', [PermissionController::class,'index'])->name('permissions.index');

    // Store a newly created permission in storage
    Route::post('permissions', [PermissionController::class,'store'])->name('permissions.store');

    // Show the form for editing the specified permission
    Route::get('permissions/{id}/edit', [PermissionController::class,'edit'])->name('permissions.edit');

    // Update the specified permission in storage
    Route::put('permissions/{id}', [PermissionController::class,'update'])->name('permissions.update');

    // Remove the specified permission from storage
    Route::delete('permissions/{id}', [PermissionController::class,'destroy'])->name('permissions.destroy');
    // roles
     // Show a listing of roles
    Route::get('roles', [RoleController::class,'index'])->name('roles.index');

    // Store a newly created Role in storage
    Route::post('roles', [RoleController::class,'store'])->name('roles.store');

    // Show the form for editing the specified Role
    Route::get('roles/{id}/edit', [RoleController::class,'edit'])->name('roles.edit');

    // Update the specified Role in storage
    Route::put('roles/{id}', [RoleController::class,'update'])->name('roles.update');

    // Remove the specified Role from storage
    Route::delete('roles/{id}', [RoleController::class,'destroy'])->name('roles.destroy');


});


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');