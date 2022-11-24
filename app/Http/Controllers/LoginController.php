<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUserRequest;

class LoginController extends Controller
{
	public function login(StoreUserRequest $request)
	{
		if (auth()->attempt($request->validated()))
		{
			return redirect(route('admin.movies'))->with('success', __('main.logged_in_as_admin'));
		}
		return back()->with('fail', 'main.try_again');
	}

	public function destroy()
	{
		auth()->logout();
		return redirect(route('home'))->with('success', __('main.goodbye'));
	}
}
