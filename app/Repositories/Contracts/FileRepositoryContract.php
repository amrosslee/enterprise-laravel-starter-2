<?php

namespace App\Repositories\Contracts;

use Illuminate\Pagination\Paginator;

interface FileRepositoryContract
{
    public function getAll(): array;

    public function paginate(int $perPage = 15): Paginator;

    public function find(int $id): ?object;

    public function create(array $data): object;

    public function update(int $id, array $data): bool;

    public function delete(int $id): bool;
}
