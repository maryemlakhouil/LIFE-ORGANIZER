<?php

namespace App\Repositories\Contracts;

use App\Models\User;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

interface AdminUserRepositoryInterface
{
    public function getAll(array $filters = [], int $perPage = 15): LengthAwarePaginator;

    public function findById(int $id): ?User;

    public function update(User $user, array $data): bool;

    public function delete(User $user): bool;
}