<?php

namespace App\Repositories;

use App\Models\Task;
use App\Repositories\Contracts\TaskRepositoryInterface;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class TaskRepository implements TaskRepositoryInterface
{
    public function create(array $data): Task
    {
        return Task::create($data);
    }

    public function findById(int $id): ?Task
    {
        return Task::find($id);
    }

    public function findByIdWithRelations(int $id): ?Task
    {
        return Task::with(['child', 'creator', 'nanny', 'comments', 'attachments'])
            ->find($id);
    }

    public function getForParent(int $parentId, int $perPage = 10): LengthAwarePaginator
    {
        return Task::with(['child', 'nanny'])
            ->where('created_by', $parentId)
            ->latest()
            ->paginate($perPage);
    }

    public function getForNanny(int $nannyId, int $perPage = 10): LengthAwarePaginator
    {
        return Task::with(['child', 'creator'])
            ->where('assigned_to', $nannyId)
            ->latest()
            ->paginate($perPage);
    }

    public function update(Task $task, array $data): bool
    {
        return $task->update($data);
    }

    public function delete(Task $task): bool
    {
        return $task->delete();
    }
}