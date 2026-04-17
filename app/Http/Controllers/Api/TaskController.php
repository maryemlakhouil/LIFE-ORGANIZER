<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Task\StoreTaskRequest;
use App\Http\Requests\Task\UpdateTaskRequest;
use App\Http\Requests\Task\ChangeTaskStatusRequest;
use App\Services\TaskService;
// Exception lancée quand l’utilisateur n’a pas le droit d’effectuer l’action
use Illuminate\Auth\Access\AuthorizationException;
// Exception lancée quand la tâche n’existe pas.
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\JsonResponse;
// Permet de capturer les erreurs générales.
use Throwable;

class TaskController extends Controller {

    public function __construct(protected TaskService $taskService) {
        
    }

    public function index(): JsonResponse
    {
        $tasks = $this->taskService->getAuthenticatedUserTasks(auth('api')->user());

        return response()->json([
            'message' => 'Tasks retrieved successfully.',
            'data' => $tasks,
        ]);
    }

    public function store(StoreTaskRequest $request): JsonResponse
    {
        try {
            $task = $this->taskService->createTask(auth('api')->user(), $request->validated());

            return response()->json([
                'message' => 'Task created successfully.',
                'data' => $task,
            ], 201);
        } catch (AuthorizationException $e) {
            return response()->json(['message' => $e->getMessage()], 403);
        } catch (Throwable $e) {
            return response()->json([
                'message' => 'Failed to create task.',
                'error' => $e->getMessage(),
            ], 500);
        }
    }

    public function show(int $id): JsonResponse
    {
        try {
            $task = $this->taskService->showTask(auth('api')->user(), $id);

            return response()->json([
                'message' => 'Task retrieved successfully.',
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
            $task = $this->taskService->updateTask(auth('api')->user(), $id, $request->validated());

            return response()->json([
                'message' => 'Task updated successfully.',
                'data' => $task,
            ]);
        } catch (ModelNotFoundException $e) {
            return response()->json(['message' => $e->getMessage()], 404);
        } catch (AuthorizationException $e) {
            return response()->json(['message' => $e->getMessage()], 403);
        } catch (Throwable $e) {
            return response()->json([
                'message' => 'Failed to update task.',
                'error' => $e->getMessage(),
            ], 500);
        }
    }

    public function destroy(int $id): JsonResponse
    {
        try {
            $this->taskService->deleteTask(auth('api')->user(), $id);

            return response()->json([
                'message' => 'Task deleted successfully.',
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
                auth('api')->user(),
                $id,
                $request->validated()['status']
            );

            return response()->json([
                'message' => 'Task status updated successfully.',
                'data' => $task,
            ]);
        } catch (ModelNotFoundException $e) {
            return response()->json(['message' => $e->getMessage()], 404);
        } catch (AuthorizationException $e) {
            return response()->json(['message' => $e->getMessage()], 403);
            responce()->json(['message'=> $e->getMessage()]);
        }
    }
}
