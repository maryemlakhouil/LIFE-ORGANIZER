<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Conversation\ManageConversationParticipantRequest;
use App\Http\Requests\Conversation\StoreConversationRequest;
use App\Http\Requests\Conversation\UpdateConversationRequest;
use App\Services\ConversationService;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\JsonResponse;
use Throwable;

class ConversationController extends Controller
{
    public function __construct(
        protected ConversationService $conversationService
    ) {}

    public function index(): JsonResponse
    {
        $conversations = $this->conversationService
            ->getAuthenticatedUserConversations(auth('api')->user());

        return response()->json([
            'message' => 'Conversations récupérées avec succès.',
            'data' => $conversations,
        ]);
    }

    public function store(StoreConversationRequest $request): JsonResponse
    {
        try {
            $conversation = $this->conversationService
                ->createConversation(auth('api')->user(), $request->validated());

            return response()->json([
                'message' => 'Conversation créée avec succès.',
                'data' => $conversation,
            ], 201);
        } catch (ModelNotFoundException $e) {
            return response()->json(['message' => $e->getMessage()], 404);
        } catch (AuthorizationException $e) {
            return response()->json(['message' => $e->getMessage()], 403);
        } catch (Throwable $e) {
            return response()->json([
                'message' => 'Échec de la création de la conversation.',
            ], 500);
        }
    }

    public function show(int $id): JsonResponse
    {
        try {
            $conversation = $this->conversationService
                ->showConversation(auth('api')->user(), $id);

            return response()->json([
                'message' => 'Conversation récupérée avec succès.',
                'data' => $conversation,
            ]);
        } catch (ModelNotFoundException $e) {
            return response()->json(['message' => $e->getMessage()], 404);
        } catch (AuthorizationException $e) {
            return response()->json(['message' => $e->getMessage()], 403);
        }
    }

    public function update(UpdateConversationRequest $request, int $id): JsonResponse
    {
        try {
            $conversation = $this->conversationService
                ->updateConversation(auth('api')->user(), $id, $request->validated());

            return response()->json([
                'message' => 'Conversation mise à jour avec succès.',
                'data' => $conversation,
            ]);
        } catch (ModelNotFoundException $e) {
            return response()->json(['message' => $e->getMessage()], 404);
        } catch (AuthorizationException $e) {
            return response()->json(['message' => $e->getMessage()], 403);
        } catch (Throwable $e) {
            return response()->json([
                'message' => 'Échec de la mise à jour de la conversation.',
            ], 500);
        }
    }

    public function destroy(int $id): JsonResponse
    {
        try {
            $this->conversationService->deleteConversation(auth('api')->user(), $id);

            return response()->json([
                'message' => 'Conversation supprimée avec succès.',
            ]);
        } catch (ModelNotFoundException $e) {
            return response()->json(['message' => $e->getMessage()], 404);
        } catch (AuthorizationException $e) {
            return response()->json(['message' => $e->getMessage()], 403);
        }
    }

    public function addParticipant(ManageConversationParticipantRequest $request, int $id): JsonResponse
    {
        try {
            $conversation = $this->conversationService->addParticipant(
                auth('api')->user(),
                $id,
                (int) $request->validated()['user_id']
            );

            return response()->json([
                'message' => 'Participant ajouté avec succès.',
                'data' => $conversation,
            ]);
        } catch (ModelNotFoundException $e) {
            return response()->json(['message' => $e->getMessage()], 404);
        } catch (AuthorizationException $e) {
            return response()->json(['message' => $e->getMessage()], 403);
        }
    }

    public function removeParticipant(ManageConversationParticipantRequest $request, int $id): JsonResponse
    {
        try {
            $conversation = $this->conversationService->removeParticipant(
                auth('api')->user(),
                $id,
                (int) $request->validated()['user_id']
            );

            return response()->json([
                'message' => 'Participant retiré avec succès.',
                'data' => $conversation,
            ]);
        } catch (ModelNotFoundException $e) {
            return response()->json(['message' => $e->getMessage()], 404);
        } catch (AuthorizationException $e) {
            return response()->json(['message' => $e->getMessage()], 403);
        }
    }
}