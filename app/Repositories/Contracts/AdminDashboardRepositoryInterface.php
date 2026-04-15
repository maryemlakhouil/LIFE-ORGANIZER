<?php

namespace App\Repositories\Contracts;

interface AdminDashboardRepositoryInterface
{
    public function getDashboardStats(): array;
}
