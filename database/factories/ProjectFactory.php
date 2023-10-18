<?php

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Project;


class ProjectFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $startDate = $this->faker->dateTimeBetween('-1 month', '+1 month');
        $dueDate = $this->faker->dateTimeInInterval($startDate, '+3 months');

        return [
            'ProjectName' => $this->faker->sentence(3),
            'Description' => $this->faker->paragraph,
            'UserID' => rand(1, 10), 
            'StartDate' => $startDate,
            'DueDate' => $dueDate,
        ];
    }
}

