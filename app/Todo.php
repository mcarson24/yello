<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Todo extends Model
{
	protected $table = 'tasks';

    protected $guarded = [];

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

    public function getFormattedDateAttribute()
    {
    	return $this->created_at->format('g:i A - j M Y');
    }
}
