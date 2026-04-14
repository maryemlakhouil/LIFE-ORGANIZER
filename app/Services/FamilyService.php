<?php

namespace App\Services;

use App\Models\Family;
use App\Models\User;
use App\Repositories\Contracts\FamilyRepositoryInterface;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class FamilyService
{
    public function __construct(
        protected FamilyRepositoryInterface $familyRepository
    ) {}

    public function getAuthenticatedUserFamilies(User $user, int $perPage = 10): LengthAwarePaginator
    {
        if ($user->role === 'admin') {
            return $this->familyRepository->getAll($perPage);
        }

        return $this->familyRepository->getForUser($user->id, $perPage);
    }

    public function createFamily(User $user, array $data): Family
    {
        if (!in_array($user->role, ['parent', 'admin'], true)) {
            throw new AuthorizationException('Seul un parent ou un administrateur peut créer une famille.');
        }

        $family = $this->familyRepository->create([
            'name' => $data['name'],
            'created_by' => $user->id,
        ]);

        $this->familyRepository->attachUser($family, $user->id);

        return $this->familyRepository->findByIdWithRelations($family->id);
    }

    public function showFamily(User $user, int $familyId): Family
    {
        $family = $this->familyRepository->findByIdWithRelations($familyId);

        if (! $family) {
            throw new ModelNotFoundException('Famille introuvable.');
        }

        $this->authorizeAccess($user, $family);

        return $family;
    }

    public function updateFamily(User $user, int $familyId, array $data): Family
    {
        $family = $this->familyRepository->findById($familyId);

        if (! $family) {
            throw new ModelNotFoundException('Famille introuvable.');
        }

        if (! $this->canManage($user, $family)) {
            throw new AuthorizationException('Vous ne pouvez pas modifier cette famille.');
        }

        $this->familyRepository->update($family, [
            'name' => $data['name'] ?? $family->name,
        ]);

        return $this->familyRepository->findByIdWithRelations($family->id);
    }

    public function deleteFamily(User $user, int $familyId): void
    {
        $family = $this->familyRepository->findById($familyId);

        if (! $family) {
            throw new ModelNotFoundException('Famille introuvable.');
        }

        if (! $this->canManage($user, $family)) {
            throw new AuthorizationException('Vous ne pouvez pas supprimer cette famille.');
        }

        $this->familyRepository->delete($family);
    }

    public function addMember(User $user, int $familyId, int $memberId): Family
    {
        $family = $this->familyRepository->findByIdWithRelations($familyId);

        if (! $family) {
            throw new ModelNotFoundException('Famille introuvable.');
        }

        if (! $this->canManage($user, $family)) {
            throw new AuthorizationException('Vous ne pouvez pas gérer les membres de cette famille.');
        }

        $member = User::findOrFail($memberId);

        if (! in_array($member->role, ['parent', 'nounou'], true)) {
            throw new AuthorizationException('Seuls un parent ou une nounou peuvent être ajoutés à une famille.');
        }

        if (! $member->is_active) {
            throw new AuthorizationException('Cet utilisateur est désactivé.');
        }

        $this->familyRepository->attachUser($family, $member->id);

        return $this->familyRepository->findByIdWithRelations($family->id);
    }

    public function removeMember(User $user, int $familyId, int $memberId): Family
    {
        $family = $this->familyRepository->findByIdWithRelations($familyId);

        if (! $family) {
            throw new ModelNotFoundException('Famille introuvable.');
        }

        if (! $this->canManage($user, $family)) {
            throw new AuthorizationException('Vous ne pouvez pas gérer les membres de cette famille.');
        }

        if ((int) $family->created_by === $memberId) {
            throw new AuthorizationException('Le créateur de la famille ne peut pas être retiré.');
        }

        $this->familyRepository->detachUser($family, $memberId);

        return $this->familyRepository->findByIdWithRelations($family->id);
    }

    protected function authorizeAccess(User $user, Family $family): void
    {
        $isMember = $family->users->contains('id', $user->id);

        if ($user->role === 'admin' || $isMember) {
            return;
        }

        throw new AuthorizationException('Accès non autorisé à cette famille.');
    }

    protected function canManage(User $user, Family $family): bool
    {
        return $user->role === 'admin' || (int) $family->created_by === (int) $user->id;
    }
}