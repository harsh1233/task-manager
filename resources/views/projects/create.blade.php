<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl">Create Project</h2>
    </x-slot>

    <div class="p-6">
        <form method="POST" action="{{ route('projects.store') }}">
            @csrf

            <div>
                <label>Name</label>
                <input name="name" class="border w-full p-2" required>
            </div>

            <div class="mt-4">
                <label>Description</label>
                <textarea name="description" class="border w-full p-2"></textarea>
            </div>

            <div class="mt-4">
                <label>Start Date</label>
                <input type="date" name="start_date" class="border w-full p-2" required>
            </div>

            <div class="mt-4">
                <label>End Date</label>
                <input type="date" name="end_date" class="border w-full p-2">
            </div>

            <button class="mt-4 bg-green-600 text-white px-4 py-2 rounded">
                Save
            </button>
        </form>
    </div>
</x-app-layout>
