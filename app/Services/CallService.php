<?php

namespace App\Services;

use App\Events\CallAccepted;
use App\Events\CallEnded;
use App\Events\CallInvited;
use App\Events\CallRejected;
use App\Events\CallSignalSent;
use App\Models\Conversation;
use App\Models\User;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Str;

class CallService
{
    public function startCall(User $user, int $conversationId, array $data): array
    {
        $conversation = $this->getAuthorizedConversation($user, $conversationId);
        $targetUser = $this->resolveTargetUser($conversation, $data['target_user_id'] ?? null);

        $payload = [
            'call_id' => (string) Str::uuid(),
            'conversation_id' => $conversation->id,
            'type' => $data['type'],
            'status' => 'ringing',
            'initiator' => $this->formatUser($user),
            'target_user' => $targetUser ? $this->formatUser($targetUser) : null,
            'created_at' => now()->toISOString(),
        ];

        broadcast(new CallInvited($conversation->id, $payload))->toOthers();

        return $payload;
    }

    public function acceptCall(User $user, int $conversationId, string $callId): array
    {
        $conversation = $this->getAuthorizedConversation($user, $conversationId);

        $payload = [
            'call_id' => $callId,
            'conversation_id' => $conversation->id,
            'status' => 'accepted',
            'user' => $this->formatUser($user),
            'accepted_at' => now()->toISOString(),
        ];

        broadcast(new CallAccepted($conversation->id, $payload))->toOthers();

        return $payload;
    }

    public function rejectCall(User $user, int $conversationId, string $callId): array
    {
        $conversation = $this->getAuthorizedConversation($user, $conversationId);

        $payload = [
            'call_id' => $callId,
            'conversation_id' => $conversation->id,
            'status' => 'rejected',
            'user' => $this->formatUser($user),
            'rejected_at' => now()->toISOString(),
        ];

        broadcast(new CallRejected($conversation->id, $payload))->toOthers();

        return $payload;
    }

    public function endCall(User $user, int $conversationId, string $callId): array
    {
        $conversation = $this->getAuthorizedConversation($user, $conversationId);

        $payload = [
            'call_id' => $callId,
            'conversation_id' => $conversation->id,
            'status' => 'ended',
            'user' => $this->formatUser($user),
            'ended_at' => now()->toISOString(),
        ];

        broadcast(new CallEnded($conversation->id, $payload))->toOthers();

        return $payload;
    }

    public function sendSignal(User $user, int $conversationId, string $callId, array $data): array
    {
        $conversation = $this->getAuthorizedConversation($user, $conversationId);
        $targetUser = $this->resolveTargetUser($conversation, $data['target_user_id'] ?? null);

        $payload = [
            'call_id' => $callId,
            'conversation_id' => $conversation->id,
            'signal_type' => $data['signal_type'],
            'signal' => $data['signal'],
            'from_user' => $this->formatUser($user),
            'target_user' => $targetUser ? $this->formatUser($targetUser) : null,
            'sent_at' => now()->toISOString(),
        ];

        broadcast(new CallSignalSent($conversation->id, $payload))->toOthers();

        return $payload;
    }

    protected function getAuthorizedConversation(User $user, int $conversationId): Conversation
    {
        $conversation = Conversation::with('users')->find($conversationId);

        if (! $conversation) {
            throw new ModelNotFoundException('Conversation introuvable.');
        }

        $isParticipant = $conversation->users->contains('id', $user->id);

        if (! $isParticipant && $user->role !== 'admin') {
            throw new AuthorizationException('Accès non autorisé à cette conversation.');
        }

        return $conversation;
    }

    protected function resolveTargetUser(Conversation $conversation, ?int $targetUserId): ?User
    {
        if (! $targetUserId) {
            return null;
        }

        $targetUser = $conversation->users->firstWhere('id', $targetUserId);

        if (! $targetUser) {
            throw new AuthorizationException('L’utilisateur ciblé ne fait pas partie de la conversation.');
        }

        return $targetUser;
    }

    protected function formatUser(User $user): array
    {
        return [
            'id' => $user->id,
            'name' => $user->name,
            'photo' => $user->photo,
            'role' => $user->role,
        ];
    }
}
