<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\Project;
use App\Models\Task;

// Get all projects
Route::get('/projects', function () {
    return response()->json(Project::all(), 200);
});

// Get all tasks
Route::get('/tasks', function () {
    return response()->json(Task::all(), 200);
});

// Get tasks by project ID
Route::get('/projects/{id}/tasks', function ($id) {
    return response()->json(
        Task::where('project_id', $id)->get(),
        200
    );
});

// Update task status
Route::patch('/tasks/{id}/status', function (Request $request, $id) {
    $request->validate([
        'status' => 'required|in:pending,in_progress,completed'
    ]);

    $task = Task::findOrFail($id);
    $task->update(['status' => $request->status]);

    return response()->json([
        'message' => 'Task status updated successfully',
        'task' => $task
    ], 200);
});
