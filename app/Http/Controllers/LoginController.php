<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUserRequest;

class LoginController extends Controller
{
	public function login(StoreUserRequest $request)
	{
		if (auth()->attempt($request->validated()))
		{
			return redirect(route('admin.movies', app()->getLocale()))->with('success', __('Logged in as Admin'));
		}
		return back()->with('fail', 'try again');
	}

	public function destroy()
	{
		auth()->logout();
		return redirect("/" . app()->getLocale())->with('success', __('Goodbye!'));
	}
}
