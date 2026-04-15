<?php

namespace App\Repositories;

use App\Models\SousTache;
use App\Repositories\Contracts\SubTaskRepositoryInterface;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class SubTaskRepository implements SubTaskRepositoryInterface
{
    public function create(array $data): SousTache
    {
        return SousTache::create($data);
    }

    public function findById(int $id): ?SousTache
    {
        return SousTache::find($id);
    }

    public function findByIdWithRelations(int $id): ?SousTache
    {
        return SousTache::with(['task'])->find($id);
    }

    public function getByTask(int $taskId, int $perPage = 10): LengthAwarePaginator
    {
        return SousTache::where('task_id', $taskId)
            ->latest()
            ->paginate($perPage);
    }

    public function update(SousTache $subTask, array $data): bool
    {
        return $subTask->update($data);
    }

    public function delete(SousTache $subTask): bool
    {
        return $subTask->delete();
    }
}