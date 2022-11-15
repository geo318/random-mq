<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUserRequest;

class LoginController extends Controller
{
	public function login(StoreUserRequest $request)
	{
		if (auth()->attempt($request->validated()))
		{
			return redirect('/')->with('success', 'Logged in as Admin.');
		}
		return back()->with('fail', 'try again');
	}

	public function destroy()
	{
		auth()->logout();
		return redirect('/')->with('success', 'See ya!');
	}
}
