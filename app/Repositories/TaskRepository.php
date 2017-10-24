<?php
namespace App\Repositories;
use App\User;
use App\Todo;

class TaskRepository
{
	public function forUser(User $user){
		return Todo::where('user_id',$user->id)
		->orderBy('created_at','asc')
		->paginate(5);
	}
}