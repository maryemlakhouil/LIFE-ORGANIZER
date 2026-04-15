<?php

namespace App\Repositories;

use App\Models\Conversation;
use App\Repositories\Contracts\ConversationRepositoryInterface;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class ConversationRepository implements ConversationRepositoryInterface
{
    public function create(array $data): Conversation
    {
        return Conversation::create($data);
    }

    public function findById(int $id): ?Conversation
    {
        return Conversation::find($id);
    }

    public function findByIdWithRelations(int $id): ?Conversation
    {
        return Conversation::with(['creator', 'users', 'messages'])->find($id);
    }

    public function getForUser(int $userId, int $perPage = 10): LengthAwarePaginator
    {
        return Conversation::with(['creator', 'users'])
            ->whereHas('users', function ($query) use ($userId) {
                $query->where('users.id', $userId);
            })
            ->latest()
            ->paginate($perPage);
    }

    public function update(Conversation $conversation, array $data): bool
    {
        return $conversation->update($data);
    }

    public function delete(Conversation $conversation): bool
    {
        return $conversation->delete();
    }

    public function attachUsers(Conversation $conversation, array $userIds): void
    {
        $conversation->users()->syncWithoutDetaching($userIds);
    }

    public function detachUser(Conversation $conversation, int $userId): void
    {
        $conversation->users()->detach($userId);
    }
}