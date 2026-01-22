<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Task;

class TaskSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Task::create([
    'project_id' => 1,
    'title' => 'Design UI',
    'assigned_to' => 'Harsh',
    'status' => 'pending',
    'due_date' => now()->addWeek()
]);
    }
}
