<?php

namespace App\Repositories\Contracts;

use App\Models\Conversation;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

interface ConversationRepositoryInterface
{
    public function create(array $data): Conversation;

    public function findById(int $id): ?Conversation;

    public function findByIdWithRelations(int $id): ?Conversation;

    public function getForUser(int $userId, int $perPage = 10): LengthAwarePaginator;

    public function update(Conversation $conversation, array $data): bool;

    public function delete(Conversation $conversation): bool;

    public function attachUsers(Conversation $conversation, array $userIds): void;

    public function detachUser(Conversation $conversation, int $userId): void;
}