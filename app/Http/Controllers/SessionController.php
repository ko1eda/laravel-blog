<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SessionController extends Controller
{
    public function __construct()
    {
        // middleware prevents authenticated users from accessing
        // any route but logout
        return $this->middleware('guest', ['except'=>'destroy']);
    }

    public function create()
    {
        return view('session.create');
    }

    public function store()
    {
        // get login info, check to see if it matches database
        // if so redirect to the intended page you were trying to access
        // else return to previous page and display and error
        $credentials = request(['email', 'password']);
        
        if (\Auth::attempt($credentials)) {
            // Authentication passed...
            return redirect()->intended('/');
        }
        return back()->withErrors([
            'message' => 'Incorrect Password'
        ]);
    }

    public function destroy()
    {
        \Auth::logout();

        return redirect()->home();
    }
}
