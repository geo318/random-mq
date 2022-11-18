<?php

namespace App\Http\Controllers;

use App\Models\Movie;

class MovieController extends Controller
{
	public function index()
	{
		$randomMovie = count(Movie::all()) > 0 ? Movie::all()->random() : null;
		return view('index', [
			'movie' => $randomMovie ?? null,
			'quote' => $randomMovie != null ? $randomMovie->quotes->random() : null,
		]);
	}

	public function show($arg, Movie $movie)
	{
		return view('show', [
			'movie' => $movie,
		]);
	}
}
