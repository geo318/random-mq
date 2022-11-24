<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreQuoteRequest;
use App\Models\Movie;
use App\Models\Quote;

class AdminQuoteController extends Controller
{
	public function store(StoreQuoteRequest $request)
	{
		$quote = new Quote();
		$quote->setTranslations('quote', $request->input('quote'));

		$quote['user_id'] = auth()->id();
		$quote['movie_id'] = request('movie');
		$quote['thumbnail'] = request()->file('thumbnail')->store('thumbnails');
		$quote->save();
		return redirect(route('admin.quotes', [Movie::find(request('movie'))->slug]))->with('success', __('main.new_quote_added'));
	}

	public function destroy($movie, Quote $quote)
	{
		$quote->delete();
		return back()->with('success', __('main.quote_deleted'));
	}

	public function update(StoreQuoteRequest $request, $movie, Quote $quote)
	{
		$quote->setTranslations('quote', $request->input('quote'));
		if (isset($request['thumbnail']))
		{
			$quote['thumbnail'] = request()->file('thumbnail')->store('thumbnails');
		}
		$quote->update();
		return redirect(route('admin.quotes', [Movie::find(request('movie'))->slug]))->with('success', __('main.quote_updated'));
	}

	public function edit()
	{
		return view('admin.quotes.edit', [
			'quote' => Quote::find(request('quote')),
		]);
	}
}
