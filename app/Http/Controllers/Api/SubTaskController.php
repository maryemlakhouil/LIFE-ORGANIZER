<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\SubTask\ChangeSubTaskStatusRequest;
use App\Http\Requests\SubTask\StoreSubTaskRequest;
use App\Http\Requests\SubTask\UpdateSubTaskRequest;
use App\Services\SubTaskService;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\JsonResponse;
use Throwable;

class SubTaskController extends Controller
{
    public function __construct(
        protected SubTaskService $subTaskService
    ) {}

    public function index(int $taskId): JsonResponse
    {
        try {
            $subTasks = $this->subTaskService->getTaskSubTasks(auth('api')->user(), $taskId);

            return response()->json([
                'message' => 'Sous-tâches récupérées avec succès.',
                'data' => $subTasks,
            ]);
        } catch (ModelNotFoundException $e) {
            return response()->json(['message' => $e->getMessage()], 404);
        } catch (AuthorizationException $e) {
            return response()->json(['message' => $e->getMessage()], 403);
        }
    }

    public function store(StoreSubTaskRequest $request): JsonResponse
    {
        try {
            $subTask = $this->subTaskService->createSubTask(auth('api')->user(), $request->validated());

            return response()->json([
                'message' => 'Sous-tâche créée avec succès.',
                'data' => $subTask,
            ], 201);
        } catch (ModelNotFoundException $e) {
            return response()->json(['message' => $e->getMessage()], 404);
        } catch (AuthorizationException $e) {
            return response()->json(['message' => $e->getMessage()], 403);
        } catch (Throwable $e) {
            return response()->json([
                'message' => 'Échec de la création de la sous-tâche.',
            ], 500);
        }
    }

    public function show(int $id): JsonResponse
    {
        try {
            $subTask = $this->subTaskService->showSubTask(auth('api')->user(), $id);

            return response()->json([
                'message' => 'Sous-tâche récupérée avec succès.',
                'data' => $subTask,
            ]);
        } catch (ModelNotFoundException $e) {
            return response()->json(['message' => $e->getMessage()], 404);
        } catch (AuthorizationException $e) {
            return response()->json(['message' => $e->getMessage()], 403);
        }
    }

    public function update(UpdateSubTaskRequest $request, int $id): JsonResponse
    {
        try {
            $subTask = $this->subTaskService->updateSubTask(auth('api')->user(), $id, $request->validated());

            return response()->json([
                'message' => 'Sous-tâche mise à jour avec succès.',
                'data' => $subTask,
            ]);
        } catch (ModelNotFoundException $e) {
            return response()->json(['message' => $e->getMessage()], 404);
        } catch (AuthorizationException $e) {
            return response()->json(['message' => $e->getMessage()], 403);
        } catch (Throwable $e) {
            return response()->json([
                'message' => 'Échec de la mise à jour de la sous-tâche.',
            ], 500);
        }
    }

    public function changeStatus(ChangeSubTaskStatusRequest $request, int $id): JsonResponse
    {
        try {
            $subTask = $this->subTaskService->changeStatus(
                auth('api')->user(),
                $id,
                $request->validated()['is_completed']
            );

            return response()->json([
                'message' => 'Statut de la sous-tâche mis à jour avec succès.',
                'data' => $subTask,
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
            $this->subTaskService->deleteSubTask(auth('api')->user(), $id);

            return response()->json([
                'message' => 'Sous-tâche supprimée avec succès.',
            ]);
        } catch (ModelNotFoundException $e) {
            return response()->json(['message' => $e->getMessage()], 404);
        } catch (AuthorizationException $e) {
            return response()->json(['message' => $e->getMessage()], 403);
        }
    }
}