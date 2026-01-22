<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl">Edit Project</h2>
    </x-slot>

    <div class="p-6">
        <form method="POST" action="{{ route('projects.update', $project) }}">
            @csrf
            @method('PUT')

            <input name="name" value="{{ $project->name }}" class="border w-full p-2">

            <textarea name="description" class="border w-full p-2 mt-4">
                {{ $project->description }}
            </textarea>

            <input type="date" name="start_date"
                   value="{{ $project->start_date }}"
                   class="border w-full p-2 mt-4">

            <input type="date" name="end_date"
                   value="{{ $project->end_date }}"
                   class="border w-full p-2 mt-4">

            <button class="mt-4 bg-blue-600 text-white px-4 py-2 rounded">
                Update
            </button>
        </form>
    </div>
</x-app-layout>
