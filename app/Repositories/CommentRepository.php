<?php

namespace App\Repositories;

use App\Models\Comment;
use App\Repositories\Contracts\CommentRepositoryInterface;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class CommentRepository implements CommentRepositoryInterface
{
    public function create(array $data): Comment
    {
        return Comment::create($data);
    }

    public function findById(int $id): ?Comment
    {
        return Comment::find($id);
    }

    public function findByIdWithRelations(int $id): ?Comment
    {
        return Comment::with(['user', 'task'])->find($id);
    }

    public function getByTask(int $taskId, int $perPage = 10): LengthAwarePaginator
    {
        return Comment::with(['user'])
            ->where('task_id', $taskId)
            ->latest()
            ->paginate($perPage);
    }

    public function update(Comment $comment, array $data): bool
    {
        return $comment->update($data);
    }

    public function delete(Comment $comment): bool
    {
        return $comment->delete();
    }
}