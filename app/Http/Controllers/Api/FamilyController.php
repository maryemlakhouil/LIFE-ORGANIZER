<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Family\ManageFamilyMemberRequest;
use App\Http\Requests\Family\StoreFamilyRequest;
use App\Http\Requests\Family\UpdateFamilyRequest;
use App\Services\FamilyService;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\JsonResponse;
use Throwable;

class FamilyController extends Controller
{
    public function __construct(
        protected FamilyService $familyService
    ) {}

    public function index(): JsonResponse
    {
        $families = $this->familyService->getAuthenticatedUserFamilies(auth('api')->user());

        return response()->json([
            'message' => 'Familles récupérées avec succès.',
            'data' => $families,
        ]);
    }

    public function store(StoreFamilyRequest $request): JsonResponse
    {
        try {
            $family = $this->familyService->createFamily(auth('api')->user(), $request->validated());

            return response()->json([
                'message' => 'Famille créée avec succès.',
                'data' => $family,
            ], 201);
        } catch (AuthorizationException $e) {
            return response()->json(['message' => $e->getMessage()], 403);
        } catch (Throwable $e) {
            return response()->json([
                'message' => 'Échec de la création de la famille.',
            ], 500);
        }
    }

    public function show(int $id): JsonResponse
    {
        try {
            $family = $this->familyService->showFamily(auth('api')->user(), $id);

            return response()->json([
                'message' => 'Famille récupérée avec succès.',
                'data' => $family,
            ]);
        } catch (ModelNotFoundException $e) {
            return response()->json(['message' => $e->getMessage()], 404);
        } catch (AuthorizationException $e) {
            return response()->json(['message' => $e->getMessage()], 403);
        }
    }

    public function update(UpdateFamilyRequest $request, int $id): JsonResponse
    {
        try {
            $family = $this->familyService->updateFamily(auth('api')->user(), $id, $request->validated());

            return response()->json([
                'message' => 'Famille mise à jour avec succès.',
                'data' => $family,
            ]);
        } catch (ModelNotFoundException $e) {
            return response()->json(['message' => $e->getMessage()], 404);
        } catch (AuthorizationException $e) {
            return response()->json(['message' => $e->getMessage()], 403);
        } catch (Throwable $e) {
            return response()->json([
                'message' => 'Échec de la mise à jour de la famille.',
            ], 500);
        }
    }

    public function destroy(int $id): JsonResponse
    {
        try {
            $this->familyService->deleteFamily(auth('api')->user(), $id);

            return response()->json([
                'message' => 'Famille supprimée avec succès.',
            ]);
        } catch (ModelNotFoundException $e) {
            return response()->json(['message' => $e->getMessage()], 404);
        } catch (AuthorizationException $e) {
            return response()->json(['message' => $e->getMessage()], 403);
        }
    }

    public function addMember(ManageFamilyMemberRequest $request, int $id): JsonResponse
    {
        try {
            $family = $this->familyService->addMember(
                auth('api')->user(),
                $id,
                $request->validated()['user_id']
            );

            return response()->json([
                'message' => 'Membre ajouté avec succès.',
                'data' => $family,
            ]);
        } catch (ModelNotFoundException $e) {
            return response()->json(['message' => $e->getMessage()], 404);
        } catch (AuthorizationException $e) {
            return response()->json(['message' => $e->getMessage()], 403);
        }
    }

    public function removeMember(ManageFamilyMemberRequest $request, int $id): JsonResponse
    {
        try {
            $family = $this->familyService->removeMember(
                auth('api')->user(),
                $id,
                $request->validated()['user_id']
            );

            return response()->json([
                'message' => 'Membre retiré avec succès.',
                'data' => $family,
            ]);
        } catch (ModelNotFoundException $e) {
            return response()->json(['message' => $e->getMessage()], 404);
        } catch (AuthorizationException $e) {
            return response()->json(['message' => $e->getMessage()], 403);
        }
    }
}