<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::post('/attendance-confirmation', [HomeController::class, 'attendanceConfirmation'])->name('attendance-confirmation');
Route::get('/videos', function () {
	return view('videos');
})->name('videos');
