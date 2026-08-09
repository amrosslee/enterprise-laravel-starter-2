<?php

namespace App\Services;

use App\Repositories\Contracts\CommentRepositoryContract;

class CommentService
{
    public function __construct(private CommentRepositoryContract $commentRepository) {}

    /**
     * @param  array<string, mixed>  $data
     */
    public function createComment(array $data): object
    {
        return $this->commentRepository->create($data);
    }

    public function updateComment(int $id, array $data): bool
    {
        return $this->commentRepository->update($id, $data);
    }

    public function deleteComment(int $id): bool
    {
        return $this->commentRepository->delete($id);
    }

    public function paginateComments(int $perPage = 15)
    {
        return $this->commentRepository->paginate($perPage);
    }
}
