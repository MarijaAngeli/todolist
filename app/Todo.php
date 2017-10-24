<?php

namespace App;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Todo extends Model
{
    protected $fillable = ['task'];
    protected $casts = ['user_id' => 'int',
];
public function user(){
	return $this->belongsTo(User::class);
}
}
