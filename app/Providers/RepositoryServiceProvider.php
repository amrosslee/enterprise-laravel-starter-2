<?php

namespace App\Providers;

use App\Repositories\Contracts\CommentRepositoryContract;
use App\Repositories\Contracts\FileRepositoryContract;
use App\Repositories\Contracts\ProjectRepositoryContract;
use App\Repositories\Contracts\TaskRepositoryContract;
use App\Repositories\Eloquent\CommentEloquentRepository;
use App\Repositories\Eloquent\FileEloquentRepository;
use App\Repositories\Eloquent\ProjectEloquentRepository;
use App\Repositories\Eloquent\TaskEloquentRepository;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->bind(
            ProjectRepositoryContract::class,
            ProjectEloquentRepository::class,
        );

        $this->app->bind(
            TaskRepositoryContract::class,
            TaskEloquentRepository::class,
        );

        $this->app->bind(
            FileRepositoryContract::class,
            FileEloquentRepository::class,
        );

        $this->app->bind(
            CommentRepositoryContract::class,
            CommentEloquentRepository::class,
        );
    }
}
