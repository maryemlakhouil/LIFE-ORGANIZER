<?php

namespace App\Services;

use App\Models\SousTache;
use App\Models\Task;
use App\Models\User;
use App\Repositories\Contracts\SubTaskRepositoryInterface;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class SubTaskService
{
    public function __construct(
        protected SubTaskRepositoryInterface $subTaskRepository
    ) {}

    public function getTaskSubTasks(User $user, int $taskId, int $perPage = 10): LengthAwarePaginator
    {
        $task = Task::find($taskId);

        if (! $task) {
            throw new ModelNotFoundException('Tâche introuvable.');
        }

        $this->authorizeTaskAccess($user, $task);

        return $this->subTaskRepository->getByTask($taskId, $perPage);
    }

    public function createSubTask(User $user, array $data): SousTache
    {
        $task = Task::find($data['task_id']);

        if (! $task) {
            throw new ModelNotFoundException('Tâche introuvable.');
        }

        $this->authorizeTaskManagement($user, $task);

        $subTask = $this->subTaskRepository->create([
            'task_id' => $task->id,
            'title' => $data['title'],
            'is_completed' => $data['is_completed'] ?? false,
        ]);

        return $this->subTaskRepository->findByIdWithRelations($subTask->id);
    }

    public function showSubTask(User $user, int $subTaskId): SousTache
    {
        $subTask = $this->subTaskRepository->findByIdWithRelations($subTaskId);

        if (! $subTask) {
            throw new ModelNotFoundException('Sous-tâche introuvable.');
        }

        $task = Task::find($subTask->task_id);

        if (! $task) {
            throw new ModelNotFoundException('Tâche introuvable.');
        }

        $this->authorizeTaskAccess($user, $task);

        return $subTask;
    }

    public function updateSubTask(User $user, int $subTaskId, array $data): SousTache
    {
        $subTask = $this->subTaskRepository->findById($subTaskId);

        if (! $subTask) {
            throw new ModelNotFoundException('Sous-tâche introuvable.');
        }

        $task = Task::find($subTask->task_id);

        if (! $task) {
            throw new ModelNotFoundException('Tâche introuvable.');
        }

        $this->authorizeTaskManagement($user, $task);

        $this->subTaskRepository->update($subTask, [
            'title' => $data['title'] ?? $subTask->title,
            'is_completed' => array_key_exists('is_completed', $data)
                ? $data['is_completed']
                : $subTask->is_completed,
        ]);

        return $this->subTaskRepository->findByIdWithRelations($subTask->id);
    }

    public function changeStatus(User $user, int $subTaskId, bool $isCompleted): SousTache
    {
        $subTask = $this->subTaskRepository->findById($subTaskId);

        if (! $subTask) {
            throw new ModelNotFoundException('Sous-tâche introuvable.');
        }

        $task = Task::find($subTask->task_id);

        if (! $task) {
            throw new ModelNotFoundException('Tâche introuvable.');
        }

        $canChange =
            $user->role === 'admin' ||
            ($user->role === 'parent' && (int) $task->created_by === (int) $user->id) ||
            ($user->role === 'nounou' && (int) $task->assigned_to === (int) $user->id);

        if (! $canChange) {
            throw new AuthorizationException('Vous ne pouvez pas modifier le statut de cette sous-tâche.');
        }

        $this->subTaskRepository->update($subTask, [
            'is_completed' => $isCompleted,
        ]);

        return $this->subTaskRepository->findByIdWithRelations($subTask->id);
    }

    public function deleteSubTask(User $user, int $subTaskId): void
    {
        $subTask = $this->subTaskRepository->findById($subTaskId);

        if (! $subTask) {
            throw new ModelNotFoundException('Sous-tâche introuvable.');
        }

        $task = Task::find($subTask->task_id);

        if (! $task) {
            throw new ModelNotFoundException('Tâche introuvable.');
        }

        $this->authorizeTaskManagement($user, $task);

        $this->subTaskRepository->delete($subTask);
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

    protected function authorizeTaskManagement(User $user, Task $task): void
    {
        $canManage =
            $user->role === 'admin' ||
            ($user->role === 'parent' && (int) $task->created_by === (int) $user->id);

        if (! $canManage) {
            throw new AuthorizationException('Vous ne pouvez pas gérer les sous-tâches de cette tâche.');
        }
    }
}