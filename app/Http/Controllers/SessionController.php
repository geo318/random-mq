<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Session;

class SessionController extends Controller
{

    public function index(){
        return redirect('/' . Session::get('applocale') ?? config('app.locale'));
    }
    
}
