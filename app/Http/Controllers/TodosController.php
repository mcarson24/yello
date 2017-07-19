<?php

namespace App\Http\Controllers;

use App\Todo;
use Illuminate\Http\Request;
use Symfony\Component\Console\Exception\RuntimeException;

class TodosController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
        if (request()->wantsJson())
        {
            return [
                0 => Todo::for(auth()->user())->sortedTodos(0)->get(),
                1 => Todo::for(auth()->user())->sortedTodos(1)->get(),
                2 => Todo::for(auth()->user())->sortedTodos(2)->get(),
            ];
        }

    	return view('todos.index');
    }

    public function create()
    {
    	return view('todos.create');
    }

    public function store()
    {
    	$this->validate(request(), [
    		'title' 		=> 'required|min:3',
    		'description' 	=> 'required|min:5'
		]);

        auth()->user()->tasks()->create(request()->only(['title', 'description']));

        return response()->json([], 201);
    }

    public function update(Todo $todo, $status = null)
    {
        if (! is_null($status)) 
        {
            if (!in_array($status, [0, 1, 2]))
            {
                throw new RuntimeException;
            }

            $todo->markAs($status);

            return response()->json([], 200);
        }

        $todo->update(request()->only(['title', 'description']));
    }

    public function destroy(Todo $todo)
    {
        $todo->delete();

        return response()->json([], 200);
    }
}
