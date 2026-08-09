<?php

namespace App\Repositories\Eloquent;

use App\Models\Task;
use App\Repositories\Contracts\TaskRepositoryContract;
use Illuminate\Pagination\Paginator;

class TaskEloquentRepository implements TaskRepositoryContract
{
    public function __construct(private Task $task) {}

    public function getAll(): array
    {
        return $this->task->all()->toArray();
    }

    public function paginate(int $perPage = 15): Paginator
    {
        return $this->task->paginate($perPage);
    }

    public function find(int $id): ?object
    {
        return $this->task->find($id);
    }

    public function create(array $data): object
    {
        return $this->task->create($data);
    }

    public function update(int $id, array $data): bool
    {
        return $this->task->find($id)?->update($data) ?? false;
    }

    public function delete(int $id): bool
    {
        return $this->task->find($id)?->delete() ?? false;
    }
}
