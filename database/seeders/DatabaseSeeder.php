<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Project;
use App\Models\Task;
use Database\Factories\TaskFactory;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        User::factory(10)->create();

        // Use the TaskFactory to create 100 Task instances
        Task::factory(100)->create();
    }
}
