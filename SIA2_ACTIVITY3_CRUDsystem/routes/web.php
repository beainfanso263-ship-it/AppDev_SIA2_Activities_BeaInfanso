<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\QuizRecordController;

Route::get('/', function () {
    return redirect('/quiz_records');
});

Route::resource('quiz_records', QuizRecordController::class);