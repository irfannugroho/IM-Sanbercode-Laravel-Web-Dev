<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
// use App\Http\Controllers\FormController;
use App\Http\Controllers\GenresController;
use App\Http\Controllers\BooksController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProfileController;
use App\Http\Middleware\IsAdmin;
use App\Http\Controllers\CommentsController;

Route::get('/', [DashboardController::class, 'index'])->name('home');
// Route::get('/register', [FormController::class, 'showRegisterForm'])->name('register');
// Route::post('/welcome', [FormController::class, 'submitRegisterForm'])->name('register.submit');

Route::middleware(['auth', isAdmin::class])->group(function () {
    
    //Create Genres
    Route::post('/genres', [GenresController::class, 'store'])->name('genres.store');
    Route::get('/genres/create', [GenresController::class, 'create'])->name('genres.create');

    //Update Genres
    Route::get('/genres/{id}/edit', [GenresController::class, 'edit'])->name('genres.edit');
    Route::put('/genres/{id}', [GenresController::class, 'update'])->name('genres.update');
    
    //Delete Genres
    Route::delete('/genres/{id}', [GenresController::class, 'destroy'])->name('genres.destroy');
});


//Read Genres
Route::get('genres', [GenresController::class, 'index'])->name('genres.index');
Route::get('/genres/{id}', [GenresController::class, 'show'])->name('genres.show');


//Create Books
Route::get('/books', [BooksController::class, 'index'])->name('books.index');
Route::get('/books/create', [BooksController::class, 'create'])->name('books.create');

//Read Books
Route::post('/books', [BooksController::class, 'store'])->name('books.store'); 
Route::get('/books/{id}', [BooksController::class, 'show'])->name('books.show');

//Update Books
Route::get('/books/{id}/edit', [BooksController::class, 'edit'])->name('books.edit');
Route::put('/books/{id}', [BooksController::class, 'update'])->name('books.update');

//Delete Books
Route::delete('/books/{id}', [BooksController::class, 'destroy'])->name('books.destroy');

//Register
Route::get('/auth/register', [AuthController::class, 'showRegister'])->name('auth.register');
Route::post('/auth/register', [AuthController::class, 'register'])->name('register');

//Login
Route::get('/auth/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/auth/login', [AuthController::class, 'login'])->name('login.submit');

//Logout
Route::post('/auth/logout', [AuthController::class, 'logout'])->name('logout')->middleware('auth');

//Profile
//Create Profile
Route::get('/profile/create', [ProfileController::class, 'create'])->name('profile.create')->middleware('auth');
Route::post('/profile', [ProfileController::class, 'store'])->name('profile.store')->middleware('auth');

//Read Profile
Route::get('profile', [ProfileController::class, 'index'])->name('profile.index');
Route::get('profile/{id}', [ProfileController::class, 'show'])->name('profile.show');

//Update Profile
Route::get('/profile/{id}/edit', [ProfileController::class, 'edit'])->name('profile.edit')->middleware('auth');
Route::put('/profile/{id}', [ProfileController::class, 'update'])->name('profile.update')->middleware('auth');

//Delete Profile  
Route::delete('/profile/{id}', [ProfileController::class, 'destroy'])->name('profile.destroy')->middleware('auth');

//Comments
Route::post('/books/{id}/comments', [CommentsController::class, 'storeComment'])->name('books.comments.store')->middleware('auth');