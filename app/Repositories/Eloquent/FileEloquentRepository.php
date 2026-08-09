<?php

namespace App\Repositories\Eloquent;

use App\Models\File;
use App\Repositories\Contracts\FileRepositoryContract;
use Illuminate\Pagination\Paginator;

class FileEloquentRepository implements FileRepositoryContract
{
    public function __construct(private File $file) {}

    public function getAll(): array
    {
        return $this->file->all()->toArray();
    }

    public function paginate(int $perPage = 15): Paginator
    {
        return $this->file->paginate($perPage);
    }

    public function find(int $id): ?object
    {
        return $this->file->find($id);
    }

    public function create(array $data): object
    {
        return $this->file->create($data);
    }

    public function update(int $id, array $data): bool
    {
        return $this->file->find($id)?->update($data) ?? false;
    }

    public function delete(int $id): bool
    {
        return $this->file->find($id)?->delete() ?? false;
    }
}
