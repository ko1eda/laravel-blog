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
|
*/

// when fetching all records in a table we use index
Route::get('/', 'PostController@index');

// when creating a new entry we use create -- this is a get request
// to a form used to create content however this route is NOT USED
// as the endpoint to submit the data, for that we use a POST REQUEST
// to /<table_name>
Route::get('/posts/create', 'PostController@create');

//this is used to add a the info from our create form
// this is convention
Route::post('/posts', 'PostController@store');

// This is the convention used to fetch a single record 
// from the table.
Route::get('/posts/{post}', 'PostController@show');

Route::post('/posts/{post}/comments', 'CommentController@store');

// to edit a post we would use to display the edit form for the post
// Route::get('/<table_name>/{id}/edit', 'PostController@edi\t')

// the we would use to actually make the edit request
// Route::patch('/<table_name>/{id}')
// delete works the same as patch
