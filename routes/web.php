<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\BenefitController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\IndustryTypeController;
use App\Http\Controllers\LanguageController;
use App\Http\Controllers\OrganizationController;
use App\Http\Controllers\ProfessionController;
use App\Http\Controllers\SkillController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\TagController;
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
    Route::get('permissions', [PermissionController::class, 'index'])->name('permissions.index');
    Route::post('permissions', [PermissionController::class, 'store'])->name('permissions.store');
    Route::get('permissions/{id}/edit', [PermissionController::class, 'edit'])->name('permissions.edit');
    Route::put('permissions/{id}', [PermissionController::class, 'update'])->name('permissions.update');
    Route::delete('permissions/{id}', [PermissionController::class, 'destroy'])->name('permissions.destroy');

    // roles
    Route::get('roles', [RoleController::class, 'index'])->name('roles.index');
    Route::post('roles', [RoleController::class, 'store'])->name('roles.store');
    Route::get('roles/{id}/edit', [RoleController::class, 'edit'])->name('roles.edit');
    Route::put('roles/{id}', [RoleController::class, 'update'])->name('roles.update');
    Route::delete('roles/{id}', [RoleController::class, 'destroy'])->name('roles.destroy');

    // users
    Route::get('users', [AdminController::class, 'index'])->name('users.index');
    Route::get('users/create', [AdminController::class, 'create'])->name('users.create');
    Route::post('users', [AdminController::class, 'store'])->name('users.store');
    Route::get('users/{id}/edit', [AdminController::class, 'edit'])->name('users.edit');
    Route::put('users/{id}', [AdminController::class, 'update'])->name('users.update');
    Route::delete('users/{id}', [AdminController::class, 'destroy'])->name('users.destroy');

    // IndustryTypes
    Route::get('industry', [IndustryTypeController::class, 'index'])->name('industry.index');
    Route::post('industry', [IndustryTypeController::class, 'store'])->name('industry.store');
    Route::get('industry/{id}/edit', [IndustryTypeController::class, 'edit'])->name('industry.edit');
    Route::put('industry/{id}', [IndustryTypeController::class, 'update'])->name('industry.update');
    Route::delete('industry/{id}', [IndustryTypeController::class, 'destroy'])->name('industry.destroy');

    // ProfessionTypes
    Route::get('profession', [ProfessionController::class, 'index'])->name('profession.index');
    Route::post('profession', [ProfessionController::class, 'store'])->name('profession.store');
    Route::get('profession/{id}/edit', [ProfessionController::class, 'edit'])->name('profession.edit');
    Route::put('profession/{id}', [ProfessionController::class, 'update'])->name('profession.update');
    Route::delete('profession/{id}', [ProfessionController::class, 'destroy'])->name('profession.destroy');

    // Skills

    Route::get('skill', [SkillController::class, 'index'])->name('skill.index');
    Route::post('skill', [SkillController::class, 'store'])->name('skill.store');
    Route::get('skill/{id}/edit', [SkillController::class, 'edit'])->name('skill.edit');
    Route::put('skill/{id}', [SkillController::class, 'update'])->name('skill.update');
    Route::delete('skill/{id}', [SkillController::class, 'destroy'])->name('skill.destroy');

    // Oragnization

    Route::get('organization', [OrganizationController::class, 'index'])->name('organization.index');
    Route::post('organization', [OrganizationController::class, 'store'])->name('organization.store');
    Route::get('organization/{id}/edit', [OrganizationController::class, 'edit'])->name('organization.edit');
    Route::put('organization/{id}', [OrganizationController::class, 'update'])->name('organization.update');
    Route::delete('organization/{id}', [OrganizationController::class, 'destroy'])->name('organization.destroy');

    // Tag

    Route::get('tag', [TagController::class, 'index'])->name('tag.index');
    Route::post('tag', [TagController::class, 'store'])->name('tag.store');
    Route::get('tag/{id}/edit', [TagController::class, 'edit'])->name('tag.edit');
    Route::put('tag/{id}', [TagController::class, 'update'])->name('tag.update');
    Route::delete('tag/{id}', [TagController::class, 'destroy'])->name('tag.destroy');

    // Benefit

    Route::get('benefit', [BenefitController::class, 'index'])->name('benefit.index');
    Route::post('benefit', [BenefitController::class, 'store'])->name('benefit.store');
    Route::get('benefit/{id}/edit', [BenefitController::class, 'edit'])->name('benefit.edit');
    Route::put('benefit/{id}', [BenefitController::class, 'update'])->name('benefit.update');
    Route::delete('benefit/{id}', [BenefitController::class, 'destroy'])->name('benefit.destroy');

    // Language

    Route::get('language', [LanguageController::class, 'index'])->name('language.index');
    Route::post('language', [LanguageController::class, 'store'])->name('language.store');
    Route::get('language/{id}/edit', [LanguageController::class, 'edit'])->name('language.edit');
    Route::put('language/{id}', [LanguageController::class, 'update'])->name('language.update');
    Route::delete('language/{id}', [LanguageController::class, 'destroy'])->name('language.destroy');


});


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');