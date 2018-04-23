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
    php artisan make:model <name> -mc
*/

Route::get('/', 'PostController@index');
Route::get('/post/{post}', "PostController@show");
