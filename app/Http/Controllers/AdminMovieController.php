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
		$movie = new Movie();
		$movie->setTranslations('title', $request->input('title'));
		$movie['user_id'] = auth()->id();
		$movie['slug'] = preg_replace('~[^\pL\d]+~u', '-', $movie['title']);
		$movie->save();
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
		$movie->setTranslations('title', $request->input('title'));
		$movie['user_id'] = auth()->id();
		$movie['slug'] = preg_replace('~[^\pL\d]+~u', '-', $movie['title']);
		$movie->update();
		return redirect(route('admin.movies'))->with('success', __('main.movie_title_updated'));
	}

	public function destroy(Movie $movie)
	{
		$movie->delete();
		return back()->with('success', __('main.movie_deleted'));
	}
}
