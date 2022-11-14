<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminQuoteController extends Controller
{
    public function create()
	{
		return view('admin.quotes.create');
	}

    public function edit()
	{
		return view('admin.quotes.edit');
	}
}
