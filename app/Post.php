<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
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
        'author',
        'user_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function scopeFilter($query, array $params)
    {
        extract($params);

        if (isset($month)) {
            $query->whereMonth('created_at', Carbon::parse($month)->month);
        }
        if (isset($year)) {
            $query->whereYear('created_at', $year);
        }
        return $query;
    }
}
