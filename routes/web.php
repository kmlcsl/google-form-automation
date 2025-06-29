<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\GoogleFormController;
use App\Http\Controllers\Admin\ExecutionController;

// Public routes
Route::get('/', [HomeController::class, 'index'])->name('home');

// Admin routes
Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

    Route::resource('google-forms', GoogleFormController::class);
    Route::post('google-forms/{googleForm}/execute', [ExecutionController::class, 'execute'])->name('executions.execute');
    Route::get('executions', [ExecutionController::class, 'index'])->name('executions.index');
    Route::get('executions/{execution}', [ExecutionController::class, 'show'])->name('executions.show');
});
