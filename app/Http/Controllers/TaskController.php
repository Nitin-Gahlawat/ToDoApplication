<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Task;


class TaskController extends Controller
{
    public function index()
    {
        $tasks = Task::all();
        return view('index', compact('tasks'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|max:255'
        ]);

        Task::create(['title' => $request->title]);

        return redirect('/');
    }

    public function update(Task $task)
    {
        $task->update(['completed' => !$task->completed]);

        return redirect('/');
    }

    public function destroy(Task $task)
    {
        $task->delete();

        return redirect('/');
    }
}
