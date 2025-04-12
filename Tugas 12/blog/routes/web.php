<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FormController;
use App\Http\Controllers\GenresController;

Route::get('/', [DashboardController::class, 'index'])->name('home');
Route::get('/register', [FormController::class, 'showRegisterForm'])->name('register');
Route::post('/welcome', [FormController::class, 'submitRegisterForm'])->name('register.submit');

//Create Genres
Route::get('/genres/create', [GenresController::class, 'create'])->name('genres.create');
Route::post('/genres', [GenresController::class, 'store'])->name('genres.store');

//Read Genres
Route::get('genres', [GenresController::class, 'index'])->name('genres.index');
Route::get('/genres/{id}', [GenresController::class, 'show'])->name('genres.show');

//Update Genres
Route::get('/genres/{id}/edit', [GenresController::class, 'edit'])->name('genres.edit');
Route::put('/genres/{id}', [GenresController::class, 'update'])->name('genres.update');

//Delete Genres
Route::delete('/genres/{id}', [GenresController::class, 'destroy'])->name('genres.destroy');
