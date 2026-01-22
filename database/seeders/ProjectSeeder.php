<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Project;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Project::create([
    'name' => 'Website Development',
    'description' => 'Company website',
    'start_date' => now(),
    'end_date' => now()->addMonth()
]);

    }
}
