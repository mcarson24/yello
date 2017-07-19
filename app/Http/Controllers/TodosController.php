<?php

namespace App\Http\Controllers;

use App\Todo;
use Illuminate\Http\Request;
use Symfony\Component\Console\Exception\RuntimeException;

class TodosController extends Controller
{
    public function index()
    {
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

    	Todo::create(request()->only(['title', 'description']));

        return view('todos.index');
    }

    public function update(Todo $todo, $status)
    {
        if (!in_array($status, [0, 1, 2]))
        {
            throw new RuntimeException;
        }

        $todo->markAs($status);

        return response()->json([], 200);
    }

    public function destroy(Todo $todo)
    {
        $todo->delete();

        return response()->json([], 200);
    }
}
