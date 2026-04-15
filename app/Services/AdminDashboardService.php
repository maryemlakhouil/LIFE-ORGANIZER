<?php

namespace App\Services;

use App\Models\User;
use App\Repositories\Contracts\AdminDashboardRepositoryInterface;
use Illuminate\Auth\Access\AuthorizationException;

class AdminDashboardService
{
    public function __construct(protected AdminDashboardRepositoryInterface $adminDashboardRepository) {
        
    }

    public function getDashboard(User $authUser): array
    {
        $this->assertAdmin($authUser);

        return $this->adminDashboardRepository->getDashboardStats();
    }

    protected function assertAdmin(User $user): void
    {
        if ($user->role !== 'admin') {
            throw new AuthorizationException('Accès réservé à l’administrateur.');
        }
    }
}