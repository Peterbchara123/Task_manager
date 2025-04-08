<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\Category; 
use Illuminate\Http\Request;

class TaskController extends Controller{

public function index()
{
    $tasks = Task::where('status', 'pending')->paginate(5); 
    return view('task.index', compact('tasks'));
}
public function create()
{
    $categories = Category::all();
    return view('task.create', compact('categories'));  
}

public function store(Request $request)
{
    $request->validate([
        'title' => 'required',
        'category_id' => 'required|exists:categories,id',
    ]);

    Task::create($request->only('title', 'category_id'));
    return redirect()->route('task.index')->with('success', 'Task added successfully!');  
}

public function edit(Task $task)
{
    $categories = Category::all();
    return view('task.edit', compact('task', 'categories'));  
}

public function update(Request $request, Task $task)
{
    $request->validate([
        'title' => 'required',
        'category_id' => 'required|exists:categories,id',
    ]);

    $task->update($request->only('title', 'category_id'));
    return redirect()->route('task.index')->with('success', 'Task updated successfully!');  
}

public function destroy(Task $task)
{
    $task->delete();
    return redirect()->route('task.index')->with('success', 'Task deleted successfully!');  
}


public function markAsDone(Task $task)
{
    $task->update(['status' => 'completed']);
    return redirect()->route('task.index')->with('success', 'Task marked as done!');
}

public function markAsUndone(Task $task)
{
    $task->update(['status' => 'pending']);
    return redirect()->route('history')->with('success', 'Task moved back to active tasks!');
}

public function history()
{
    $tasks = Task::where('status', 'completed')->get(); 
    return view('task.history', compact('tasks'));
}

}