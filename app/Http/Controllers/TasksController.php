<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Task;

class TasksController extends Controller
{
    public function index()
    {
        $tasks = Task::all();
        return view('tasks.index', compact('tasks'));
    }
    public function show(Task $task)
    {
        // by using route model binding laravel knows
        // to specifically create a new Task instance
        // containing the find(id) data for the particular id
        // and inject it into the method instead of
        // $task = Task::find($id);
        return view('tasks.show', compact('task'));
    }
}
