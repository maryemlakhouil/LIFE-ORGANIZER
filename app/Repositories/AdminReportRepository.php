<?php

namespace App\Repositories;

use App\Models\Task;
use App\Models\User;
use App\Repositories\Contracts\AdminReportRepositoryInterface;

class AdminReportRepository implements AdminReportRepositoryInterface
{
    public function getUsersReportData(): array
    {
        return [
            'users' => User::orderBy('name')->get(),
            'summary' => [
                'total' => User::count(),
                'active' => User::where('is_active', true)->count(),
                'inactive' => User::where('is_active', false)->count(),
                'parents' => User::where('role', 'parent')->count(),
                'nannies' => User::where('role', 'nounou')->count(),
                'admins' => User::where('role', 'admin')->count(),
            ],
        ];
    }

    public function getTasksReportData(): array
    {
        return [
            'tasks' => Task::with(['child', 'creator', 'nanny'])
                ->latest()
                ->get(),
            'summary' => [
                'total' => Task::count(),
                'pending' => Task::where('status', 'pending')->count(),
                'in_progress' => Task::where('status', 'in_progress')->count(),
                'completed' => Task::where('status', 'completed')->count(),
                'cancelled' => Task::where('status', 'cancelled')->count(),
            ],
        ];
    }
}