<?php

use App\Http\Controllers\PageController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('register');
})->name('home');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/services', [PageController::class, 'services'])->name('services');
    Route::get('/workers', [PageController::class, 'workers'])->name('workers');
    Route::get('/service/{service}', [PageController::class, 'service'])->name('services.service');
    Route::get('/services/{service}/workers', [PageController::class, 'service'])->name('services.workers');
    Route::get('/services/{service}/workers/{worker}', [PageController::class, 'serviceWorker'])->name('services.worker');
    Route::post('/schedule', [PageController::class, 'postSchedule'])->name('post.schedule');
    Route::get('/confirmation', [PageController::class, 'confirmation'])->name('services.confirmation');
});

require __DIR__.'/auth.php';
