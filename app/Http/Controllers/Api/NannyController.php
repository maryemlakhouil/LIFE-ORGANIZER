<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\JsonResponse;

class NannyController extends Controller
{
    public function index(): JsonResponse
    {
        $nannies = User::with('families:id,name')
            ->where('role', 'nounou')
            ->latest()
            ->get();

        return response()->json([
            'message' => 'Nounous récupérées avec succès.',
            'data' => $nannies,
        ]);
    }
}
