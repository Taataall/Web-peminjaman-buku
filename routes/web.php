<?php

use App\Http\Controllers\CatalogController;
use Illuminate\Support\Facades\Route;

Route::get('/', [CatalogController::class, 'index'])->name('home');
Route::get('/books', [CatalogController::class, 'index'])->name('books.index');
Route::get('/books/{book}', [CatalogController::class, 'show'])->name('books.show');
Route::redirect('/login', '/admin/login')->name('login');

