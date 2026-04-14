<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Comment\StoreCommentRequest;
use App\Http\Requests\Comment\UpdateCommentRequest;
use App\Services\CommentService;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\JsonResponse;
use Throwable;

class CommentController extends Controller
{
    public function __construct(
        protected CommentService $commentService
    ) {}

    public function index(int $taskId): JsonResponse
    {
        try {
            $comments = $this->commentService->getTaskComments(auth('api')->user(), $taskId);

            return response()->json([
                'message' => 'Commentaires récupérés avec succès.',
                'data' => $comments,
            ]);
        } catch (ModelNotFoundException $e) {
            return response()->json(['message' => $e->getMessage()], 404);
        } catch (AuthorizationException $e) {
            return response()->json(['message' => $e->getMessage()], 403);
        }
    }

    public function store(StoreCommentRequest $request): JsonResponse
    {
        try {
            $comment = $this->commentService->createComment(auth('api')->user(), $request->validated());

            return response()->json([
                'message' => 'Commentaire créé avec succès.',
                'data' => $comment,
            ], 201);
        } catch (ModelNotFoundException $e) {
            return response()->json(['message' => $e->getMessage()], 404);
        } catch (AuthorizationException $e) {
            return response()->json(['message' => $e->getMessage()], 403);
        } catch (Throwable $e) {
            return response()->json([
                'message' => 'Échec de la création du commentaire.',
            ], 500);
        }
    }

    public function show(int $id): JsonResponse
    {
        try {
            $comment = $this->commentService->showComment(auth('api')->user(), $id);

            return response()->json([
                'message' => 'Commentaire récupéré avec succès.',
                'data' => $comment,
            ]);
        } catch (ModelNotFoundException $e) {
            return response()->json(['message' => $e->getMessage()], 404);
        } catch (AuthorizationException $e) {
            return response()->json(['message' => $e->getMessage()], 403);
        }
    }

    public function update(UpdateCommentRequest $request, int $id): JsonResponse
    {
        try {
            $comment = $this->commentService->updateComment(auth('api')->user(), $id, $request->validated());

            return response()->json([
                'message' => 'Commentaire mis à jour avec succès.',
                'data' => $comment,
            ]);
        } catch (ModelNotFoundException $e) {
            return response()->json(['message' => $e->getMessage()], 404);
        } catch (AuthorizationException $e) {
            return response()->json(['message' => $e->getMessage()], 403);
        } catch (Throwable $e) {
            return response()->json([
                'message' => 'Échec de la mise à jour du commentaire.',
            ], 500);
        }
    }

    public function destroy(int $id): JsonResponse
    {
        try {
            $this->commentService->deleteComment(auth('api')->user(), $id);

            return response()->json([
                'message' => 'Commentaire supprimé avec succès.',
            ]);
        } catch (ModelNotFoundException $e) {
            return response()->json(['message' => $e->getMessage()], 404);
        } catch (AuthorizationException $e) {
            return response()->json(['message' => $e->getMessage()], 403);
        }
    }
}