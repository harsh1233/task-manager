<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl">Edit Task</h2>
    </x-slot>

    <div class="p-6">
        <form method="POST"
              action="{{ route('tasks.update', $task) }}"
              enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <select name="project_id" class="border w-full p-2">
                @foreach($projects as $project)
                    <option value="{{ $project->id }}"
                        {{ $task->project_id == $project->id ? 'selected' : '' }}>
                        {{ $project->name }}
                    </option>
                @endforeach
            </select>

            <input name="title"
                   value="{{ $task->title }}"
                   class="border w-full p-2 mt-4">

            <textarea name="description"
                      class="border w-full p-2 mt-4">{{ $task->description }}</textarea>

            <input name="assigned_to"
                   value="{{ $task->assigned_to }}"
                   class="border w-full p-2 mt-4">

            <select name="status" class="border w-full p-2 mt-4">
                <option value="pending" {{ $task->status=='pending'?'selected':'' }}>Pending</option>
                <option value="in_progress" {{ $task->status=='in_progress'?'selected':'' }}>In Progress</option>
                <option value="completed" {{ $task->status=='completed'?'selected':'' }}>Completed</option>
            </select>

            <input type="date"
                   name="due_date"
                   value="{{ $task->due_date }}"
                   class="border w-full p-2 mt-4">

            <input type="file"
                   name="attachment"
                   class="border w-full p-2 mt-4">

            <button class="mt-4 bg-blue-600 text-white px-4 py-2 rounded">
                Update Task
            </button>
        </form>
    </div>
</x-app-layout>
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl">Edit Task</h2>
    </x-slot>

    <div class="p-6">
        <form method="POST"
              action="{{ route('tasks.update', $task) }}"
              enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <select name="project_id" class="border w-full p-2">
                @foreach($projects as $project)
                    <option value="{{ $project->id }}"
                        {{ $task->project_id == $project->id ? 'selected' : '' }}>
                        {{ $project->name }}
                    </option>
                @endforeach
            </select>

            <input name="title"
                   value="{{ $task->title }}"
                   class="border w-full p-2 mt-4">

            <textarea name="description"
                      class="border w-full p-2 mt-4">{{ $task->description }}</textarea>

            <input name="assigned_to"
                   value="{{ $task->assigned_to }}"
                   class="border w-full p-2 mt-4">

            <select name="status" class="border w-full p-2 mt-4">
                <option value="pending" {{ $task->status=='pending'?'selected':'' }}>Pending</option>
                <option value="in_progress" {{ $task->status=='in_progress'?'selected':'' }}>In Progress</option>
                <option value="completed" {{ $task->status=='completed'?'selected':'' }}>Completed</option>
            </select>

            <input type="date"
                   name="due_date"
                   value="{{ $task->due_date }}"
                   class="border w-full p-2 mt-4">

            <input type="file"
                   name="attachment"
                   class="border w-full p-2 mt-4">

            <button class="mt-4 bg-blue-600 text-white px-4 py-2 rounded">
                Update Task
            </button>
        </form>
    </div>
</x-app-layout>
