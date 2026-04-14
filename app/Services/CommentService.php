<?php

namespace App\Services;

use App\Models\Comment;
use App\Models\Task;
use App\Models\User;
use App\Repositories\Contracts\CommentRepositoryInterface;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class CommentService
{
    public function __construct(
        protected CommentRepositoryInterface $commentRepository
    ) {}

    public function getTaskComments(User $user, int $taskId, int $perPage = 10): LengthAwarePaginator
    {
        $task = Task::find($taskId);

        if (! $task) {
            throw new ModelNotFoundException('Tâche introuvable.');
        }

        $this->authorizeTaskAccess($user, $task);

        return $this->commentRepository->getByTask($taskId, $perPage);
    }

    public function createComment(User $user, array $data): Comment
    {
        $task = Task::find($data['task_id']);

        if (! $task) {
            throw new ModelNotFoundException('Tâche introuvable.');
        }

        $this->authorizeTaskAccess($user, $task);

        $comment = $this->commentRepository->create([
            'task_id' => $task->id,
            'user_id' => $user->id,
            'content' => $data['content'],
        ]);

        return $this->commentRepository->findByIdWithRelations($comment->id);
    }

    public function showComment(User $user, int $commentId): Comment
    {
        $comment = $this->commentRepository->findByIdWithRelations($commentId);

        if (! $comment) {
            throw new ModelNotFoundException('Commentaire introuvable.');
        }

        $task = Task::find($comment->task_id);

        if (! $task) {
            throw new ModelNotFoundException('Tâche introuvable.');
        }

        $this->authorizeTaskAccess($user, $task);

        return $comment;
    }

    public function updateComment(User $user, int $commentId, array $data): Comment
    {
        $comment = $this->commentRepository->findById($commentId);

        if (! $comment) {
            throw new ModelNotFoundException('Commentaire introuvable.');
        }

        if (! $this->canManageComment($user, $comment)) {
            throw new AuthorizationException('Vous ne pouvez pas modifier ce commentaire.');
        }

        $this->commentRepository->update($comment, [
            'content' => $data['content'],
        ]);

        return $this->commentRepository->findByIdWithRelations($comment->id);
    }

    public function deleteComment(User $user, int $commentId): void
    {
        $comment = $this->commentRepository->findById($commentId);

        if (! $comment) {
            throw new ModelNotFoundException('Commentaire introuvable.');
        }

        if (! $this->canManageComment($user, $comment)) {
            throw new AuthorizationException('Vous ne pouvez pas supprimer ce commentaire.');
        }

        $this->commentRepository->delete($comment);
    }

    protected function authorizeTaskAccess(User $user, Task $task): void
    {
        $canAccess =
            $user->role === 'admin' ||
            ($user->role === 'parent' && (int) $task->created_by === (int) $user->id) ||
            ($user->role === 'nounou' && (int) $task->assigned_to === (int) $user->id);

        if (! $canAccess) {
            throw new AuthorizationException('Accès non autorisé à cette tâche.');
        }
    }

    protected function canManageComment(User $user, Comment $comment): bool
    {
        if ($user->role === 'admin') {
            return true;
        }

        return (int) $comment->user_id === (int) $user->id;
    }
}