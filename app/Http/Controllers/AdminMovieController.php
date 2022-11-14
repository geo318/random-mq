<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use Illuminate\Support\Facades\Auth;

class AdminMovieController extends Controller
{
	public function index()
	{
		return view('admin.movies.index', [
			'movies' => Auth::user()->movies,
		]);
	}
    public function show(Movie $movie)
	{
		return view('admin.quotes.index', [
			'movie' => $movie,
		]);
	}
}
