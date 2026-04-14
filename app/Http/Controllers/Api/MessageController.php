<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Message\StoreMessageRequest;
use App\Http\Requests\Message\UpdateMessageRequest;
use App\Services\MessageService;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\JsonResponse;
use Throwable;

class MessageController extends Controller
{
    public function __construct(
        protected MessageService $messageService
    ) {}

    public function index(int $conversationId): JsonResponse
    {
        try {
            $messages = $this->messageService->getConversationMessages(
                auth('api')->user(),
                $conversationId
            );

            return response()->json([
                'message' => 'Messages récupérés avec succès.',
                'data' => $messages,
            ]);
        } catch (ModelNotFoundException $e) {
            return response()->json(['message' => $e->getMessage()], 404);
        } catch (AuthorizationException $e) {
            return response()->json(['message' => $e->getMessage()], 403);
        }
    }

    public function store(StoreMessageRequest $request): JsonResponse
    {
        try {
            $message = $this->messageService->createMessage(
                auth('api')->user(),
                $request->validated()
            );

            return response()->json([
                'message' => 'Message envoyé avec succès.',
                'data' => $message,
            ], 201);
        } catch (ModelNotFoundException $e) {
            return response()->json(['message' => $e->getMessage()], 404);
        } catch (AuthorizationException $e) {
            return response()->json(['message' => $e->getMessage()], 403);
        } catch (Throwable $e) {
            return response()->json([
                'message' => 'Échec de l’envoi du message.',
            ], 500);
        }
    }

    public function show(int $id): JsonResponse
    {
        try {
            $message = $this->messageService->showMessage(
                auth('api')->user(),
                $id
            );

            return response()->json([
                'message' => 'Message récupéré avec succès.',
                'data' => $message,
            ]);
        } catch (ModelNotFoundException $e) {
            return response()->json(['message' => $e->getMessage()], 404);
        } catch (AuthorizationException $e) {
            return response()->json(['message' => $e->getMessage()], 403);
        }
    }

    public function update(UpdateMessageRequest $request, int $id): JsonResponse
    {
        try {
            $message = $this->messageService->updateMessage(
                auth('api')->user(),
                $id,
                $request->validated()
            );

            return response()->json([
                'message' => 'Message mis à jour avec succès.',
                'data' => $message,
            ]);
        } catch (ModelNotFoundException $e) {
            return response()->json(['message' => $e->getMessage()], 404);
        } catch (AuthorizationException $e) {
            return response()->json(['message' => $e->getMessage()], 403);
        } catch (Throwable $e) {
            return response()->json([
                'message' => 'Échec de la mise à jour du message.',
            ], 500);
        }
    }

    public function destroy(int $id): JsonResponse
    {
        try {
            $message = $this->messageService->deleteMessage(
                auth('api')->user(),
                $id
            );

            return response()->json([
                'message' => 'Message supprimé avec succès.',
                'data' => $message,
            ]);
        } catch (ModelNotFoundException $e) {
            return response()->json(['message' => $e->getMessage()], 404);
        } catch (AuthorizationException $e) {
            return response()->json(['message' => $e->getMessage()], 403);
        }
    }
}