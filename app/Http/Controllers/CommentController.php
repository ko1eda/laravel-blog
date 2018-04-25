<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

class CommentController extends Controller
{
    public function store(Post $post)
    {
        $this->validate(request(), [
            'body' => 'required|min:5'
        ]);

        // $post is a post object loaded with the data from the
        // query Post::find(id) we then call its comments()
        // method which returns an instance of the query builder class
        // whic has link preconstructed between the posts instances id
        // and a comments post_id number when we create a new comment here
        $post->comments()->create([
            'body' => request('body'),
            'user_id' => \Auth::user()->id
        ]);

        return back();
    }
}
