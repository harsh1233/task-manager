<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl">Create Task</h2>
    </x-slot>

    <div class="p-6">
        <form method="POST"
              action="{{ route('tasks.store') }}"
              enctype="multipart/form-data">
            @csrf

            <select name="project_id" class="border w-full p-2" required>
                <option value="">Select Project</option>
                @foreach($projects as $project)
                    <option value="{{ $project->id }}">{{ $project->name }}</option>
                @endforeach
            </select>

            <input name="title"
                   placeholder="Task Title"
                   class="border w-full p-2 mt-4"
                   required>

            <textarea name="description"
                      placeholder="Description"
                      class="border w-full p-2 mt-4"></textarea>

            <input name="assigned_to"
                   placeholder="Assigned Person"
                   class="border w-full p-2 mt-4"
                   required>

            <select name="status" class="border w-full p-2 mt-4" required>
                <option value="pending">Pending</option>
                <option value="in_progress">In Progress</option>
                <option value="completed">Completed</option>
            </select>

            <input type="date"
                   name="due_date"
                   class="border w-full p-2 mt-4"
                   required>

            <input type="file"
                   name="attachment"
                   class="border w-full p-2 mt-4">

            <button class="mt-4 bg-green-600 text-white px-4 py-2 rounded">
                Save Task
            </button>
        </form>
    </div>
</x-app-layout>
