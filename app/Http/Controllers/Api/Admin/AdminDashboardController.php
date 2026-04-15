<?php

namespace App\Http\Controllers\Api\Admin;

use App\Http\Controllers\Controller;
use App\Services\AdminDashboardService;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Http\JsonResponse;

class AdminDashboardController extends Controller
{
    public function __construct(protected AdminDashboardService $adminDashboardService) {
        
    }

    public function index(): JsonResponse
    {
        try {
            $stats = $this->adminDashboardService->getDashboard(auth('api')->user());

            return response()->json([
                'message' => 'Statistiques du dashboard récupérées avec succès.',
                'data' => $stats,
            ]);
        } catch (AuthorizationException $e) {
            return response()->json([
                'message' => $e->getMessage(),
            ], 403);
        }
    }
}