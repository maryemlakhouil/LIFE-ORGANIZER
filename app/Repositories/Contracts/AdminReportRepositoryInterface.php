<?php

namespace App\Repositories\Contracts;

interface AdminReportRepositoryInterface
{
    public function getUsersReportData(): array;

    public function getTasksReportData(): array;
}