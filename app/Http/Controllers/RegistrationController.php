<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Mail\Welcome;
use App\Http\Requests\RegistrationRequest;

class RegistrationController extends Controller
{
    public function create()
    {
        //some functionality
        return view('registration.create');
    }

    public function store(RegistrationRequest $request)
    {
        // RegistrationRequest Form Request class
        // validates the input before it reaches
        // the controller
        // If the input is valid
        // this method is called, if not
        // user is returned to prev page and error logged
        $user = User::create([
            'name' => request('name'),
            'email' => request('email'),
            'password' => \Hash::make(request('password'))
        ]);

        \Auth::login($user); // authorize user credentials

        \Mail::to($user)->send(new Welcome($user)); //send welcome email to new user

        return redirect()->home(); //because we aliased the index route
    }
}
