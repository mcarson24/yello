<?php

namespace App;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Todo extends Model
{
	protected $table = 'tasks';

    protected $guarded = [];

    public function scopeFor($query, User $user)
    {
        return $query->where('user_id', $user->id);
    }

    public function scopeSortedTodos($query, $status)
    {
        return $query->where('status', $status);
    }

    public function markAs($status)
    {
    	$this->update(['status' => $status]);
    }

    public function isStillTodo()
    {
    	return $this->status === 0;
    }

    public function isBeingDone()
    {
    	return $this->status == 1;
    }

    public function isDone()
    {
    	return $this->status == 2;
    }
}
