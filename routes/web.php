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
| DB:: is laravels query builder class
| lastest() for example queries the db to return by the newest posted
| find() returns a row matching the specifc parameter.
| Any data returned from the querybuilder directly inside a route path
| will return json data (good for api endpoints).
|
| We can aslo use Eloquent models to query the database in a powerful fashion
| we do this by creating a model of our specific data with php artisan make:model
| the name must match with the table in our db ???
|
| /tasks/{id} -is known as a wildcard (the name could be anything it is a placeholder)
| it will match anything that comes after /tasks/ to this view
|
*/

Route::get('/', function () {
    // $tasks = DB::table('tasks')->latest()->get(); // no eloquent way
    $tasks = App\Task::all(); // eloquent modal of Task
    return view('tasks/index', compact('tasks'));
});

Route::get('/tasks/{task}', function ($id) {
    $task = App\Task::find($id);
    // tasks.show is the same as tasks/show
    // it directs laravel to look in the tasks
    // directory
    return view('tasks.show', compact('task'));
});
