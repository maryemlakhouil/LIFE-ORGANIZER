<?php

namespace App\Repositories;

use App\Models\Family;
use App\Repositories\Contracts\FamilyRepositoryInterface;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class FamilyRepository implements FamilyRepositoryInterface
{
    public function create(array $data): Family
    {
        return Family::create($data);
    }

    public function findById(int $id): ?Family
    {
        return Family::find($id);
    }

    public function findByIdWithRelations(int $id): ?Family
    {
        return Family::with(['creator', 'users', 'children'])->find($id);
    }

    public function getForUser(int $userId, int $perPage = 10): LengthAwarePaginator
    {
        return Family::with(['creator', 'users', 'children'])
            ->whereHas('users', function ($query) use ($userId) {
                $query->where('users.id', $userId);
            })
            ->latest()
            ->paginate($perPage);
    }

    public function getAll(int $perPage = 10): LengthAwarePaginator
    {
        return Family::with(['creator', 'users', 'children'])
            ->latest()
            ->paginate($perPage);
    }

    public function update(Family $family, array $data): bool
    {
        return $family->update($data);
    }

    public function delete(Family $family): bool
    {
        return $family->delete();
    }

    public function attachUser(Family $family, int $userId): void
    {
        $family->users()->syncWithoutDetaching([$userId]);
    }

    public function detachUser(Family $family, int $userId): void
    {
        $family->users()->detach($userId);
    }
}