<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class RegistrationController extends Controller
{
    public function create()
    {
        //some functionality
        return view('registration.create');
    }

    public function store()
    {
        // password  |confirmed will double check that
        // the password entered matches with the
        // re-entered password from the input which
        // must specifically be labeled as id & name = password__confirmation
        // in the html
        // you can do this with any field you just have to add the
        // id & name to be the name of the field
        // for example name = email_confirmation in the html
        $this->validate(request(), [
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required|confirmed'
        ]);

        $user = User::create([
            'name' => request('name'),
            'email' => request('email'),
            'password' => \Hash::make(request('password'))
        ]);

        \Auth::login($user); // authorize user credentials

        return redirect()->home(); //because we aliased the index route
    }
}
