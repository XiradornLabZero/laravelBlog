<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    // i can sey to laravel how can use the table
    // this used when we don't use the normal convention
    protected $table = 'categories';

    // now i can define the real relationship
    // i can define into the model the relationship
    // using a method
    public function posts() {

        // so because the categorie have many post linked to the same cat
        // i use the method for say to laravel this kind of relation
        return $this->hasMany('App\Post');

    }
}
