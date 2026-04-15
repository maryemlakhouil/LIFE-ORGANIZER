<?php

namespace App\Repositories\Contracts;

use App\Models\Comment;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

interface CommentRepositoryInterface
{
    public function create(array $data): Comment;

    public function findById(int $id): ?Comment;

    public function findByIdWithRelations(int $id): ?Comment;

    public function getByTask(int $taskId, int $perPage = 10): LengthAwarePaginator;

    public function update(Comment $comment, array $data): bool;

    public function delete(Comment $comment): bool;
}