<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegistrationRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     * you would put logic here to check if the user that is currently
     * making a the request this is handling has the proper validation
     * we just return true because only unautharized users 
     * can make this request anyway
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    // password | confirmed will double check that
    // the password entered matches with the
    // re-entered password from the input which
    // must specifically be labeled as id & name = password__confirmation
    // in the html
    // you can do this with any field you just have to add the
    // id & name to be the name of the field
    // for example name = email_confirmation in the html

    public function rules()
    {
        return [
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required|confirmed'
        ];
    }
}
