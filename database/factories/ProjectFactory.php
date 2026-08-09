<?php

namespace Database\Factories;

use App\Models\Project;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Project>
 */
class ProjectFactory extends Factory
{
    protected $model = Project::class;

    public function definition(): array
    {
        return [
            'title' => $this->faker->sentence(3),
            'description' => $this->faker->paragraph(),
            'start_date' => $this->faker->date(),
            'deadline' => $this->faker->dateTimeBetween('+1 week', '+1 year')->format('Y-m-d'),
            'status' => $this->faker->boolean(50),
            'owner_id' => User::factory(),
        ];
    }
}
