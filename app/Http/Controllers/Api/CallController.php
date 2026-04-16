<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Call\SendCallSignalRequest;
use App\Http\Requests\Call\StartCallRequest;
use App\Services\CallService;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\JsonResponse;
use Throwable;

class CallController extends Controller
{
    public function __construct(
        protected CallService $callService
    ) {}

    public function start(StartCallRequest $request, int $conversationId): JsonResponse
    {
        try {
            $call = $this->callService->startCall(
                auth('api')->user(),
                $conversationId,
                $request->validated()
            );

            return response()->json([
                'message' => 'Appel lancé avec succès.',
                'data' => $call,
            ], 201);
        } catch (ModelNotFoundException $e) {
            return response()->json(['message' => $e->getMessage()], 404);
        } catch (AuthorizationException $e) {
            return response()->json(['message' => $e->getMessage()], 403);
        } catch (Throwable $e) {
            return response()->json([
                'message' => 'Échec du démarrage de l’appel.',
            ], 500);
        }
    }

    public function accept(int $conversationId, string $callId): JsonResponse
    {
        try {
            $call = $this->callService->acceptCall(auth('api')->user(), $conversationId, $callId);

            return response()->json([
                'message' => 'Appel accepté avec succès.',
                'data' => $call,
            ]);
        } catch (ModelNotFoundException $e) {
            return response()->json(['message' => $e->getMessage()], 404);
        } catch (AuthorizationException $e) {
            return response()->json(['message' => $e->getMessage()], 403);
        }
    }

    public function reject(int $conversationId, string $callId): JsonResponse
    {
        try {
            $call = $this->callService->rejectCall(auth('api')->user(), $conversationId, $callId);

            return response()->json([
                'message' => 'Appel refusé avec succès.',
                'data' => $call,
            ]);
        } catch (ModelNotFoundException $e) {
            return response()->json(['message' => $e->getMessage()], 404);
        } catch (AuthorizationException $e) {
            return response()->json(['message' => $e->getMessage()], 403);
        }
    }

    public function end(int $conversationId, string $callId): JsonResponse
    {
        try {
            $call = $this->callService->endCall(auth('api')->user(), $conversationId, $callId);

            return response()->json([
                'message' => 'Appel terminé avec succès.',
                'data' => $call,
            ]);
        } catch (ModelNotFoundException $e) {
            return response()->json(['message' => $e->getMessage()], 404);
        } catch (AuthorizationException $e) {
            return response()->json(['message' => $e->getMessage()], 403);
        }
    }

    public function signal(SendCallSignalRequest $request, int $conversationId, string $callId): JsonResponse
    {
        try {
            $signal = $this->callService->sendSignal(
                auth('api')->user(),
                $conversationId,
                $callId,
                $request->validated()
            );

            return response()->json([
                'message' => 'Signal d’appel envoyé avec succès.',
                'data' => $signal,
            ]);
        } catch (ModelNotFoundException $e) {
            return response()->json(['message' => $e->getMessage()], 404);
        } catch (AuthorizationException $e) {
            return response()->json(['message' => $e->getMessage()], 403);
        } catch (Throwable $e) {
            return response()->json([
                'message' => 'Échec de l’envoi du signal d’appel.',
            ], 500);
        }
    }
}
