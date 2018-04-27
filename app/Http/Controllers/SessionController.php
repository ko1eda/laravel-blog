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

    public function store(Request $req)
    {
        // get login info, check to see if it matches database
        // if so redirect to the intended page with welcome message
        // else return to previous page and display and error
        $credentials = $req->only(['email','password']);
        
        if (\Auth::attempt($credentials)) {
            // Authentication passed...
            // session is presistant data between http request
            $req->session()
                ->flash('message', 'Welcome back ' .\Auth::user()->name);

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
