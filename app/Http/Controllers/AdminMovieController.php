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
		$movie = new Movie();
        $movie->setTranslations('title', $request->input('title'));
		$movie['user_id'] = auth()->id();
		$movie['slug'] = preg_replace('~[^\pL\d]+~u', '-', $movie['title']);
		$movie->save();
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
		$movie->setTranslations('title', $request->input('title'));
		$movie['user_id'] = auth()->id();
		$movie['slug'] = preg_replace('~[^\pL\d]+~u', '-', $movie['title']);
		$movie->update();
		return redirect(route('admin.movies', app()->getLocale()))->with('success', __('Movie title updated'));
	}

	public function destroy($arg, Movie $movie)
	{
		$movie->delete();
		return back()->with('success', __('Movie deleted'));
	}
}