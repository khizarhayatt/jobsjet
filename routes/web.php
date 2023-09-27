<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\IndustryTypeController;
use App\Http\Controllers\OrganizationController;
use App\Http\Controllers\ProfessionController;
use App\Http\Controllers\SkillController;
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
Route::get('/', [LoginController::class, 'login'])->name('login');

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
    Route::get('permissions', [PermissionController::class, 'index'])->name('permissions.index');

    // Store a newly created permission in storage
    Route::post('permissions', [PermissionController::class, 'store'])->name('permissions.store');

    // Show the form for editing the specified permission
    Route::get('permissions/{id}/edit', [PermissionController::class, 'edit'])->name('permissions.edit');

    // Update the specified permission in storage
    Route::put('permissions/{id}', [PermissionController::class, 'update'])->name('permissions.update');

    // Remove the specified permission from storage
    Route::delete('permissions/{id}', [PermissionController::class, 'destroy'])->name('permissions.destroy');
    // roles
    // Show a listing of roles
    Route::get('roles', [RoleController::class, 'index'])->name('roles.index');

    // Store a newly created Role in storage
    Route::post('roles', [RoleController::class, 'store'])->name('roles.store');

    // Show the form for editing the specified Role
    Route::get('roles/{id}/edit', [RoleController::class, 'edit'])->name('roles.edit');

    // Update the specified Role in storage
    Route::put('roles/{id}', [RoleController::class, 'update'])->name('roles.update');

    // Remove the specified Role from storage
    Route::delete('roles/{id}', [RoleController::class, 'destroy'])->name('roles.destroy');

    // users
    // Show a listing of users
    Route::get('users', [AdminController::class, 'index'])->name('users.index');

    // Show a listing of users
    Route::get('users/create', [AdminController::class, 'create'])->name('users.create');

    // Store a newly created Role in storage
    Route::post('users', [AdminController::class, 'store'])->name('users.store');

    // Show the form for editing the specified Role
    Route::get('users/{id}/edit', [AdminController::class, 'edit'])->name('users.edit');

    // Update the specified Role in storage
    Route::put('users/{id}', [AdminController::class, 'update'])->name('users.update');

    // Remove the specified Role from storage
    Route::delete('users/{id}', [AdminController::class, 'destroy'])->name('users.destroy');

    // IndustryTypes
    // Show a listing of industry
    Route::get('industry', [IndustryTypeController::class, 'index'])->name('industry.index');

    // Store a newly created IndustryType in storage
    Route::post('industry', [IndustryTypeController::class, 'store'])->name('industry.store');

    // Show the form for editing the specified IndustryType
    Route::get('industry/{id}/edit', [IndustryTypeController::class, 'edit'])->name('industry.edit');

    // Update the specified IndustryType in storage
    Route::put('industry/{id}', [IndustryTypeController::class, 'update'])->name('industry.update');

    Route::delete('industry/{id}', [IndustryTypeController::class, 'destroy'])->name('industry.destroy');
   
    // ProfessionTypes
    // Show a listing of Profession
    Route::get('profession', [ProfessionController::class, 'index'])->name('profession.index');

    // Store a newly created ProfessionTypProfession in storage
    Route::post('profession', [ProfessionController::class, 'store'])->name('profession.store');

    // Show the form for editing the specified ProfessionTypProfession
    Route::get('profession/{id}/edit', [ProfessionController::class, 'edit'])->name('profession.edit');

    // Update the specified ProfessionTypProfession in storage
    Route::put('profession/{id}', [ProfessionController::class, 'update'])->name('profession.update');

    Route::delete('profession/{id}', [ProfessionController::class, 'destroy'])->name('profession.destroy');
   
    // Skills
    // Show a listing of Profession
    Route::get('skill', [SkillController::class, 'index'])->name('skill.index');

    // Store a newly created ProfessionTypProfession in storage
    Route::post('skill', [SkillController::class, 'store'])->name('skill.store');

    // Show the form for editing the specified ProfessionTypProfession
    Route::get('skill/{id}/edit', [SkillController::class, 'edit'])->name('skill.edit');

    // Update the specified ProfessionTypProfession in storage
    Route::put('skill/{id}', [SkillController::class, 'update'])->name('skill.update');

    Route::delete('skill/{id}', [SkillController::class, 'destroy'])->name('skill.destroy');

    // Skills
    // Show a listing of Profession
    Route::get('organization', [OrganizationController::class, 'index'])->name('organization.index');

    // Store a newly created ProfessionTypProfession in storage
    Route::post('organization', [OrganizationController::class, 'store'])->name('organization.store');

    // Show the form for editing the specified ProfessionTypProfession
    Route::get('organization/{id}/edit', [OrganizationController::class, 'edit'])->name('organization.edit');

    // Update the specified ProfessionTypProfession in storage
    Route::put('organization/{id}', [OrganizationController::class, 'update'])->name('organization.update');

    Route::delete('organization/{id}', [OrganizationController::class, 'destroy'])->name('organization.destroy');


});


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');