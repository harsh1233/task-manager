<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800">
            Tasks
        </h2>
    </x-slot>

    <div class="p-6">

        <!-- Actions -->
        <div class="flex justify-between mb-4">
            <a href="{{ route('tasks.create') }}"
               class="bg-blue-600 text-white px-4 py-2 rounded">
                + Create Task
            </a>

            <a href="{{ route('tasks.export') }}"
               class="bg-green-600 text-white px-4 py-2 rounded">
                Export Excel
            </a>
        </div>

        <!-- Filters -->
        <form method="GET" action="{{ route('tasks.index') }}"
              class="bg-gray-100 p-4 rounded mb-6 flex gap-4">

            <select name="project_id" class="border p-2">
                <option value="">All Projects</option>
                @foreach($projects as $project)
                    <option value="{{ $project->id }}"
                        {{ request('project_id') == $project->id ? 'selected' : '' }}>
                        {{ $project->name }}
                    </option>
                @endforeach
            </select>

            <select name="status" class="border p-2">
                <option value="">All Status</option>
                <option value="pending" {{ request('status')=='pending'?'selected':'' }}>Pending</option>
                <option value="in_progress" {{ request('status')=='in_progress'?'selected':'' }}>In Progress</option>
                <option value="completed" {{ request('status')=='completed'?'selected':'' }}>Completed</option>
            </select>

            <input type="text"
                   name="assigned_to"
                   placeholder="Assigned Person"
                   value="{{ request('assigned_to') }}"
                   class="border p-2">

            <button class="bg-black text-white px-4 py-2 rounded">
                Filter
            </button>
        </form>

        <!-- Task Table -->
        <table class="w-full border">
            <thead class="bg-gray-200">
                <tr>
                    <th class="border p-2">Title</th>
                    <th class="border p-2">Project</th>
                    <th class="border p-2">Assigned To</th>
                    <th class="border p-2">Status</th>
                    <th class="border p-2">Due Date</th>
                    <th class="border p-2">Attachment</th>
                    <th class="border p-2">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($tasks as $task)
                    <tr>
                        <td class="border p-2">{{ $task->title }}</td>
                        <td class="border p-2">{{ $task->project->name }}</td>
                        <td class="border p-2">{{ $task->assigned_to }}</td>
                        <td class="border p-2">{{ ucfirst(str_replace('_',' ', $task->status)) }}</td>
                        <td class="border p-2">{{ $task->due_date }}</td>
                        <td class="border p-2">
                            @if($task->attachment)
                                <a href="{{ asset('storage/'.$task->attachment) }}"
                                   target="_blank"
                                   class="text-blue-600">
                                    View
                                </a>
                            @else
                                —
                            @endif
                        </td>
                        <td class="border p-2">
                            <a href="{{ route('tasks.edit', $task) }}"
                               class="text-blue-600">Edit</a>

                            <form action="{{ route('tasks.destroy', $task) }}"
                                  method="POST"
                                  class="inline">
                                @csrf
                                @method('DELETE')
                                <button class="text-red-600 ml-2"
                                        onclick="return confirm('Delete task?')">
                                    Delete
                                </button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="7" class="text-center p-4">
                            No tasks found
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>

    </div>
</x-app-layout>
