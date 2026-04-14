<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Attachment\StoreTaskAttachmentRequest;
use App\Services\AttachmentService;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\JsonResponse;
use Throwable;

class AttachmentController extends Controller
{
    public function __construct(
        protected AttachmentService $attachmentService
    ) {}

    public function index(int $taskId): JsonResponse
    {
        try {
            $attachments = $this->attachmentService->getTaskAttachments(auth('api')->user(), $taskId);

            return response()->json([
                'message' => 'Pièces jointes récupérées avec succès.',
                'data' => $attachments,
            ]);
        } catch (ModelNotFoundException $e) {
            return response()->json(['message' => $e->getMessage()], 404);
        } catch (AuthorizationException $e) {
            return response()->json(['message' => $e->getMessage()], 403);
        }
    }

    public function store(StoreTaskAttachmentRequest $request): JsonResponse
    {
        try {
            $attachment = $this->attachmentService->createTaskAttachment(
                auth('api')->user(),
                (int) $request->validated()['task_id'],
                $request->file('file')
            );

            return response()->json([
                'message' => 'Pièce jointe ajoutée avec succès.',
                'data' => $attachment,
            ], 201);
        } catch (ModelNotFoundException $e) {
            return response()->json(['message' => $e->getMessage()], 404);
        } catch (AuthorizationException $e) {
            return response()->json(['message' => $e->getMessage()], 403);
        } catch (Throwable $e) {
            return response()->json([
                'message' => 'Échec de l’ajout de la pièce jointe.',
            ], 500);
        }
    }

    public function show(int $id): JsonResponse
    {
        try {
            $attachment = $this->attachmentService->showAttachment(auth('api')->user(), $id);

            return response()->json([
                'message' => 'Pièce jointe récupérée avec succès.',
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
            $this->attachmentService->deleteAttachment(auth('api')->user(), $id);

            return response()->json([
                'message' => 'Pièce jointe supprimée avec succès.',
            ]);
        } catch (ModelNotFoundException $e) {
            return response()->json(['message' => $e->getMessage()], 404);
        } catch (AuthorizationException $e) {
            return response()->json(['message' => $e->getMessage()], 403);
        }
    }
}