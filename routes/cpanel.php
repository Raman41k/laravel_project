<?php

use App\Http\Controllers\Cpanel\CpanelController;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\AdminManagerCheck;

Route::middleware(AdminManagerCheck::class)->group(function () {
    Route::get('/cpanel', [CpanelController::class, 'index'])->name('cpanel');
    Route::get('/cpanel/schedules', [CpanelController::class, 'schedules'])->name('cpanel.schedules');
    Route::get('/cpanel/workers', [CpanelController::class, 'workers'])->name('cpanel.workers');
});
