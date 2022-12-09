<?php

namespace App\Http\Controllers;

use App\Http\Requests\TodoRequest;
use App\Models\Todo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TodoController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $todos = Todo::query()->latest()->get();
        return view('todos.index', compact('user', 'todos'));
    }

    public function create()
    {
        return view('todos.create');
    }

    public function store(TodoRequest $request)
    {
        Todo::query()->create([
            'user_id' => $request->user_id,
            'title' => $request->title,
            'description' => $request->description,
        ]);

        return redirect()->route('todo.index');
    }

    public function edit(Todo $todo)
    {
        return view('todos.edit', compact('todo'));
    }


    public function update(TodoRequest $request, Todo $todo)
    {
        $todo->update([
            'title' => $request->title,
            'description' => $request->description,
        ]);

        return redirect()->route('todo.index');
    }

    public function destroy(Todo $todo)
    {
        $todo->delete();
        return back();
    }

    public function changeStatus(Todo $todo)
    {
        if ($todo->is_complete) {
            $todo->is_complete = Todo::STATUS_NOT_COMPLETED;
        } else {
            $todo->is_complete = Todo::STATUS_COMPLETED;
        }
        $todo->save();

        return back();

    }
}
