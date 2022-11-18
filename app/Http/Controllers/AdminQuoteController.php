<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreQuoteRequest;
use App\Models\Movie;
use App\Models\Quote;

class AdminQuoteController extends Controller
{
	public function store(StoreQuoteRequest $request)
	{
		$attributes = $request->validated();
		$attributes['user_id'] = auth()->id();
		$attributes['movie_id'] = request('movie');
		$attributes['thumbnail'] = request()->file('thumbnail')->store('thumbnails');
		Quote::create($attributes);
		return redirect(route('admin.quotes', [app()->getLocale(), Movie::find(request('movie'))->slug]))->with('success', __('New quote added!'));
	}

	public function destroy($arg, $movie, Quote $quote)
	{
		$quote->delete();
		return back()->with('success', __('Quote deleted'));
	}

	public function update($arg, StoreQuoteRequest $request, $movie, Quote $quote)
	{
		$attributes = $request->validated();
		
		if (isset($attributes['thumbnail']))
		{
			$attributes['thumbnail'] = request()->file('thumbnail')->store('thumbnails');
		}
		$quote->update($attributes);
		return redirect(route('admin.quotes', [app()->getLocale(), Movie::find(request('movie'))->slug]))->with('success', __('Quote updated'));
	}
}
