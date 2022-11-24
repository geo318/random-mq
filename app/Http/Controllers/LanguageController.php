<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Config;

class LanguageController extends Controller
{
	public function switchLanguage($lang)
	{
		if (array_key_exists($lang, Config::get('languages')))
		{
			Session::put('applocale', $lang);
		}
		return redirect(url()->previous());
	}
}
