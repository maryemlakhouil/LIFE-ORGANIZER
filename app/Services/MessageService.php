<?php

namespace App\Services;

use App\Models\Conversation;
use App\Models\Message;
use App\Models\User;
use App\Repositories\Contracts\MessageRepositoryInterface;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Carbon;
use App\Notifications\NewMessageNotification;
use App\Events\MessageSent;
use App\Events\MessageUpdated;
use App\Events\MessageDeleted;


class MessageService
{
    public function __construct(
        protected MessageRepositoryInterface $messageRepository
    ) {}

    public function getConversationMessages(User $user, int $conversationId, int $perPage = 20): LengthAwarePaginator
    {
        $conversation = Conversation::with('users')->find($conversationId);

        if (! $conversation) {
            throw new ModelNotFoundException('Conversation introuvable.');
        }

        $this->authorizeConversationAccess($user, $conversation);

        return $this->messageRepository->getByConversation($conversationId, $perPage);
    }

    public function createMessage(User $user, array $data): Message
    {
        $conversation = Conversation::with('users')->find($data['conversation_id']);

        if (! $conversation) {
            throw new ModelNotFoundException('Conversation introuvable.');
        }

        $this->authorizeConversationAccess($user, $conversation);

        $message = $this->messageRepository->create([
            'conversation_id' => $conversation->id,
            'user_id' => $user->id,
            'content' => $data['content'],
            'sent_at' => Carbon::now(),
            'edited_at' => null,
            'deleted_at' => null,
        ]);

        try {
            broadcast(new MessageSent($message))->toOthers();
        } catch (\Throwable $e) {
            report($e);
        }

        $conversation->load('users');

        $recipients = $conversation->users->where('id', '!=', $user->id);

        foreach ($recipients as $recipient) {
            $recipient->notify(new NewMessageNotification($message));
        }
        
        return $this->messageRepository->findByIdWithRelations($message->id);
    }

    public function showMessage(User $user, int $messageId): Message
    {
        $message = $this->messageRepository->findByIdWithRelations($messageId);

        if (! $message) {
            throw new ModelNotFoundException('Message introuvable.');
        }

        $conversation = Conversation::with('users')->find($message->conversation_id);

        if (! $conversation) {
            throw new ModelNotFoundException('Conversation introuvable.');
        }

        $this->authorizeConversationAccess($user, $conversation);

        return $message;
    }

    public function updateMessage(User $user, int $messageId, array $data): Message
    {
        $message = $this->messageRepository->findById($messageId);

        if (! $message) {
            throw new ModelNotFoundException('Message introuvable.');
        }

        if ($message->deleted_at) {
            throw new AuthorizationException('Un message supprimé ne peut pas être modifié.');
        }

        if (! $this->canManageMessage($user, $message)) {
            throw new AuthorizationException('Vous ne pouvez pas modifier ce message.');
        }

        $this->messageRepository->update($message, [
            'content' => $data['content'],
            'edited_at' => Carbon::now(),
        ]);

        $updatedMessage = $this->messageRepository->findByIdWithRelations($message->id);

        try {
            broadcast(new MessageUpdated($updatedMessage))->toOthers();
        } catch (\Throwable $e) {
            report($e);
        }

        return $updatedMessage;
    }

    public function deleteMessage(User $user, int $messageId): Message
    {
        $message = $this->messageRepository->findById($messageId);

        if (! $message) {
            throw new ModelNotFoundException('Message introuvable.');
        }

        if (! $this->canManageMessage($user, $message)) {
            throw new AuthorizationException('Vous ne pouvez pas supprimer ce message.');
        }

        $this->messageRepository->update($message, [
            'deleted_at' => Carbon::now(),
        ]);

        $deletedMessage = $this->messageRepository->findByIdWithRelations($message->id);

        try {
            broadcast(new MessageDeleted($deletedMessage))->toOthers();
        } catch (\Throwable $e) {
            report($e);
        }

        return $deletedMessage;
    }

    protected function authorizeConversationAccess(User $user, Conversation $conversation): void
    {
        $isParticipant = $conversation->users->contains('id', $user->id);

        if ($user->role === 'admin' || $isParticipant) {
            return;
        }

        throw new AuthorizationException('Accès non autorisé à cette conversation.');
    }

    protected function canManageMessage(User $user, Message $message): bool
    {
        if ($user->role === 'admin') {
            return true;
        }

        return (int) $message->user_id === (int) $user->id;
    }
}
