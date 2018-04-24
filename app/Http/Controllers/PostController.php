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
        // gets the newest posts first
        // this is just an abstraction of orderby
        // $posts = Post::orderBy('created_at', 'desc')->get();
        $posts = Post::latest()->get();
        return view('posts.index', compact('posts'));
    }

    public function show(Post $post)
    {
        // this automatically creates
        // a post object populated with Post::find(id) automatically creates
        // a property for any comments whose post_id  foreign key corresponds to its id.
        // if we access $post->comments it will return a collection of all matching posts.
        // However we can then chain queries by calling the $post instances comments() method
        // whic will returned a new instance of the query builder representing their relationship.
        //  "Of course, since all relationships also serve as query builders,
        //    you can add further constraints to which comments are retrieved
        //    by calling the comments method and continuing to chain conditions onto the query:"
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
        // stores data from the create form request
        // redirect the request
        // request() is env helper functioon it
        // automatically matches keys => vals

        // the validate function is a **TRAIT that is
        // pased down from the base controller class
        // it provides easy access to the Validator class
        // and contains baked in localized error handling
        // if validation fails it will redirect back to the
        // current view and create a GLOBAL $errors variable (which is of class MessageBag...)
        // that contains information about the error
        // https://laravel.com/docs/5.1/validation#other-validation-approaches
        // you can also make a form request class to delegate validation away from your controller
    
        $this->validate(request(), [
            'title' => 'required|max:50',
            'body' => 'required',
            'author' => 'required|max:50'
        ]);

        Post::create(request(['title', 'author', 'body']));

        return redirect('/');
    }
}
