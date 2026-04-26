<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Notifications\NannyReservationRequestNotification;
use Illuminate\Http\JsonResponse;
use Illuminate\Notifications\DatabaseNotification;

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

    public function reserve(int $id): JsonResponse
    {
        $parent = auth('api')->user();

        if ($parent->role !== 'parent') {
            return response()->json([
                'message' => 'Seul un parent peut envoyer une demande de réservation.',
            ], 403);
        }

        $nanny = User::with('families:id,name')->findOrFail($id);

        if ($nanny->role !== 'nounou') {
            return response()->json([
                'message' => 'Le compte sélectionné n’est pas une nounou.',
            ], 422);
        }

        if (! $nanny->is_active) {
            return response()->json([
                'message' => 'Cette nounou est actuellement inactive.',
            ], 422);
        }

        $alreadySentToday = DatabaseNotification::where('notifiable_id', (string) $nanny->id)
            ->where('type', NannyReservationRequestNotification::class)
            ->whereDate('created_at', today())
            ->where('data->parent_id', $parent->id)
            ->exists();

        if ($alreadySentToday) {
            return response()->json([
                'message' => 'Une demande a déjà été envoyée aujourd’hui à cette nounou.',
            ], 422);
        }

        $familyNames = $parent->families()->pluck('name')->filter()->values()->all();

        $nanny->notify(new NannyReservationRequestNotification($parent, $familyNames));

        return response()->json([
            'message' => 'La demande de réservation a été envoyée à la nounou.',
        ]);
    }
}
