<?php

namespace App\Services;

use App\Repositories\Contracts\FileRepositoryContract;

class FileService
{
    public function __construct(private FileRepositoryContract $fileRepository) {}

    /**
     * @param  array<string, mixed>  $data
     */
    public function createFile(array $data): object
    {
        return $this->fileRepository->create($data);
    }

    public function updateFile(int $id, array $data): bool
    {
        return $this->fileRepository->update($id, $data);
    }

    public function deleteFile(int $id): bool
    {
        return $this->fileRepository->delete($id);
    }

    public function paginateFiles(int $perPage = 15)
    {
        return $this->fileRepository->paginate($perPage);
    }
}
