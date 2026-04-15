<?php

namespace App\Services;

use App\Models\Conversation;
use App\Models\User;
use App\Repositories\Contracts\ConversationRepositoryInterface;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class ConversationService
{
    public function __construct(
        protected ConversationRepositoryInterface $conversationRepository
    ) {}

    public function getAuthenticatedUserConversations(User $user, int $perPage = 10): LengthAwarePaginator
    {
        if ($user->role === 'admin') {
            return Conversation::with(['creator', 'users'])->latest()->paginate($perPage);
        }

        return $this->conversationRepository->getForUser($user->id, $perPage);
    }

    public function createConversation(User $user, array $data): Conversation
    {
        if (! in_array($user->role, ['parent', 'nounou', 'admin'], true)) {
            throw new AuthorizationException('Rôle non autorisé.');
        }

        $participantIds = $data['participant_ids'] ?? [];
        $participantIds[] = $user->id;
        $participantIds = array_values(array_unique($participantIds));

        $participants = User::whereIn('id', $participantIds)->get();

        if ($participants->count() !== count($participantIds)) {
            throw new ModelNotFoundException('Un ou plusieurs participants sont introuvables.');
        }

        foreach ($participants as $participant) {
            if (! $participant->is_active) {
                throw new AuthorizationException("L'utilisateur {$participant->id} est désactivé.");
            }
        }

        $conversation = $this->conversationRepository->create([
            'created_by' => $user->id,
            'type' => $data['type'] ?? 'direct',
            'title' => $data['title'] ?? null,
        ]);

        $this->conversationRepository->attachUsers($conversation, $participantIds);

        return $this->conversationRepository->findByIdWithRelations($conversation->id);
    }

    public function showConversation(User $user, int $conversationId): Conversation
    {
        $conversation = $this->conversationRepository->findByIdWithRelations($conversationId);

        if (! $conversation) {
            throw new ModelNotFoundException('Conversation introuvable.');
        }

        $this->authorizeConversationAccess($user, $conversation);

        return $conversation;
    }

    public function updateConversation(User $user, int $conversationId, array $data): Conversation
    {
        $conversation = $this->conversationRepository->findById($conversationId);

        if (! $conversation) {
            throw new ModelNotFoundException('Conversation introuvable.');
        }

        if (! $this->canManageConversation($user, $conversation)) {
            throw new AuthorizationException('Vous ne pouvez pas modifier cette conversation.');
        }

        $this->conversationRepository->update($conversation, [
            'type' => $data['type'] ?? $conversation->type,
            'title' => array_key_exists('title', $data) ? $data['title'] : $conversation->title,
        ]);

        return $this->conversationRepository->findByIdWithRelations($conversation->id);
    }

    public function deleteConversation(User $user, int $conversationId): void
    {
        $conversation = $this->conversationRepository->findById($conversationId);

        if (! $conversation) {
            throw new ModelNotFoundException('Conversation introuvable.');
        }

        if (! $this->canManageConversation($user, $conversation)) {
            throw new AuthorizationException('Vous ne pouvez pas supprimer cette conversation.');
        }

        $this->conversationRepository->delete($conversation);
    }

    public function addParticipant(User $user, int $conversationId, int $participantId): Conversation
    {
        $conversation = $this->conversationRepository->findByIdWithRelations($conversationId);

        if (! $conversation) {
            throw new ModelNotFoundException('Conversation introuvable.');
        }

        if (! $this->canManageConversation($user, $conversation)) {
            throw new AuthorizationException('Vous ne pouvez pas gérer les participants de cette conversation.');
        }

        $participant = User::findOrFail($participantId);

        if (! $participant->is_active) {
            throw new AuthorizationException('Cet utilisateur est désactivé.');
        }

        $this->conversationRepository->attachUsers($conversation, [$participant->id]);

        return $this->conversationRepository->findByIdWithRelations($conversation->id);
    }

    public function removeParticipant(User $user, int $conversationId, int $participantId): Conversation
    {
        $conversation = $this->conversationRepository->findByIdWithRelations($conversationId);

        if (! $conversation) {
            throw new ModelNotFoundException('Conversation introuvable.');
        }

        if (! $this->canManageConversation($user, $conversation)) {
            throw new AuthorizationException('Vous ne pouvez pas gérer les participants de cette conversation.');
        }

        if ((int) $conversation->created_by === (int) $participantId) {
            throw new AuthorizationException('Le créateur de la conversation ne peut pas être retiré.');
        }

        $this->conversationRepository->detachUser($conversation, $participantId);

        return $this->conversationRepository->findByIdWithRelations($conversation->id);
    }

    protected function authorizeConversationAccess(User $user, Conversation $conversation): void
    {
        $isParticipant = $conversation->users->contains('id', $user->id);

        if ($user->role === 'admin' || $isParticipant) {
            return;
        }

        throw new AuthorizationException('Accès non autorisé à cette conversation.');
    }

    protected function canManageConversation(User $user, Conversation $conversation): bool
    {
        return $user->role === 'admin' || (int) $conversation->created_by === (int) $user->id;
    }
}