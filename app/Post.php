<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/*
| the fillable property ensures that the only
| forms that can update this table from a request
| are the ones you specifcy, this prevents
| the user from maliciously inputing form data that you
| did not intend or from altering the forms query string output
|
| for other more advanced ways to set the security of your models
| during form input check
|   https://laracasts.com/series/laravel-from-scratch-2017/episodes/11?autoplay=true
|   around ~ 18 mins. Talks about guarded property and extending a custom model class
*/

class Post extends Model
{
    protected $fillable = [
        'title',
        'body',
        'author'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

     /*
    | This creates a one to many relationship between
    | posts and comments eloquent does this automatically
    | by assuming that the primary key on posts links
    | to a foreign key posts_id on comments this can be changed however.
    | also Comment::class is just a method for retrieving the full class path
    | so eloquent knows where to look
    | https://laravel.com/docs/5.6/eloquent-relationships
    |
    | comments is now a dynamic property:
    |   Dynamic properties allow you to access relationship methods
    |   as if they were properties defined on the model
    */
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
}
