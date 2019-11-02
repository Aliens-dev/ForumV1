<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Thread extends Model
{
    public function user(){
        return $this->belongsTo('App\User','user_id','id');
    }
    public function forum(){
        return $this->belongsTo('App\Forum','forum_id','id');
    }
    public function replies(){
        return $this->hasMany('App\Reply','thread_id','id');
    }
}
