<?php

use App\Http\Controllers\AdminMovieController;
use App\Http\Controllers\AdminQuoteController;
use App\Http\Controllers\MovieController;
use Brick\Math\RoundingMode;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [MovieController::class, 'index'])->name('home');

Route::get('/movie/{movie:slug}', [MovieController::class, 'show'])->name('quotes');

Route::get('/admin/movies', [AdminMovieController::class, 'index'])->name('movies');

Route::get('/admin/movies/{movie:slug}', [AdminMovieController::class, 'show'])->name('quotes');

Route::get('/admin/movies/{movie}/quote/create', [AdminQuoteController::class, 'create']);
Route::get('/admin/movies/{movie}/{quote}/edit', [AdminQuoteController::class, 'edit']);