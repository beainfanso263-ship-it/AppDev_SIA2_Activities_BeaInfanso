<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FormController;

Route::get('/form', [FormController::class, 'create']);
Route::post('/form', [FormController::class, 'store']);
Route::get('/bookings', [FormController::class, 'index']);
Route::post('/submit-booking', [FormController::class, 'store']);
