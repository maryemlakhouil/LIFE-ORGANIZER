<?php

namespace App\Services;

use App\Models\User;
use App\Repositories\Contracts\AdminReportRepositoryInterface;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Auth\Access\AuthorizationException;
use Symfony\Component\HttpFoundation\Response;

class AdminReportService
{
    public function __construct(
        protected AdminReportRepositoryInterface $adminReportRepository
    ) {}

    public function exportUsersPdf(User $authUser): Response
    {
        $this->assertAdmin($authUser);

        $data = $this->adminReportRepository->getUsersReportData();

        $pdf = Pdf::loadView('pdf.admin.users-report', [
            'title' => 'Rapport des utilisateurs',
            'generatedAt' => now(),
            'data' => $data,
        ]);

        return $pdf->download('rapport_utilisateurs.pdf');
    }

    public function exportTasksPdf(User $authUser): Response
    {
        $this->assertAdmin($authUser);

        $data = $this->adminReportRepository->getTasksReportData();

        $pdf = Pdf::loadView('pdf.admin.tasks-report', [
            'title' => 'Rapport des tâches',
            'generatedAt' => now(),
            'data' => $data,
        ]);

        return $pdf->download('rapport_taches.pdf');
    }

    protected function assertAdmin(User $user): void
    {
        if ($user->role !== 'admin') {
            throw new AuthorizationException('Accès réservé à l’administrateur.');
        }

    }
}