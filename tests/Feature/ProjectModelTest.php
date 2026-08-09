<?php

use App\Models\Project;
use Illuminate\Support\Carbon;

it('casts dates and status correctly', function () {
    $project = new Project([
        'title' => 'Example',
        'description' => 'Example description.',
        'start_date' => '2026-01-01',
        'deadline' => '2026-12-31',
        'status' => 1,
    ]);

    expect($project->start_date)->toBeInstanceOf(Carbon::class)
        ->and($project->deadline)->toBeInstanceOf(Carbon::class)
        ->and($project->status)->toBeBool();
});

it('defines the owner and resource relationships', function () {
    $project = new Project();

    expect($project->owner())->toBeInstanceOf(Illuminate\Database\Eloquent\Relations\BelongsTo::class)
        ->and($project->members())->toBeInstanceOf(Illuminate\Database\Eloquent\Relations\HasMany::class)
        ->and($project->tasks())->toBeInstanceOf(Illuminate\Database\Eloquent\Relations\HasMany::class)
        ->and($project->files())->toBeInstanceOf(Illuminate\Database\Eloquent\Relations\HasMany::class)
        ->and($project->comments())->toBeInstanceOf(Illuminate\Database\Eloquent\Relations\HasMany::class);
});
