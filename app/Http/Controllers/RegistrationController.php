<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Mail\Welcome;
use App\Http\Requests\RegistrationRequest;

class RegistrationController extends Controller
{
    public function __construct()
    {
        return $this->middleware('guest');
    }

    public function create()
    {
        return view('registration.create');
    }

    public function store(RegistrationRequest $req)
    {
        // RegistrationRequest Form Request class
        // validates the input before it reaches
        // the controller
        // If the input is valid
        // this method is called, if not
        // user is returned to prev page and error logged
        $user = User::create([
            'name' => $req->get('name'),
            'email' => $req->get('email'),
            'password' => \Hash::make($req->get('password'))
        ]);
        
        $req->session()
            ->flash('message', 'Thanks for signing up ' .$user->name);

        \Auth::login($user); // authorize user credentials
        
        \Mail::to($user)->send(new Welcome($user)); //send welcome email to new user

        return redirect()->home(); //because we aliased the index route
    }
}
