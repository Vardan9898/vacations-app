<?php

use App\Http\Controllers\Manager\DashboardController;
use App\Http\Controllers\Manager\VacationsController;
use Illuminate\Support\Facades\Route;

Route::get('dashboard', [DashboardController::class, 'index'])->name('manager.dashboard');

Route::group(['prefix' => 'vacations'], function () {
    Route::get('', [VacationsController::class, 'index'])->name('manager.vacations.index');
    Route::post('{vacation}/approve', [VacationsController::class, 'approve'])->name('manager.vacations.approve');
});
