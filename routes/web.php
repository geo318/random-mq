<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\MovieController;
use Illuminate\Support\Facades\Route;
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
Route::get('lang/{lang}', ['as' => 'lang.switch', 'uses' => 'App\Http\Controllers\LanguageController@switchLanguage']);

Route::get('/', [MovieController::class, 'index'])->name('home');
Route::get('/movie/{movie:slug}', [MovieController::class, 'show'])->name('quotes');

Route::view('/login', 'admin.login')->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'login'])->middleware('guest');
Route::post('/logout', [LoginController::class, 'destroy'])->name('logout');

Route::middleware('auth')->prefix('admin/movies')->group(function () {
	Route::get('/', [AdminMovieController::class, 'index'])->name('admin.movies');
	Route::view('/create', 'admin.movies.create')->name('admin.movies.create');
	Route::post('', [AdminMovieController::class, 'store']);
	Route::delete('/{movie}', [AdminMovieController::class, 'destroy'])->name('admin.movies.movie');
	Route::get('/{movie}/edit', [AdminMovieController::class, 'edit'])->name('admin.movies.edit');
	Route::patch('/{movie}', [AdminMovieController::class, 'update']);

	Route::get('{movie:slug}', [AdminMovieController::class, 'show'])->name('admin.quotes');

	Route::prefix('/{movie}')->group(function () {
		Route::view('/quote/create', 'admin.quotes.create')->name('admin.quote.create');
		Route::post('/quote', [AdminQuoteController::class, 'store'])->name('admin.quote.store');
		Route::get('/{quote}/edit', [AdminQuoteController::class, 'edit'])->name('admin.quote.edit');
		Route::patch('/{quote}', [AdminQuoteController::class, 'update'])->name('admin.quote');
		Route::delete('/{quote}', [AdminQuoteController::class, 'destroy']);
	});
});
