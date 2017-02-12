<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    // so as the >Category model i havce to say that the post are connected
    // to the category table and any post have a reference to a cat
    public function category() {

        return $this->belongsTo('App\Category');

    }

    // mistake. I have put those lines of code into wrong model
    public function tags() {

        // now we use the many to many relationship in this way
        return $this->belongsToMany('App\Tag');

    }
}
