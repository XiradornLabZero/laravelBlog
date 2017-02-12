<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{

    public function posts() {

        // we use also the many to many relationship
        // return $this->belongsToMany('App\Post', 'name_of_intermidate_table', 'post_id', 'tag_id'); #This formula is used for a not conventional use
        return $this->belongsToMany('App\Post'); #the intermidiate table indicate from conventional use is post_tag

    }
}
