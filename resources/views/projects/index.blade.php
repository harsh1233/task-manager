<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800">
            Projects
        </h2>
    </x-slot>

    <div class="p-6">
        <a href="{{ route('projects.create') }}"
           class="bg-blue-500 text-white px-4 py-2 rounded">
            + Create Project
        </a>

        <table class="mt-6 w-full border">
            <thead>
                <tr class="bg-gray-200">
                    <th class="border p-2">Name</th>
                    <th class="border p-2">Start Date</th>
                    <th class="border p-2">End Date</th>
                    <th class="border p-2">Tasks</th>
                    <th class="border p-2">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($projects as $project)
                    <tr>
                        <td class="border p-2">{{ $project->name }}</td>
                        <td class="border p-2">{{ $project->start_date }}</td>
                        <td class="border p-2">{{ $project->end_date }}</td>
                        <td class="border p-2">{{ $project->tasks_count }}</td>
                        <td class="border p-2">
                            <a href="{{ route('projects.edit', $project) }}"
                               class="text-blue-600">Edit</a>

                            <form action="{{ route('projects.destroy', $project) }}"
                                  method="POST"
                                  class="inline">
                                @csrf
                                @method('DELETE')
                                <button class="text-red-600 ml-2"
                                        onclick="return confirm('Delete project?')">
                                    Delete
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</x-app-layout>
