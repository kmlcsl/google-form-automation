<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\GoogleFormController;
use App\Http\Controllers\Admin\ExecutionController;

// Public routes
Route::get('/', [HomeController::class, 'index'])->name('home');

// Authentication routes
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.post');
Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::post('/register', [AuthController::class, 'register'])->name('register.post');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Protected admin routes
Route::prefix('admin')->name('admin.')->middleware('auth')->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

    Route::resource('google-forms', GoogleFormController::class);
    Route::post('google-forms/{googleForm}/execute', [ExecutionController::class, 'execute'])->name('executions.execute');
    Route::get('executions', [ExecutionController::class, 'index'])->name('executions.index');
    Route::get('executions/{execution}', [ExecutionController::class, 'show'])->name('executions.show');
});
