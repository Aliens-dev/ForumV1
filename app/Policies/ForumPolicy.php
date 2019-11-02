<?php

namespace App\Policies;

use App\Forum;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class ForumPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function add(User $user){
        return $user->is_admin === 1;
    }
    public function delete(User $user) {
        return $user->is_admin === 1;
    }
}
