<?php

use App\Http\Controllers\PageController;
use Illuminate\Support\Facades\Route;

Route::get('/', [PageController::class, 'index'])->name('home');
Route::get('/workers', [PageController::class, 'workers'])->name('workers');

Route::get('/services', [PageController::class, 'services'])->name('services');
Route::get('/service/{service}', [PageController::class, 'service'])->name('services.service');
Route::get('/services/{service}/workers', [PageController::class, 'service'])->name('services.workers');
Route::get('/services/{service}/workers/{worker}', [PageController::class, 'serviceWorker'])->name('services.worker');

Route::post('/schedule', [PageController::class, 'postSchedule'])->name('post.schedule');

Route::get('/confirmation', [PageController::class, 'confirmation'])->name('services.confirmation');
