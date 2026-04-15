<?php

namespace App\Http\Controllers\Api\Admin;

use App\Http\Controllers\Controller;
use App\Services\AdminReportService;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AdminReportController extends Controller
{
    public function __construct(
        protected AdminReportService $adminReportService
    ) {}

    public function usersPdf(): Response
    {
        try {
            return $this->adminReportService->exportUsersPdf(auth('api')->user());
        } catch (AuthorizationException $e) {
            return response()->json([
                'message' => $e->getMessage(),
            ], 403);
        }
    }

    public function tasksPdf(): Response
    {
        try {
            return $this->adminReportService->exportTasksPdf(auth('api')->user());
        } catch (AuthorizationException $e) {
            return response()->json([
                'message' => $e->getMessage(),
            ], 403);
        }
    }
}