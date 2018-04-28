<?php

namespace App\Listeners;

use App\Events\CommentPosted;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Mail\Welcome;

class NotifyUsers
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     * this only doesn't work becase
     * mailtrap has a hard limit on the
     * amount of emails that can be delivered
     * per-second for free users, code is solid
     * though wherever you call this event 
     * make sure you eager load the Post::with(comments)->find(1)
     * @param  CommentPosted  $event
     * @return void
     */
    public function handle(CommentPosted $event)
    {
        foreach ($event->post->comments as $comment) {
            \Mail::to($comment->user)
                ->send(new Welcome($comment->user));
        }
    }
}
