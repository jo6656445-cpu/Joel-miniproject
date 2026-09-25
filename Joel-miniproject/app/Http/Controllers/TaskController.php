<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    // Show all tasks
    public function index()
    {
        $tasks = Task::all();

        return view('tasks.index', compact('tasks'));
    }

    // Show Add Task page
    public function create()
    {
        return view('tasks.create');
    }

    // Save new task
    public function store(Request $request)
    {
        $request->validate([
            'task_name' => 'required',
            'description' => 'nullable',
            'status' => 'required|in:Pending,Completed',
            'due_date' => 'nullable|date',
        ]);

        $task = new Task();

        $task->task_name = $request->task_name;
        $task->description = $request->description;
        $task->status = $request->status;
        $task->due_date = $request->due_date;

        $task->save();

        return redirect('/tasks')
            ->with('success', 'Task added successfully!');
    }

    // Show Edit Task page
    public function edit(Task $task)
{
    return view('tasks.edit', compact('task'));
}
    // Update task
    public function update(Request $request, Task $task)
    {
        $request->validate([
            'task_name' => 'required',
            'description' => 'nullable',
            'status' => 'required|in:Pending,Completed',
            'due_date' => 'nullable|date',
        ]);

        $task->task_name = $request->task_name;
        $task->description = $request->description;
        $task->status = $request->status;
        $task->due_date = $request->due_date;

        $task->save();

        return redirect('/tasks')
            ->with('success', 'Task updated successfully!');
    }

    // Delete task
    public function destroy(Task $task)
{
    $task->delete();

    return redirect('/tasks')
        ->with('success', 'Task deleted successfully!');
}

    // Update task status
    public function updateStatus(Request $request, Task $task)
{
    $request->validate([
        'status' => 'required|in:Pending,Completed',
    ]);

    $task->status = $request->status;
    $task->save();

    return redirect('/tasks')
        ->with('success', 'Task status updated successfully!');
}
}
