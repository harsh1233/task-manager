<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\Project;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function index(Request $request)
    {
        $query = Task::with('project');

        if ($request->project_id) {
            $query->where('project_id', $request->project_id);
        }

        if ($request->status) {
            $query->where('status', $request->status);
        }

        if ($request->assigned_to) {
            $query->where('assigned_to', $request->assigned_to);
        }

        $tasks = $query->latest()->get();
        $projects = Project::all();

        return view('tasks.index', compact('tasks', 'projects'));
    }

    public function create()
    {
        $projects = Project::all();
        return view('tasks.create', compact('projects'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'project_id'  => 'required|exists:projects,id',
            'title'       => 'required|string|max:255',
            'description' => 'nullable|string',
            'assigned_to' => 'required|string|max:255',
            'status'      => 'required|in:pending,in_progress,completed',
            'due_date'    => 'required|date',
            'attachment'  => 'nullable|file|mimes:jpg,png,pdf|max:2048',
        ]);

        $attachmentPath = null;

        if ($request->hasFile('attachment')) {
            $attachmentPath = $request->file('attachment')
                ->store('attachments', 'public');
        }

        Task::create([
            'project_id'  => $request->project_id,
            'title'       => $request->title,
            'description' => $request->description,
            'assigned_to' => $request->assigned_to,
            'status'      => $request->status,
            'due_date'    => $request->due_date,
            'attachment'  => $attachmentPath,
        ]);

        return redirect()->route('tasks.index')
            ->with('success', 'Task created successfully');
    }

    public function edit(Task $task)
    {
        $projects = Project::all();
        return view('tasks.edit', compact('task', 'projects'));
    }

    public function update(Request $request, Task $task)
    {
        $request->validate([
            'project_id'  => 'required|exists:projects,id',
            'title'       => 'required|string|max:255',
            'description' => 'nullable|string',
            'assigned_to' => 'required|string|max:255',
            'status'      => 'required|in:pending,in_progress,completed',
            'due_date'    => 'required|date',
            'attachment'  => 'nullable|file|mimes:jpg,png,pdf|max:2048',
        ]);

        if ($request->hasFile('attachment')) {
            $task->attachment = $request->file('attachment')
                ->store('attachments', 'public');
        }

        $task->update($request->only([
            'project_id',
            'title',
            'description',
            'assigned_to',
            'status',
            'due_date'
        ]));

        return redirect()->route('tasks.index')
            ->with('success', 'Task updated successfully');
    }

    public function destroy(Task $task)
    {
        $task->delete(); // soft delete

        return redirect()->route('tasks.index')
            ->with('success', 'Task deleted successfully');
    }
}
