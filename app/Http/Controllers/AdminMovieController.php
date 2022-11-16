<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreMovieRequest;
use App\Models\Movie;
use Illuminate\Support\Facades\Auth;

class AdminMovieController extends Controller
{
	public function index()
	{
		return view('admin.movies.index', [
			'movies' => Auth::user()->movies->reverse(),
		]);
	}

	public function show(Movie $movie)
	{
		return view('admin.quotes.index', [
			'movie' => $movie,
		]);
	}

	public function store(StoreMovieRequest $request)
	{
		$attributes = $request->validated();
		$attributes['user_id'] = auth()->id();
		$attributes['slug'] = preg_replace('~[^\pL\d]+~u', '-', $attributes['title']);

		Movie::create($attributes);
		return redirect(route('admin.movies'));
	}

	public function edit(Movie $movie)
	{
		return view('admin.movies.edit', [
			'movie' => $movie,
		]);
	}

	public function update(StoreMovieRequest $request, Movie $movie)
	{
		$attributes = $request->validated();
		$movie->update($attributes);
		return back()->with('success', 'movie updated');
	}

	public function destroy(Movie $movie)
	{
		$movie->delete();
		return back()->with('success', 'movie deleted');
	}
}