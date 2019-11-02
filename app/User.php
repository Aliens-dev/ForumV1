<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
class User extends Authenticatable
{
    public function threads () {
        return $this->hasMany('App\Thread','user_id','id');
    }
}
