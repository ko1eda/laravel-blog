<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

/*
|
| you can use php artisan make:controller -r(esourceful)
| to make a controller prepopulated with all the
| crud methods you would need to interact with the database
|
*/

class PostController extends Controller
{
    
    public function __construct()
    {
        // if no auth user redirect all routes to loign page
        // https://laravel.com/docs/5.6/authentication
        $this->middleware('auth');
    }

    public function index()
    {
        $posts = Post::latest()
            ->filter(request(['month', 'year']))
            ->get();


        return view('posts.index', compact('posts'));
    }

    public function show(Post $post)
    {
        $comments = $post->comments()->latest()->get();
        return view('posts.show', compact('post', 'comments'));
    }

    public function create()
    {
        // loads the create form
        return view('posts.create');
    }

    public function store()
    {
        // the validate function is a **TRAIT that is
        // pased down from the base controller class
        // https://laravel.com/docs/5.1/validation#other-validation-approaches
        
        $this->validate(request(), [
            'title' => 'required|max:50',
            'body' => 'required',
            'author' => 'required|max:50'
        ]);

        Post::create([
            'title' => request('title'),
            'body' => request('body'),
            'author' => request('author'),
            'user_id' => \Auth::user()->id
        ]);

        return redirect()->home();
    }
}
