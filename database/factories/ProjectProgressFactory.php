<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\ProjectProgress;
use App\Models\Task;

class ProjectProgressFactory extends Factory
{
    protected $model = ProjectProgress::class;

    public function definition()
    {
        $startDate = now()->subDays(30); 
        $endDate = now(); 

        $progressDate = $this->faker->dateTimeBetween($startDate, $endDate);

        return [
            'TaskID' => Task::inRandomOrder()->first()->id,
            'ProgressPercentage' => $this->faker->numberBetween(0, 100),
            'ProgressDescription' => $this->faker->paragraph(),
            'ProgressDate' => $progressDate,
        ];
    }
}
