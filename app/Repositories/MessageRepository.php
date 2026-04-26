<?php

namespace App\Repositories;

use App\Models\Message;
use App\Repositories\Contracts\MessageRepositoryInterface;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class MessageRepository implements MessageRepositoryInterface
{
    public function create(array $data): Message
    {
        return Message::create($data);
    }

    public function findById(int $id): ?Message
    {
        return Message::find($id);
    }

    public function findByIdWithRelations(int $id): ?Message
    {
        return Message::with(['user', 'conversation', 'attachments'])->find($id);
    }

    public function getByConversation(int $conversationId, int $perPage = 20): LengthAwarePaginator
    {
        $messages = Message::with(['user', 'attachments'])
            ->where('conversation_id', $conversationId)
            ->orderBy('id', 'desc')
            ->paginate($perPage);

        $messages->setCollection($messages->getCollection()->reverse()->values());

        return $messages;
    }

    public function update(Message $message, array $data): bool
    {
        return $message->update($data);
    }
}
