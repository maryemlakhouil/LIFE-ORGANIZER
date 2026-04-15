<?php

namespace App\Services;

use App\Models\Attachment;
use App\Models\Task;
use App\Models\User;
use App\Models\Message;
use App\Repositories\Contracts\AttachmentRepositoryInterface;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

class AttachmentService
{
    public function __construct(
        protected AttachmentRepositoryInterface $attachmentRepository
    ) {}

    public function getTaskAttachments(User $user, int $taskId, int $perPage = 10): LengthAwarePaginator
    {
        $task = Task::find($taskId);

        if (! $task) {
            throw new ModelNotFoundException('Tâche introuvable.');
        }

        $this->authorizeTaskAccess($user, $task);

        return $this->attachmentRepository->getByTask($taskId, $perPage);
    }

    public function createTaskAttachment(User $user, int $taskId, UploadedFile $file): Attachment
    {
        $task = Task::find($taskId);

        if (! $task) {
            throw new ModelNotFoundException('Tâche introuvable.');
        }

        $this->authorizeTaskManagement($user, $task);

        $storedPath = $file->store('attachments/tasks', 'public');

        $attachment = $this->attachmentRepository->create([
            'task_id' => $task->id,
            'message_id' => null,
            'file_name' => $file->getClientOriginalName(),
            'file_type' => $file->getClientMimeType(),
            'file_path' => $storedPath,
        ]);

        return $this->attachmentRepository->findByIdWithRelations($attachment->id);
    }

    public function showAttachment(User $user, int $attachmentId): Attachment
    {
        $attachment = $this->attachmentRepository->findByIdWithRelations($attachmentId);

        if (! $attachment) {
            throw new ModelNotFoundException('Pièce jointe introuvable.');
        }

        if ($attachment->task_id) {
            $task = Task::find($attachment->task_id);

            if (! $task) {
                throw new ModelNotFoundException('Tâche introuvable.');
            }

            $this->authorizeTaskAccess($user, $task);
        } else {
            throw new AuthorizationException('Cette pièce jointe n’est pas liée à une tâche.');
        }

        return $attachment;
    }

    public function deleteAttachment(User $user, int $attachmentId): void
    {
        $attachment = $this->attachmentRepository->findById($attachmentId);

        if (! $attachment) {
            throw new ModelNotFoundException('Pièce jointe introuvable.');
        }

        if (! $attachment->task_id) {
            throw new AuthorizationException('Cette pièce jointe n’est pas liée à une tâche.');
        }

        $task = Task::find($attachment->task_id);

        if (! $task) {
            throw new ModelNotFoundException('Tâche introuvable.');
        }

        $this->authorizeTaskManagement($user, $task);

        if ($attachment->file_path && Storage::disk('public')->exists($attachment->file_path)) {
            Storage::disk('public')->delete($attachment->file_path);
        }

        $this->attachmentRepository->delete($attachment);
    }

    protected function authorizeTaskAccess(User $user, Task $task): void
    {
        $canAccess =
            $user->role === 'admin' ||
            ($user->role === 'parent' && (int) $task->created_by === (int) $user->id) ||
            ($user->role === 'nounou' && (int) $task->assigned_to === (int) $user->id);

        if (! $canAccess) {
            throw new AuthorizationException('Accès non autorisé à cette tâche.');
        }
    }

    protected function authorizeTaskManagement(User $user, Task $task): void
    {
        $canManage =
            $user->role === 'admin' ||
            ($user->role === 'parent' && (int) $task->created_by === (int) $user->id);

        if (! $canManage) {
            throw new AuthorizationException('Vous ne pouvez pas gérer les pièces jointes de cette tâche.');
        }
    }

    public function getMessageAttachments(User $user, int $messageId, int $perPage = 10): LengthAwarePaginator
{
    $message = Message::with('conversation.users')->find($messageId);

    if (! $message) {
        throw new ModelNotFoundException('Message introuvable.');
    }

    $this->authorizeMessageAccess($user, $message);

    return $this->attachmentRepository->getByMessage($messageId, $perPage);
}

public function createMessageAttachment(User $user, int $messageId, UploadedFile $file): Attachment
{
    $message = Message::with('conversation.users')->find($messageId);

    if (! $message) {
        throw new ModelNotFoundException('Message introuvable.');
    }

    $this->authorizeMessageManagement($user, $message);

    $storedPath = $file->store('attachments/messages', 'public');

    $attachment = $this->attachmentRepository->create([
        'task_id' => null,
        'message_id' => $message->id,
        'file_name' => $file->getClientOriginalName(),
        'file_type' => $file->getClientMimeType(),
        'file_path' => $storedPath,
    ]);

    return $this->attachmentRepository->findByIdWithRelations($attachment->id);
}

public function showMessageAttachment(User $user, int $attachmentId): Attachment
{
    $attachment = $this->attachmentRepository->findByIdWithRelations($attachmentId);

    if (! $attachment) {
        throw new ModelNotFoundException('Pièce jointe introuvable.');
    }

    if (! $attachment->message_id) {
        throw new AuthorizationException('Cette pièce jointe n’est pas liée à un message.');
    }

    $message = Message::with('conversation.users')->find($attachment->message_id);

    if (! $message) {
        throw new ModelNotFoundException('Message introuvable.');
    }

    $this->authorizeMessageAccess($user, $message);

    return $attachment;
}

public function deleteMessageAttachment(User $user, int $attachmentId): void
{
    $attachment = $this->attachmentRepository->findById($attachmentId);

    if (! $attachment) {
        throw new ModelNotFoundException('Pièce jointe introuvable.');
    }

    if (! $attachment->message_id) {
        throw new AuthorizationException('Cette pièce jointe n’est pas liée à un message.');
    }

    $message = Message::with('conversation.users')->find($attachment->message_id);

    if (! $message) {
        throw new ModelNotFoundException('Message introuvable.');
    }

    $this->authorizeMessageManagement($user, $message);

    if ($attachment->file_path && Storage::disk('public')->exists($attachment->file_path)) {
        Storage::disk('public')->delete($attachment->file_path);
    }

    $this->attachmentRepository->delete($attachment);
}

    protected function authorizeMessageAccess(User $user, Message $message): void
    {
        $conversation = $message->conversation;

        if (! $conversation) {
            throw new ModelNotFoundException('Conversation introuvable.');
        }

        $isParticipant = $conversation->users->contains('id', $user->id);

        if ($user->role === 'admin' || $isParticipant) {
            return;
        }

        throw new AuthorizationException('Accès non autorisé à ce message.');
    }

    protected function authorizeMessageManagement(User $user, Message $message): void
    {
        if ($user->role === 'admin' || (int) $message->user_id === (int) $user->id) {
            return;
        }

        throw new AuthorizationException('Vous ne pouvez pas gérer les pièces jointes de ce message.');
    }
}