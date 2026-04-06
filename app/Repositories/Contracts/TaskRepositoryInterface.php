<?php

namespace App\Repositories\Contracts;

use App\Models\Task;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

interface TaskRepositoryInterface
{
    public function create(array $data): Task;

    public function findById(int $id): ?Task;

    public function findByIdWithRelations(int $id): ?Task;

    public function getForParent(int $parentId, int $perPage = 10): LengthAwarePaginator;

    public function getForNanny(int $nannyId, int $perPage = 10): LengthAwarePaginator;

    public function update(Task $task, array $data): bool;

    public function delete(Task $task): bool;
}