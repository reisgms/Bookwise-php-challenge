<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BooksController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\CommentController;

Route::post('/comments', [CommentController::class, 'store'])->name('comments.store');


Route::get('/login', [LoginController::class, 'index'])->middleware('guest')->name('login');
Route::post('/login', [LoginController::class, 'login'])->middleware('guest')->name('login');
Route::get('/logout', LogoutController::class)->middleware('auth')->name('logout');


Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register']);

Route::get('/', [BooksController::class, 'index'])->name('books.index');
Route::get('/books', [BooksController::class, 'my'])->middleware('auth')->name('books.my');

Route::get('/books/create', [BooksController::class, 'create'])->middleware('auth')->name('books.create');
Route::post('/books/create', [BooksController::class, 'store'])->middleware('auth');

Route::get('/books/{book}', [BooksController::class, 'show'])->name('books.show');

Route::get('/books/{book}/edit', [BooksController::class, 'edit'])->name('books.edit');
Route::put('/books/{book}/edit', [BooksController::class, 'update']);

