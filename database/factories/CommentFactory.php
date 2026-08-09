<?php

namespace Database\Factories;

use App\Models\Comment;
use App\Models\Project;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Comment>
 */
class CommentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $projectId = Project::query()->inRandomOrder()->first()->id;
        $userId = User::query()->inRandomOrder()->first()->id;
        return [
            "project_id"=> $projectId,
            "user_id"=> $userId,
            "content"=> $this->faker->paragraph,
        ];
    }
}
