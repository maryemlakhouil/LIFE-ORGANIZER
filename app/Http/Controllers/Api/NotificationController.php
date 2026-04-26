<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Services\NotificationService;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Throwable;

class NotificationController extends Controller
{
    public function __construct(
        protected NotificationService $notificationService
    ) {}

    public function index(): JsonResponse
    {
        $notifications = $this->notificationService
            ->getAuthenticatedUserNotifications(auth('api')->user());

        return response()->json([
            'message' => 'Notifications récupérées avec succès.',
            'data' => $notifications,
        ]);
    }

    public function show(string $id): JsonResponse
    {
        try {
            $notification = $this->notificationService
                ->showNotification(auth('api')->user(), $id);

            return response()->json([
                'message' => 'Notification récupérée avec succès.',
                'data' => $notification,
            ]);
        } catch (ModelNotFoundException $e) {
            return response()->json(['message' => $e->getMessage()], 404);
        }
    }

    public function markAsRead(string $id): JsonResponse
    {
        try {
            $notification = $this->notificationService
                ->markAsRead(auth('api')->user(), $id);

            return response()->json([
                'message' => 'Notification marquée comme lue.',
                'data' => $notification,
            ]);
        } catch (ModelNotFoundException $e) {
            return response()->json(['message' => $e->getMessage()], 404);
        }
    }

    public function markAllAsRead(): JsonResponse
    {
        $this->notificationService->markAllAsRead(auth('api')->user());

        return response()->json([
            'message' => 'Toutes les notifications ont été marquées comme lues.',
        ]);
    }

    public function destroy(string $id): JsonResponse
    {
        try {
            $this->notificationService->deleteNotification(auth('api')->user(), $id);

            return response()->json([
                'message' => 'Notification supprimée avec succès.',
            ]);
        } catch (ModelNotFoundException $e) {
            return response()->json(['message' => $e->getMessage()], 404);
        }
    }

    public function respondToReservation(Request $request, string $id): JsonResponse
    {
        $validated = $request->validate([
            'status' => 'required|in:accepted,rejected',
        ]);

        try {
            $notification = $this->notificationService
                ->respondToReservation(auth('api')->user(), $id, $validated['status']);

            return response()->json([
                'message' => $validated['status'] === 'accepted'
                    ? 'Demande de reservation acceptee.'
                    : 'Demande de reservation refusee.',
                'data' => $notification,
            ]);
        } catch (ModelNotFoundException $e) {
            return response()->json(['message' => $e->getMessage()], 404);
        }
    }
}
