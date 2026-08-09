<?php

namespace App\Services;

use App\Repositories\Contracts\TaskRepositoryContract;

class TaskService
{
    public function __construct(private TaskRepositoryContract $taskRepository) {}

    /**
     * @param  array<string, mixed>  $data
     */
    public function createTask(array $data): object
    {
        return $this->taskRepository->create($data);
    }

    public function updateTask(int $id, array $data): bool
    {
        return $this->taskRepository->update($id, $data);
    }

    public function deleteTask(int $id): bool
    {
        return $this->taskRepository->delete($id);
    }

    public function paginateTasks(int $perPage = 15)
    {
        return $this->taskRepository->paginate($perPage);
    }
}
