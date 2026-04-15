<?php

namespace App\Repositories;

use App\Models\Child;
use App\Repositories\Contracts\ChildRepositoryInterface;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class ChildRepository implements ChildRepositoryInterface
{
    public function create(array $data): Child
    {
        return Child::create($data);
    }

    public function findById(int $id): ?Child
    {
        return Child::find($id);
    }

    public function findByIdWithRelations(int $id): ?Child
    {
        return Child::with(['family', 'tasks'])->find($id);
    }

    public function getByFamily(int $familyId, int $perPage = 10): LengthAwarePaginator
    {
        return Child::with(['family'])
            ->where('family_id', $familyId)
            ->latest()
            ->paginate($perPage);
    }

    public function update(Child $child, array $data): bool
    {
        return $child->update($data);
    }

    public function delete(Child $child): bool
    {
        return $child->delete();
    }
}