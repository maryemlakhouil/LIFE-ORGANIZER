<?php

namespace App\Services;

use App\Models\User;
use App\Repositories\Contracts\AdminUserRepositoryInterface;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class AdminUserService
{
    public function __construct(
        protected AdminUserRepositoryInterface $adminUserRepository
    ) {}

    public function getUsers(User $authUser, array $filters = [], int $perPage = 15): LengthAwarePaginator
    {
        $this->assertAdmin($authUser);

        return $this->adminUserRepository->getAll($filters, $perPage);
    }

    public function showUser(User $authUser, int $userId): User
    {
        $this->assertAdmin($authUser);

        $user = $this->adminUserRepository->findById($userId);

        if (! $user) {
            throw new ModelNotFoundException('Utilisateur introuvable.');
        }

        return $user;
    }

    public function updateStatus(User $authUser, int $userId, bool $isActive): User
    {
        $this->assertAdmin($authUser);

        $user = $this->adminUserRepository->findById($userId);

        if (! $user) {
            throw new ModelNotFoundException('Utilisateur introuvable.');
        }

        if ((int) $authUser->id === (int) $user->id && $isActive === false) {
            throw new AuthorizationException('Vous ne pouvez pas désactiver votre propre compte.');
        }

        $this->adminUserRepository->update($user, [
            'is_active' => $isActive,
        ]);

        return $user->fresh();
    }

    public function updateRole(User $authUser, int $userId, string $role): User
    {
        $this->assertAdmin($authUser);

        $user = $this->adminUserRepository->findById($userId);

        if (! $user) {
            throw new ModelNotFoundException('Utilisateur introuvable.');
        }

        if ((int) $authUser->id === (int) $user->id && $role !== 'admin') {
            throw new AuthorizationException('Vous ne pouvez pas retirer votre propre rôle admin.');
        }

        $this->adminUserRepository->update($user, [
            'role' => $role,
        ]);

        return $user->fresh();
    }

    public function deleteUser(User $authUser, int $userId): void
    {
        $this->assertAdmin($authUser);

        $user = $this->adminUserRepository->findById($userId);

        if (! $user) {
            throw new ModelNotFoundException('Utilisateur introuvable.');
        }

        if ((int) $authUser->id === (int) $user->id) {
            throw new AuthorizationException('Vous ne pouvez pas supprimer votre propre compte.');
        }

        $this->adminUserRepository->delete($user);
    }

    protected function assertAdmin(User $user): void
    {
        if ($user->role !== 'admin') {
            throw new AuthorizationException('Accès réservé à l’administrateur.');
        }
    }
}