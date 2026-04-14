<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Child\StoreChildRequest;
use App\Http\Requests\Child\UpdateChildRequest;
use App\Services\ChildService;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\JsonResponse;
use Throwable;

class ChildController extends Controller
{
    public function __construct(
        protected ChildService $childService
    ) {}

    public function index(int $familyId): JsonResponse
    {
        try {
            $children = $this->childService->getFamilyChildren(auth('api')->user(), $familyId);

            return response()->json([
                'message' => 'Enfants récupérés avec succès.',
                'data' => $children,
            ]);
        } catch (ModelNotFoundException $e) {
            return response()->json(['message' => $e->getMessage()], 404);
        } catch (AuthorizationException $e) {
            return response()->json(['message' => $e->getMessage()], 403);
        }
    }

    public function store(StoreChildRequest $request): JsonResponse
    {
        try {
            $child = $this->childService->createChild(auth('api')->user(), $request->validated());

            return response()->json([
                'message' => 'Enfant créé avec succès.',
                'data' => $child,
            ], 201);
        } catch (ModelNotFoundException $e) {
            return response()->json(['message' => $e->getMessage()], 404);
        } catch (AuthorizationException $e) {
            return response()->json(['message' => $e->getMessage()], 403);
        } catch (Throwable $e) {
            return response()->json([
                'message' => 'Échec de la création de l’enfant.',
            ], 500);
        }
    }

    public function show(int $id): JsonResponse
    {
        try {
            $child = $this->childService->showChild(auth('api')->user(), $id);

            return response()->json([
                'message' => 'Enfant récupéré avec succès.',
                'data' => $child,
            ]);
        } catch (ModelNotFoundException $e) {
            return response()->json(['message' => $e->getMessage()], 404);
        } catch (AuthorizationException $e) {
            return response()->json(['message' => $e->getMessage()], 403);
        }
    }

    public function update(UpdateChildRequest $request, int $id): JsonResponse
    {
        try {
            $child = $this->childService->updateChild(auth('api')->user(), $id, $request->validated());

            return response()->json([
                'message' => 'Enfant mis à jour avec succès.',
                'data' => $child,
            ]);
        } catch (ModelNotFoundException $e) {
            return response()->json(['message' => $e->getMessage()], 404);
        } catch (AuthorizationException $e) {
            return response()->json(['message' => $e->getMessage()], 403);
        } catch (Throwable $e) {
            return response()->json([
                'message' => 'Échec de la mise à jour de l’enfant.',
            ], 500);
        }
    }

    public function destroy(int $id): JsonResponse
    {
        try {
            $this->childService->deleteChild(auth('api')->user(), $id);

            return response()->json([
                'message' => 'Enfant supprimé avec succès.',
            ]);
        } catch (ModelNotFoundException $e) {
            return response()->json(['message' => $e->getMessage()], 404);
        } catch (AuthorizationException $e) {
            return response()->json(['message' => $e->getMessage()], 403);
        }
    }
}