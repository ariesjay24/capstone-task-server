<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Task;
use App\Models\User;
use App\Models\Project;

class TaskFactory extends Factory
{
    protected $model = Task::class;

    public function definition()
    {
        $date = now();

        // Define the possible status values
        $statusValues = ['Not Started', 'In Progress', 'Completed', ];

        return [
            'TaskName' => $this->faker->sentence(),
            'Description' => $this->faker->paragraph(),
            'Priority' => $this->faker->randomElement([1, 2, 3]),
            'Status' => $this->faker->randomElement($statusValues),
            'StartDate' => $date,
            'DueDate' => $date->addDays($this->faker->numberBetween(1, 30)),
            'ProjectID' => Project::inRandomOrder()->first()->id,
            'UserID' => User::inRandomOrder()->first()->id,
            'Type' => $this->faker->randomElement(['TypeA', 'TypeB', 'TypeC']),
        ];
    }
}
