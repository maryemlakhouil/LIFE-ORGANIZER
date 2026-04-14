<?php

namespace App\Repositories\Contracts;

use App\Models\Message;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

interface MessageRepositoryInterface
{
    public function create(array $data): Message;

    public function findById(int $id): ?Message;

    public function findByIdWithRelations(int $id): ?Message;

    public function getByConversation(int $conversationId, int $perPage = 20): LengthAwarePaginator;

    public function update(Message $message, array $data): bool;
}