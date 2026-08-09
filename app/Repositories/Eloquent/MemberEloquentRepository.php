<?php

namespace App\Repositories\Eloquent;

use App\Models\Member;
use App\Repositories\Contracts\MemberRepositoryContract;
use Illuminate\Pagination\Paginator;

class MemberEloquentRepository implements MemberRepositoryContract
{
    public function __construct(private Member $member) {}

    public function getAll(): array
    {
        return $this->member->all()->toArray();
    }

    public function paginate(int $perPage = 15): Paginator
    {
        return $this->member->paginate($perPage);
    }

    public function find(int $id): ?object
    {
        return $this->member->find($id);
    }

    public function create(array $data): object
    {
        return $this->member->create($data);
    }

    public function update(int $id, array $data): bool
    {
        return $this->member->find($id)?->update($data) ?? false;
    }

    public function delete(int $id): bool
    {
        return $this->member->find($id)?->delete() ?? false;
    }
}
