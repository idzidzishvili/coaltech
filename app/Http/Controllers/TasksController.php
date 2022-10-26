<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;
use App\Http\Requests\TasksRequest;

class TasksController extends Controller
{

    public function index()
    {
        $tasks = Task::orderBy('priority', 'asc')->orderBy('updated_at', 'asc')->get();
		return view('tasks', ['tasks' => $tasks]);
    }


    public function create()
    {
        $task = new Task();
		return view('add', ['resource' => 'tasks', 'task' => $task]);
    }


    public function store(TasksRequest $request)
    {
        Task::create([
            'name' => $request->name,
        ]);
        return redirect()->route('tasks.index');
    }


    public function show($id)
    {
        
    }


    public function edit($id)
    {
        $task = Task::findOrFail($id);
		return view('edit', ['resource' => 'tasks', 'task' => $task, 'id' => $id]);
    }


    public function update(TasksRequest $request, $id)
    {
        Task::findOrFail($id)->update([
            'name' => $request->name
        ]);
        return redirect()->route('tasks.index');
    }


    public function destroy($id)
    {
        Task::findOrFail($id)->delete();
		return redirect()->route('tasks.index');
    }
}
