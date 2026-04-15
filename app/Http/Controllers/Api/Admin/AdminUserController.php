<?php

namespace App\Http\Controllers\Api\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\UpdateUserRoleRequest;
use App\Http\Requests\Admin\UpdateUserStatusRequest;
use App\Services\AdminUserService;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Throwable;

class AdminUserController extends Controller
{
    public function __construct(
        protected AdminUserService $adminUserService
    ) {}

    public function index(Request $request): JsonResponse
    {
        try {
            $filters = [
                'role' => $request->query('role'),
                'is_active' => $request->has('is_active') ? $request->query('is_active') : null,
                'search' => $request->query('search'),
            ];

            $users = $this->adminUserService->getUsers(
                auth('api')->user(),
                $filters,
                (int) $request->query('per_page', 15)
            );

            return response()->json([
                'message' => 'Utilisateurs récupérés avec succès.',
                'data' => $users,
            ]);
        } catch (AuthorizationException $e) {
            return response()->json(['message' => $e->getMessage()], 403);
        }
    }

    public function show(int $id): JsonResponse
    {
        try {
            $user = $this->adminUserService->showUser(auth('api')->user(), $id);

            return response()->json([
                'message' => 'Utilisateur récupéré avec succès.',
                'data' => $user,
            ]);
        } catch (ModelNotFoundException $e) {
            return response()->json(['message' => $e->getMessage()], 404);
        } catch (AuthorizationException $e) {
            return response()->json(['message' => $e->getMessage()], 403);
        }
    }

    public function updateStatus(UpdateUserStatusRequest $request, int $id): JsonResponse
    {
        try {
            $user = $this->adminUserService->updateStatus(
                auth('api')->user(),
                $id,
                (bool) $request->validated()['is_active']
            );

            return response()->json([
                'message' => 'Statut utilisateur mis à jour avec succès.',
                'data' => $user,
            ]);
        } catch (ModelNotFoundException $e) {
            return response()->json(['message' => $e->getMessage()], 404);
        } catch (AuthorizationException $e) {
            return response()->json(['message' => $e->getMessage()], 403);
        } catch (Throwable $e) {
            return response()->json([
                'message' => 'Échec de la mise à jour du statut utilisateur.',
            ], 500);
        }
    }

    public function updateRole(UpdateUserRoleRequest $request, int $id): JsonResponse
    {
        try {
            $user = $this->adminUserService->updateRole(
                auth('api')->user(),
                $id,
                $request->validated()['role']
            );

            return response()->json([
                'message' => 'Rôle utilisateur mis à jour avec succès.',
                'data' => $user,
            ]);
        } catch (ModelNotFoundException $e) {
            return response()->json(['message' => $e->getMessage()], 404);
        } catch (AuthorizationException $e) {
            return response()->json(['message' => $e->getMessage()], 403);
        } catch (Throwable $e) {
            return response()->json([
                'message' => 'Échec de la mise à jour du rôle utilisateur.',
            ], 500);
        }
    }

    public function destroy(int $id): JsonResponse
    {
        try {
            $this->adminUserService->deleteUser(auth('api')->user(), $id);

            return response()->json([
                'message' => 'Utilisateur supprimé avec succès.',
            ]);
        } catch (ModelNotFoundException $e) {
            return response()->json(['message' => $e->getMessage()], 404);
        } catch (AuthorizationException $e) {
            return response()->json(['message' => $e->getMessage()], 403);
        }
    }
}