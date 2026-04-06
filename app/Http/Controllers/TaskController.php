<?php

namespace App\Http\Controllers;

use App\Http\Requests\Task\ChangeTaskStatusRequest;
use App\Http\Requests\Task\StoreTaskRequest;
use App\Http\Requests\Task\UpdateTaskRequest;
use App\Services\TaskService;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\JsonResponse;
use Throwable;

class TaskController extends Controller
{
    public function __construct(
        protected TaskService $taskService
    ) {}

    public function index(): JsonResponse
    {
        $tasks = $this->taskService->getAuthenticatedUserTasks(auth()->user());

        return response()->json([
            'message' => 'Liste des tâches récupérée avec succès.',
            'data' => $tasks,
        ]);
    }

    public function store(StoreTaskRequest $request): JsonResponse
    {
        try {
            $task = $this->taskService->createTask(auth()->user(), $request->validated());

            return response()->json([
                'message' => 'Tâche créée avec succès.',
                'data' => $task,
            ], 201);
        } catch (AuthorizationException $e) {
            return response()->json(['message' => $e->getMessage()], 403);
        } catch (Throwable $e) {
            return response()->json([
                'message' => 'Erreur lors de la création de la tâche.',
                'error' => $e->getMessage(),
            ], 500);
        }
    }

    public function show(int $id): JsonResponse
    {
        try {
            $task = $this->taskService->showTask(auth()->user(), $id);

            return response()->json([
                'message' => 'Tâche récupérée avec succès.',
                'data' => $task,
            ]);
        } catch (ModelNotFoundException $e) {
            return response()->json(['message' => $e->getMessage()], 404);
        } catch (AuthorizationException $e) {
            return response()->json(['message' => $e->getMessage()], 403);
        }
    }

    public function update(UpdateTaskRequest $request, int $id): JsonResponse
    {
        try {
            $task = $this->taskService->updateTask(auth()->user(), $id, $request->validated());

            return response()->json([
                'message' => 'Tâche mise à jour avec succès.',
                'data' => $task,
            ]);
        } catch (ModelNotFoundException $e) {
            return response()->json(['message' => $e->getMessage()], 404);
        } catch (AuthorizationException $e) {
            return response()->json(['message' => $e->getMessage()], 403);
        } catch (Throwable $e) {
            return response()->json([
                'message' => 'Erreur lors de la mise à jour de la tâche.',
                'error' => $e->getMessage(),
            ], 500);
        }
    }

    public function destroy(int $id): JsonResponse
    {
        try {
            $this->taskService->deleteTask(auth()->user(), $id);

            return response()->json([
                'message' => 'Tâche supprimée avec succès.',
            ]);
        } catch (ModelNotFoundException $e) {
            return response()->json(['message' => $e->getMessage()], 404);
        } catch (AuthorizationException $e) {
            return response()->json(['message' => $e->getMessage()], 403);
        }
    }

    public function changeStatus(ChangeTaskStatusRequest $request, int $id): JsonResponse
    {
        try {
            $task = $this->taskService->changeStatus(
                auth()->user(),
                $id,
                $request->validated()['status']
            );

            return response()->json([
                'message' => 'Statut de la tâche mis à jour avec succès.',
                'data' => $task,
            ]);
        } catch (ModelNotFoundException $e) {
            return response()->json(['message' => $e->getMessage()], 404);
        } catch (AuthorizationException $e) {
            return response()->json(['message' => $e->getMessage()], 403);
        }
    }
}