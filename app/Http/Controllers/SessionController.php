<?php

namespace App\Http\Controllers;

use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Session;

class SessionController extends Controller
{
	public function index()
	{
		return redirect(RouteServiceProvider::HOME . (Session::get('applocale') ?? config('app.locale')));
	}
}
