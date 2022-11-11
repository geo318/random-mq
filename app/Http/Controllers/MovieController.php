<?php

namespace App\Http\Controllers;

use App\Models\Movie;

class MovieController extends Controller
{
	public function index()
	{
		$randomMovie = Movie::all()->random();
		return view('index', [
			'movie' => $randomMovie,
			'quote' => $randomMovie->quotes->random(),
		]);
	}

	public function show(Movie $movie)
	{
		return view('show', [
			'movie' => $movie,
		]);
	}
}
