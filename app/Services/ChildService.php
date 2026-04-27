<?php

namespace App\Services;

use App\Models\Child;
use App\Models\Family;
use App\Models\User;
use App\Repositories\Contracts\ChildRepositoryInterface;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class ChildService
{
    public function __construct(
        protected ChildRepositoryInterface $childRepository
    ) {}

    public function getFamilyChildren(User $user, int $familyId, int $perPage = 10): LengthAwarePaginator
    {
        $family = Family::with('users')->find($familyId);

        if (! $family) {
            throw new ModelNotFoundException('Famille introuvable.');
        }

        $this->authorizeFamilyAccess($user, $family);

        return $this->childRepository->getByFamily($familyId, $perPage);
    }

    public function createChild(User $user, array $data): Child
    {
        $familyId = $data['family_id'] ?? null;

        if (! $familyId && $user->role === 'parent') {
            $familyId = $user->families()->value('families.id');
        }

        if (! $familyId) {
            throw new ModelNotFoundException('Aucune famille n’est liée à ce compte parent.');
        }

        $family = Family::with('users')->find($familyId);

        if (! $family) {
            throw new ModelNotFoundException('Famille introuvable.');
        }

        $this->authorizeFamilyManagement($user, $family);

        $child = $this->childRepository->create([
            'family_id' => $familyId,
            'name' => $data['name'],
            'birth_date' => $data['birth_date'] ?? null,
            'notes' => $data['notes'] ?? null,
        ]);

        return $this->childRepository->findByIdWithRelations($child->id);
    }

    public function showChild(User $user, int $childId): Child
    {
        $child = $this->childRepository->findByIdWithRelations($childId);

        if (! $child) {
            throw new ModelNotFoundException('Enfant introuvable.');
        }

        $family = Family::with('users')->find($child->family_id);

        if (! $family) {
            throw new ModelNotFoundException('Famille introuvable.');
        }

        $this->authorizeFamilyAccess($user, $family);

        return $child;
    }

    public function updateChild(User $user, int $childId, array $data): Child
    {
        $child = $this->childRepository->findById($childId);

        if (! $child) {
            throw new ModelNotFoundException('Enfant introuvable.');
        }

        $family = Family::with('users')->find($child->family_id);

        if (! $family) {
            throw new ModelNotFoundException('Famille introuvable.');
        }

        $this->authorizeFamilyManagement($user, $family);

        $this->childRepository->update($child, [
            'name' => $data['name'] ?? $child->name,
            'birth_date' => $data['birth_date'] ?? $child->birth_date,
            'notes' => array_key_exists('notes', $data) ? $data['notes'] : $child->notes,
        ]);

        return $this->childRepository->findByIdWithRelations($child->id);
    }

    public function deleteChild(User $user, int $childId): void
    {
        $child = $this->childRepository->findById($childId);

        if (! $child) {
            throw new ModelNotFoundException('Enfant introuvable.');
        }

        $family = Family::with('users')->find($child->family_id);

        if (! $family) {
            throw new ModelNotFoundException('Famille introuvable.');
        }

        $this->authorizeFamilyManagement($user, $family);

        $this->childRepository->delete($child);
    }

    protected function authorizeFamilyAccess(User $user, Family $family): void
    {
        $isMember = $family->users->contains('id', $user->id);

        if ($user->role === 'admin' || $isMember) {
            return;
        }

        throw new AuthorizationException('Accès non autorisé à cette famille.');
    }

    protected function authorizeFamilyManagement(User $user, Family $family): void
    {
        $isParentMember = $family->users
            ->where('role', 'parent')
            ->contains('id', $user->id);

        if ($user->role === 'admin' || $isParentMember) {
            return;
        }

        throw new AuthorizationException('Vous ne pouvez pas gérer les enfants de cette famille.');
    }
}
