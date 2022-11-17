<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Redirect;

class LanguageController extends Controller
{
    public function switchLanguage($lang)
    {
        $prevLocale = Session::get('applocale');
        if (array_key_exists($lang, Config::get('languages'))) {
            Session::put('applocale', $lang);
        }
        return redirect(str_replace("/{$prevLocale}", "/{$lang}", url()->previous()));
    }
}
