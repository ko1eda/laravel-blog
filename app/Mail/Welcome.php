<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\User;

class Welcome extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     * Any public variables on the mailer class
     * will be implicitly avaialble to the view
     * I am passing it to be explicit.
     *
     * Also remember to set up a mail service
     * you must adjust the necessary settings in
     * .env and also app.config.mail 
     * -- change your application name in env setting aswell
     *
     * php artisan commands:
     *  + php artisan make:email <name> --markdown="email.welcome"
     *  This makes this class as well as a view with preconstructed email markdown.
     *
     *  + php artisan vendor:publish --tag=laravel-mail
     *  This will make all the css from the markdown template available
     *  in your projects root to edit, you can do this with other vendor 
     *  packages as well. These files are in views directory under vendor
     *  to change the css you must update it at the bottom of
     *  app.config.mail where it says theme to your own css file
     * 
     * @return void
     */
    public $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('email.welcome', ['user'=> $this->user]);
    }
}
