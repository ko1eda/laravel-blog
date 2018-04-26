<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
|
| /posts/{posts} -is known as a wildcard (the name could be anything it is a placeholder)
| it will match anything that comes after /tasks/ to this view
|
| When defining a piece of data for our application we need 3 things:
|   controller => aka PostsController communicates with the model, updates the views
|   EloquentModel => Post this models the posts table in our db and communicates with it
|   migration => create_posts_table this creates the table with the proper schema
|   you can create all of these at once with
|   php artisan make:model <name> -mc
|
| For routing you generally want to use the same end points to handle multiple jobs
| see examples comments below:
| you generally want to change the functionality of a route based on the SENT REQUEST
| create routes load form pages for posting data then post that data to the end-point responsible for fetching it
|
*/

// when fetching all records in a table we use index
// posts routes (index renamed as home)
Route::get('/', ['as' => 'home', 'uses'=>'PostController@index']);

Route::get('/posts/create', 'PostController@create');

Route::get('/posts/{post}', 'PostController@show'); // has to be the last get route or it will block the others

Route::post('/posts', 'PostController@store'); //stores posts data from create form

Route::post('/posts/{post}/comments', 'CommentController@store'); // stores a comment on a post

//authentication routes -- you could also use one AuthController responsible for both tasks
Route::get('/register', 'RegistrationController@create');
Route::post('/register', 'RegistrationController@store');

Route::get('/login', 'SessionController@create')->name('login'); // this must be named for auth middleware to recognize it
Route::post('/login', 'SessionController@store');

Route::get('/logout', 'SessionController@destroy'); // removing somethis is conventionally named destroy
