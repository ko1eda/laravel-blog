<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SessionController extends Controller
{
    public function create()
    {
        //some functionality
        return view('session.create');
    }

    public function destroy()
    {
        \Auth::logout();

        return redirect()->home();
    }
}
