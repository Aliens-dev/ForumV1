<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reply extends Model
{
    public function user(){
        return $this->belongsTo('App\User','user_id','id');
    }
    public function thread(){
        return $this->belongsTo('App\Thread','thread_id','id');
    }
}
