<?php

namespace App\Repositories\Contracts;

use App\Models\Child;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

interface ChildRepositoryInterface
{
    public function create(array $data): Child;

    public function findById(int $id): ?Child;

    public function findByIdWithRelations(int $id): ?Child;

    public function getByFamily(int $familyId, int $perPage = 10): LengthAwarePaginator;

    public function update(Child $child, array $data): bool;

    public function delete(Child $child): bool;
}