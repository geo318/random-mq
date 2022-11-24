<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class SetLanguage
{
	/**
	 * Handle an incoming request.
	 *
	 * @param \Illuminate\Http\Request $request
	 * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
	 *
	 * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
	 */
	public function handle(Request $request, Closure $next)
	{
		if (array_key_exists(request()->segment(1), config('languages')))
		{
			App::setLocale($locale = request()->segment(1));
		}
		elseif (Session()->has('applocale') and array_key_exists(Session()->get('applocale'), config('languages')))
		{
			App::setLocale($locale = Session()->get('applocale'));
		}

		Session()->put('applocale', $locale ?? config('app.locale'));

		return $next($request);
	}
}
