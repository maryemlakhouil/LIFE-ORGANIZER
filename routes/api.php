<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\TaskController;
use App\Http\Controllers\Api\FamilyController;
use App\Http\Controllers\Api\ChildController;
use App\Http\Controllers\Api\CommentController;
use App\Http\Controllers\Api\SubTaskController;
use App\Http\Controllers\Api\AttachmentController;
use App\Http\Controllers\Api\ConversationController;
use App\Http\Controllers\Api\MessageController;
use App\Http\Controllers\Api\MessageAttachmentController;
use App\Http\Controllers\Api\NotificationController;


Route::prefix('auth')->group(function () {
    Route::post('/register', [AuthController::class, 'register']);
    Route::post('/login', [AuthController::class, 'login']);
    Route::post('/forgot-password', [AuthController::class, 'forgotPassword']);
    Route::post('/reset-password', [AuthController::class, 'resetPassword']);
    Route::get('/reset-password/{token}', function (string $token) {
    return view('auth.reset-password', ['token' => $token]);
})->name('password.reset');
});

Route::middleware('auth:api')->group(function () {
    Route::get('/auth/me', [AuthController::class, 'me']);
    Route::post('/auth/logout', [AuthController::class, 'logout']);

    Route::get('/tasks', [TaskController::class, 'index']);
    Route::post('/tasks', [TaskController::class, 'store']);
    Route::get('/tasks/{id}', [TaskController::class, 'show']);
    Route::put('/tasks/{id}', [TaskController::class, 'update']);
    Route::delete('/tasks/{id}', [TaskController::class, 'destroy']);
    Route::patch('/tasks/{id}/status', [TaskController::class, 'changeStatus']);

    Route::get('/families', [FamilyController::class, 'index']);
    Route::post('/families', [FamilyController::class, 'store']);
    Route::get('/families/{id}', [FamilyController::class, 'show']);
    Route::put('/families/{id}', [FamilyController::class, 'update']);
    Route::delete('/families/{id}', [FamilyController::class, 'destroy']);
    Route::post('/families/{id}/members', [FamilyController::class, 'addMember']);
    Route::delete('/families/{id}/members', [FamilyController::class, 'removeMember']);

    Route::get('/families/{familyId}/children', [ChildController::class, 'index']);
    Route::post('/children', [ChildController::class, 'store']);
    Route::get('/children/{id}', [ChildController::class, 'show']);
    Route::put('/children/{id}', [ChildController::class, 'update']);
    Route::delete('/children/{id}', [ChildController::class, 'destroy']);

    Route::get('/tasks/{taskId}/comments', [CommentController::class, 'index']);
    Route::post('/comments', [CommentController::class, 'store']);
    Route::get('/comments/{id}', [CommentController::class, 'show']);
    Route::put('/comments/{id}', [CommentController::class, 'update']);
    Route::delete('/comments/{id}', [CommentController::class, 'destroy']);

    Route::get('/tasks/{taskId}/sub-tasks', [SubTaskController::class, 'index']);
    Route::post('/sub-tasks', [SubTaskController::class, 'store']);
    Route::get('/sub-tasks/{id}', [SubTaskController::class, 'show']);
    Route::put('/sub-tasks/{id}', [SubTaskController::class, 'update']);
    Route::patch('/sub-tasks/{id}/status', [SubTaskController::class, 'changeStatus']);
    Route::delete('/sub-tasks/{id}', [SubTaskController::class, 'destroy']);

    Route::get('/tasks/{taskId}/attachments', [AttachmentController::class, 'index']);
    Route::post('/attachments', [AttachmentController::class, 'store']);
    Route::get('/attachments/{id}', [AttachmentController::class, 'show']);
    Route::delete('/attachments/{id}', [AttachmentController::class, 'destroy']);

    Route::get('/conversations', [ConversationController::class, 'index']);
    Route::post('/conversations', [ConversationController::class, 'store']);
    Route::get('/conversations/{id}', [ConversationController::class, 'show']);
    Route::put('/conversations/{id}', [ConversationController::class, 'update']);
    Route::delete('/conversations/{id}', [ConversationController::class, 'destroy']);

    Route::post('/conversations/{id}/participants', [ConversationController::class, 'addParticipant']);
    Route::delete('/conversations/{id}/participants', [ConversationController::class, 'removeParticipant']);

    Route::get('/conversations/{conversationId}/messages', [MessageController::class, 'index']);
    Route::post('/messages', [MessageController::class, 'store']);
    Route::get('/messages/{id}', [MessageController::class, 'show']);
    Route::put('/messages/{id}', [MessageController::class, 'update']);
    Route::delete('/messages/{id}', [MessageController::class, 'destroy']);

    Route::get('/messages/{messageId}/attachments', [MessageAttachmentController::class, 'index']);
    Route::post('/message-attachments', [MessageAttachmentController::class, 'store']);
    Route::get('/message-attachments/{id}', [MessageAttachmentController::class, 'show']);
    Route::delete('/message-attachments/{id}', [MessageAttachmentController::class, 'destroy']);

    Route::get('/notifications', [NotificationController::class, 'index']);
    Route::get('/notifications/{id}', [NotificationController::class, 'show']);
    Route::patch('/notifications/{id}/read', [NotificationController::class, 'markAsRead']);
    Route::patch('/notifications/read-all', [NotificationController::class, 'markAllAsRead']);
    Route::delete('/notifications/{id}', [NotificationController::class, 'destroy']);

});

