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
    // the view names by convention
    // should correspond to the
    // method names on the controller
    // aka the controller action
    public function index()
    {
        $posts = Post::all();
        return view('posts.index', compact('posts'));
    }

    public function show(Post $post)
    {
        // this automaticall creates
        // a post object populated with Post::find(id)
        return view('posts.show', compact('post'));
    }

    public function create()
    {
        // loads the create form
        return view('posts.create');
    }

    public function store()
    {
        // stores data from the create form request
        // redirect the request
        // request() automatically matches the array keys
        Post::create(request(['title', 'author', 'body']));
        return redirect('/');
    }
}
