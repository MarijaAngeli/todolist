<?php

namespace App\Policies;

use App\User;
use App\Todo;
use Illuminate\Auth\Access\HandlesAuthorization;

class TaskPolicy
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
    public function destroy (User $user, Todo $todo){
        return $user_id === $task->user_id;
    }
}
