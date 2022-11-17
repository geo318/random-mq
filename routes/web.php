<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\MovieController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminMovieController;
use App\Http\Controllers\AdminQuoteController;
use App\Http\Controllers\LanguageController;
use Illuminate\Contracts\Session\Session;
use Illuminate\Support\Facades\App;

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

Route::redirect('/', Session()->get('applocale') ?? config('app.locale'));

Route::get('lang/{lang}', ['as' => 'lang.switch', 'uses' => 'App\Http\Controllers\LanguageController@switchLanguage']);

Route::group([
	'prefix' => '{lang}',
	'where'  => ['{lang}', '[a-zA-Z]{2}'],
], function () {
	Route::get('/', [MovieController::class, 'index'])->name('home');
	Route::get('/movie/{movie:slug}', [MovieController::class, 'show'])->name('quotes');

	Route::view('/login', 'admin.login')->name('login')->middleware('guest');
	Route::post('/login', [LoginController::class, 'login'])->middleware('guest');
	Route::post('/logout', [LoginController::class, 'destroy'])->name('logout');

	Route::middleware('auth')->group(function () {
		Route::get('/admin/movies', [AdminMovieController::class, 'index'])->name('admin.movies');
		Route::view('/admin/movies/create', 'admin.movies.create')->name('admin.movies.create');
		Route::post('/admin/movies', [AdminMovieController::class, 'store']);
		Route::delete('/admin/movies/{movie}', [AdminMovieController::class, 'destroy'])->name('admin.movies.movie');
		Route::get('/admin/movies/{movie}/edit', [AdminMovieController::class, 'edit'])->name('admin.movies.edit');
		Route::patch('/admin/movies/{movie}', [AdminMovieController::class, 'update']);

		Route::get('/admin/movies/{movie:slug}', [AdminMovieController::class, 'show'])->name('admin.quotes');
		Route::view('/admin/movies/{movie}/quote/create', 'admin.quotes.create')->name('admin.quote.create');
		Route::post('/admin/movies/{movie}/quote', [AdminQuoteController::class, 'store'])->name('admin.quote.store');
		Route::view('/admin/movies/{movie}/{quote}/edit', 'admin.quotes.edit')->name('admin.quote.edit');
		Route::patch('/admin/movies/{movie}/{quote}', [AdminQuoteController::class, 'update'])->name('admin.quote');
		Route::delete('/admin/movies/{movie}/{quote}', [AdminQuoteController::class, 'destroy']);
	});
});
