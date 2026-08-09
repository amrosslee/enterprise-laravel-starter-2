<?php

namespace Database\Factories;

use App\Models\Project;
use App\Models\Task;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Task>
 */
class TaskFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $projectId = Project::query()->inRandomOrder()->first()?->id;
        return [
            'project_id' => $projectId,
            'title' => $this->faker->sentence,
            'description' => $this->faker->paragraph,
            'is_complete' => $this->faker->boolean(75),
        ];
    }
}
