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

	public function show($arg, Movie $movie)
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
		return redirect(route('admin.movies', app()->getLocale()));
	}

	public function edit($arg, Movie $movie)
	{
		return view('admin.movies.edit', [
			'movie' => $movie,
		]);
	}

	public function update($arg, StoreMovieRequest $request, Movie $movie)
	{
		$attributes = $request->validated();
		$movie->update($attributes);
		return redirect(route('admin.movies', app()->getLocale()))->with('success', 'movie updated');
	}

	public function destroy($arg, Movie $movie)
	{
		$movie->delete();
		return back()->with('success', 'movie deleted');
	}
}