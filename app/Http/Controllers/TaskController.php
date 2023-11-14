<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class TaskController extends Controller
{
    public function index()
    {
        $tasks = Task::latest()->paginate(3);
        return view('index', ['tasks' =>$tasks]);
    }

    public function create() : View
    {
        return view('create');
    }


    public function store(Request $request) : RedirectResponse
    {
        //validating
        $request->validate([
            'title'=>'required',
            'description' => 'required'
        ]);

        //insert into database 
        Task::create($request->all());
        return redirect()->route('tasks.index')->with('success', 'Tarea creada exitosamente');
    }

    public function show(Task $task)
    {
        //
    }

    public function edit($id): View
    {
        $task = Task::find($id);
        return view("edit", ["task" => $task]);
    }

    public function update(Request $request, Task $task) : RedirectResponse
    {
        //validating
        $request->validate([
            'title'=>'required',
            'description' => 'required'
        ]);

        $task->update($request->all());
        return redirect()->route('tasks.index')->with('success', 'Tarea actualizada exitosamente');
    }

    public function destroy(Task $task)
    {
        $task->delete();
        return redirect()->route('tasks.index')->with('success', 'Tarea eliminada exitosamente');
    }
}
