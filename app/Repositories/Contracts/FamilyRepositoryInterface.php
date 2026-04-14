<?php

namespace App\Repositories\Contracts;

use App\Models\Family;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

interface FamilyRepositoryInterface
{
    public function create(array $data): Family;

    public function findById(int $id): ?Family;

    public function findByIdWithRelations(int $id): ?Family;

    public function getForUser(int $userId, int $perPage = 10): LengthAwarePaginator;

    public function getAll(int $perPage = 10): LengthAwarePaginator;

    public function update(Family $family, array $data): bool;

    public function delete(Family $family): bool;

    public function attachUser(Family $family, int $userId): void;

    public function detachUser(Family $family, int $userId): void;
}