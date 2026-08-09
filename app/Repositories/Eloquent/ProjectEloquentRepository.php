<?php

namespace App\Repositories\Eloquent;

use App\Models\Project;
use App\Repositories\Contracts\ProjectRepositoryContract;
use Illuminate\Pagination\lengthAwarePaginator as Paginator;

class ProjectEloquentRepository implements ProjectRepositoryContract
{
    public function __construct(private Project $project) {}

    public function getAll(): array
    {
        return $this->project->load(['tasks', 'files', 'comments'])->all()->toArray();
    }

    public function paginate(int $perPage = 15): Paginator
    {
        return $this->project->paginate($perPage);
    }

    public function find(int $id): ?object
    {
        return $this->project->find($id);
    }

    public function create(array $data): object
    {
        return $this->project->create($data);
    }

    public function update(int $id, array $data): bool
    {
        return $this->project->find($id)?->update($data) ?? false;
    }

    public function delete(int $id): bool
    {
        return $this->project->find($id)?->delete() ?? false;
    }

    public function paginateWithRelationships(int $perPage = 15, array $relationships = []): Paginator
    {
        return $this->project->with($relationships)->paginate($perPage);
    }
}
