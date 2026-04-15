<?php

namespace App\Repositories\Contracts;

use App\Models\SousTache;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

interface SubTaskRepositoryInterface
{
    public function create(array $data): SousTache;

    public function findById(int $id): ?SousTache;

    public function findByIdWithRelations(int $id): ?SousTache;

    public function getByTask(int $taskId, int $perPage = 10): LengthAwarePaginator;

    public function update(SousTache $subTask, array $data): bool;

    public function delete(SousTache $subTask): bool;
}