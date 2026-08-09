<?php

namespace App\Repositories\Eloquent;

use App\Models\Comment;
use App\Repositories\Contracts\CommentRepositoryContract;
use Illuminate\Pagination\Paginator;

class CommentEloquentRepository implements CommentRepositoryContract
{
    public function __construct(private Comment $comment) {}

    public function getAll(): array
    {
        return $this->comment->all()->toArray();
    }

    public function paginate(int $perPage = 15): Paginator
    {
        return $this->comment->paginate($perPage);
    }

    public function find(int $id): ?object
    {
        return $this->comment->find($id);
    }

    public function create(array $data): object
    {
        return $this->comment->create($data);
    }

    public function update(int $id, array $data): bool
    {
        return $this->comment->find($id)?->update($data) ?? false;
    }

    public function delete(int $id): bool
    {
        return $this->comment->find($id)?->delete() ?? false;
    }
}
