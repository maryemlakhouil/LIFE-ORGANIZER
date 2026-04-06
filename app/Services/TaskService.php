<?php

namespace App\Services;

use App\Models\Child;
use App\Models\Task;
use App\Models\User;
use App\Repositories\Contracts\TaskRepositoryInterface;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class TaskService
{
    public function __construct(
        protected TaskRepositoryInterface $taskRepository
    ) {}

    public function getAuthenticatedUserTasks(User $user, int $perPage = 10): LengthAwarePaginator
    {
        return match ($user->role) {
            'parent' => $this->taskRepository->getForParent($user->id, $perPage),
            'nounou' => $this->taskRepository->getForNanny($user->id, $perPage),
            'admin'  => Task::with(['child', 'creator', 'nanny'])->latest()->paginate($perPage),
            default  => throw new AuthorizationException('Rôle non autorisé.')
        };
    }

    public function createTask(User $user, array $data): Task
    {
        if ($user->role !== 'parent') {
            throw new AuthorizationException('Seul un parent peut créer une tâche.');
        }

        if (!empty($data['child_id'])) {
            Child::findOrFail($data['child_id']);
        }

        if (!empty($data['assigned_to'])) {
            $nanny = User::findOrFail($data['assigned_to']);

            if ($nanny->role !== 'nounou') {
                throw new AuthorizationException('La tâche doit être affectée à une nounou.');
            }

            if (!$nanny->is_active) {
                throw new AuthorizationException('La nounou sélectionnée est désactivée.');
            }
        }

        $task = $this->taskRepository->create([
            'child_id'     => $data['child_id'] ?? null,
            'created_by'   => $user->id,
            'assigned_to'  => $data['assigned_to'] ?? null,
            'title'        => $data['title'],
            'description'  => $data['description'] ?? null,
            'priority'     => $data['priority'] ?? 'medium',
            'due_date'     => $data['due_date'] ?? null,
            'status'       => $data['status'] ?? 'pending',
        ]);

        return $this->taskRepository->findByIdWithRelations($task->id);
    }

    public function showTask(User $user, int $taskId): Task
    {
        $task = $this->taskRepository->findByIdWithRelations($taskId);

        if (!$task) {
            throw new ModelNotFoundException('Tâche introuvable.');
        }

        $this->authorizeTaskAccess($user, $task);

        return $task;
    }

    public function updateTask(User $user, int $taskId, array $data): Task
    {
        $task = $this->taskRepository->findById($taskId);

        if (!$task) {
            throw new ModelNotFoundException('Tâche introuvable.');
        }

        if ($user->role !== 'parent' || $task->created_by !== $user->id) {
            throw new AuthorizationException('Seul le parent créateur peut modifier cette tâche.');
        }

        if (!empty($data['child_id'])) {
            Child::findOrFail($data['child_id']);
        }

        if (!empty($data['assigned_to'])) {
            $nanny = User::findOrFail($data['assigned_to']);

            if ($nanny->role !== 'nounou') {
                throw new AuthorizationException('La tâche doit être affectée à une nounou.');
            }

            if (!$nanny->is_active) {
                throw new AuthorizationException('La nounou sélectionnée est désactivée.');
            }
        }

        $this->taskRepository->update($task, $data);

        return $this->taskRepository->findByIdWithRelations($task->id);
    }

    public function deleteTask(User $user, int $taskId): void
    {
        $task = $this->taskRepository->findById($taskId);

        if (!$task) {
            throw new ModelNotFoundException('Tâche introuvable.');
        }

        if ($user->role !== 'parent' || $task->created_by !== $user->id) {
            throw new AuthorizationException('Seul le parent créateur peut supprimer cette tâche.');
        }

        $this->taskRepository->delete($task);
    }

    public function changeStatus(User $user, int $taskId, string $status): Task
    {
        $allowedStatuses = ['pending', 'in_progress', 'completed', 'cancelled'];

        if (!in_array($status, $allowedStatuses, true)) {
            throw new AuthorizationException('Statut invalide.');
        }

        $task = $this->taskRepository->findById($taskId);

        if (!$task) {
            throw new ModelNotFoundException('Tâche introuvable.');
        }

        $canChange =
            ($user->role === 'nounou' && $task->assigned_to === $user->id) ||
            ($user->role === 'parent' && $task->created_by === $user->id) ||
            ($user->role === 'admin');

        if (!$canChange) {
            throw new AuthorizationException('Vous ne pouvez pas changer le statut de cette tâche.');
        }

        $this->taskRepository->update($task, ['status' => $status]);

        return $this->taskRepository->findByIdWithRelations($task->id);
    }

    protected function authorizeTaskAccess(User $user, Task $task): void
    {
        $canAccess =
            $user->role === 'admin' ||
            ($user->role === 'parent' && $task->created_by === $user->id) ||
            ($user->role === 'nounou' && $task->assigned_to === $user->id);

        if (!$canAccess) {
            throw new AuthorizationException('Accès non autorisé à cette tâche.');
        }
    }
}