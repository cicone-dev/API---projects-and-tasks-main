<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TaskController extends Controller
{

    public function index()
    {
        $tasks = Task::with('project')->get();
        return response()->json($tasks);
    }

    public function store(Request $request)
    {
        $request->validate([
            'project_id' => 'required|exists:projects,id',
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        $task = new Task();
        $task->project_id = $request->project_id;
        $task->title = $request->title;
        $task->description = $request->description;

        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('images', 'public');
            $task->image_url = Storage::url($path);
        }

        $task->save();

        return response()->json($task, 201);
    }

    public function show($id)
    {
        $task = Task::with('project')->findOrFail($id);
        return response()->json($task);
    }


    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        $task = Task::findOrFail($id);
        $task->title = $request->title;
        $task->description = $request->description;


        if ($request->hasFile('image')) {
            if ($task->image_url) {
                Storage::disk('public')->delete(str_replace('/storage/', '', $task->image_url));
            }
            $path = $request->file('image')->store('images', 'public');
            $task->image_url = Storage::url($path);
        }

        $task->save();

        return response()->json($task);
    }

   
    public function destroy($id)
    {
        $task = Task::findOrFail($id);
        
        if ($task->image_url) {
            Storage::disk('public')->delete(str_replace('/storage/', '', $task->image_url));
        }

        $task->delete();

        return response()->json(['message' => 'Task deleted successfully']);
    }
}

