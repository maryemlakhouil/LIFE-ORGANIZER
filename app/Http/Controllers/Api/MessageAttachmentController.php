<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Attachment\StoreMessageAttachmentRequest;
use App\Services\AttachmentService;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\JsonResponse;
use Throwable;

class MessageAttachmentController extends Controller
{
    public function __construct(
        protected AttachmentService $attachmentService
    ) {}

    public function index(int $messageId): JsonResponse
    {
        try {
            $attachments = $this->attachmentService->getMessageAttachments(
                auth('api')->user(),
                $messageId
            );

            return response()->json([
                'message' => 'Pièces jointes du message récupérées avec succès.',
                'data' => $attachments,
            ]);
        } catch (ModelNotFoundException $e) {
            return response()->json(['message' => $e->getMessage()], 404);
        } catch (AuthorizationException $e) {
            return response()->json(['message' => $e->getMessage()], 403);
        }
    }

    public function store(StoreMessageAttachmentRequest $request): JsonResponse
    {
        try {
            $attachment = $this->attachmentService->createMessageAttachment(
                auth('api')->user(),
                (int) $request->validated()['message_id'],
                $request->file('file')
            );

            return response()->json([
                'message' => 'Pièce jointe du message ajoutée avec succès.',
                'data' => $attachment,
            ], 201);
        } catch (ModelNotFoundException $e) {
            return response()->json(['message' => $e->getMessage()], 404);
        } catch (AuthorizationException $e) {
            return response()->json(['message' => $e->getMessage()], 403);
        } catch (Throwable $e) {
            return response()->json([
                'message' => 'Échec de l’ajout de la pièce jointe du message.',
            ], 500);
        }
    }

    public function show(int $id): JsonResponse
    {
        try {
            $attachment = $this->attachmentService->showMessageAttachment(
                auth('api')->user(),
                $id
            );

            return response()->json([
                'message' => 'Pièce jointe du message récupérée avec succès.',
                'data' => $attachment,
            ]);
        } catch (ModelNotFoundException $e) {
            return response()->json(['message' => $e->getMessage()], 404);
        } catch (AuthorizationException $e) {
            return response()->json(['message' => $e->getMessage()], 403);
        }
    }

    public function destroy(int $id): JsonResponse
    {
        try {
            $this->attachmentService->deleteMessageAttachment(
                auth('api')->user(),
                $id
            );

            return response()->json([
                'message' => 'Pièce jointe du message supprimée avec succès.',
            ]);
        } catch (ModelNotFoundException $e) {
            return response()->json(['message' => $e->getMessage()], 404);
        } catch (AuthorizationException $e) {
            return response()->json(['message' => $e->getMessage()], 403);
        }
    }
}