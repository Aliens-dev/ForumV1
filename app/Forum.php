<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Forum extends Model
{
    public function threads () {
        return $this->hasMany('App\Thread','forum_id','id');
    }
    public function replies () {
        return $this->hasManyThrough('App\Reply','App\Thread','forum_id','thread_id');
    }
}
