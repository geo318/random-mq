<?php

use App\Http\Controllers\MovieController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\AdminMovieController;
use App\Http\Controllers\AdminQuoteController;
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
Route::view('/login', 'admin.login')->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'login'])->middleware('guest');
Route::post('/logout', [LoginController::class, 'destroy'])->name('logout');

Route::get('/admin/movies', [AdminMovieController::class, 'index'])->name('movies');
Route::get('/admin/movies/create', [AdminMovieController::class, 'create']);
Route::post('/admin/movies', [AdminMovieController::class, 'store']);
Route::delete('/admin/movies/{movie}', [AdminMovieController::class, 'destroy']);
Route::get('/admin/movies/{movie}/edit', [AdminMovieController::class, 'edit']);
Route::patch('/admin/movies/{movie}', [AdminMovieController::class, 'update']);


Route::get('/admin/movies/{movie:slug}', [AdminMovieController::class, 'show'])->name('quotes');

Route::get('/admin/movies/{movie}/quote/create', [AdminQuoteController::class, 'create']);
Route::get('/admin/movies/{movie}/{quote}/edit', [AdminQuoteController::class, 'edit']);