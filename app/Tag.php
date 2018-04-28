<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    public function posts()
    {
        return $this->belongsToMany(Post::class)->withTimestamps();
    }

    /**
     * This overrides Route Model bindings
     * defualt binding parameter, by default
     * it will search for a record matching
     * an input id, this tells it to match
     * the record based on its name attribute
     * you could put any column name (key) here for
     * example if you wanted to match
     * a record by its email you 
     * would use 'email'.
     */
    public function getRouteKeyName()
    {
        return 'name';
    }
}
