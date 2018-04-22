<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/*
| Task was created with php artisan make:model Task -m
| (which also included) included the migration file for creating the tasks table.
| It is directly connected to the tasks table and provides a number
| of useful methods for querying the tasks table of our database
| these all return an instance of Task if used as a static method:
|   ->find(<id>) finds a specifc record matching the id
|   ->pluck(<column_name>) pulls all data from the table matching the specifies column name
|   ->all() gets all records from the table
|   ->get(optional<column_names>) alternative to all returns specifc records after other params are set
        column names will return specific data from the requested columns this is usually paired w where()
|       ex: ->where('completed',0)->get();
|   ->save() saves a task record to the tasks table
*/

class Task extends Model
{
    // this is one way to define a custom query by wrapping it
    // in a static method
    // public static function incomplete()
    // {
    //     return static::where('completed', 0)->get();
    // }

    // however if you want to chain multiple custom queries
    // you need to use query scopes
    // query scopes make use of Facades
    // to essentially provide a static interface for non static methods
    // when Task is created it is regestered as a Facade
    // meaning that any methods prefixed with scope can be accessed as static
    // behind the scenes laravels service container is matching the static call
    // to the task class, creating an instance and refrencing its instance method using __callstatic magic method
    public function scopeIncomplete($query)
    {
        return $query->where('completed', 0);
    }
    public function scopeComplete($query)
    {
        return $query->where('completed', 1);
    }
}
