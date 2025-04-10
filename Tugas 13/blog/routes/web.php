<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FormController;

Route::get('/', [DashboardController::class, 'index'])->name('home');
Route::get('/register', [FormController::class, 'showRegisterForm'])->name('register');
Route::post('/welcome', [FormController::class, 'submitRegisterForm'])->name('register.submit');
