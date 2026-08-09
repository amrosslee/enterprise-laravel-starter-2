<?php

namespace App\Services;

use App\Repositories\Contracts\ProjectRepositoryContract;

class ProjectService
{
    public function __construct(private ProjectRepositoryContract $projectRepository) {}


    public function getAll(): array
    {
        return $this->projectRepository->getAll();
    }
    /**
     * Create a new project.
     *
     * @param  array<string, mixed>  $data
     */
    public function createProject(array $data): object
    {
        return $this->projectRepository->create($data);
    }

    /**
     * Update an existing project.
     *
     * @param  array<string, mixed>  $data
     */
    public function updateProject(int $id, array $data): bool
    {
        return $this->projectRepository->update($id, $data);
    }

    public function deleteProject(int $id): bool
    {
        return $this->projectRepository->delete($id);
    }

    public function paginateProjects(int $perPage = 15)
    {
        return $this->projectRepository->paginate($perPage);
    }

    public function paginateProjectsWithRelationships(int $perPage = 15, array $relationships = [])
    {
        return $this->projectRepository->paginateWithRelationships($perPage, $relationships);
    }

    public function getCommentsCountForProjects()
    {
        return $this->projectRepository->getCommentsCountForProjects();
    }

    public function getFilesForProjects()
    {
        return $this->projectRepository->getFilesForProjects();
    }


    public function getTasksForProjects()
    {
        return $this->projectRepository->getTasksForProjects();
    }

}
