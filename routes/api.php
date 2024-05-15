<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\ApiController;

//Route::get('/user', function (Request $request) {
//    return $request->user();
//})->middleware('auth:sanctum');

Route::get('/workers', [ApiController::class, 'workers']);
Route::get('/services', [ApiController::class, 'services']);
Route::get('/vacations', [ApiController::class, 'vacations']);
