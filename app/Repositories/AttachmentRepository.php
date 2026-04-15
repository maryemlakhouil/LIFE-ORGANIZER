<?php

namespace App\Repositories;

use App\Models\Attachment;
use App\Repositories\Contracts\AttachmentRepositoryInterface;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class AttachmentRepository implements AttachmentRepositoryInterface
{
    public function create(array $data): Attachment
    {
        return Attachment::create($data);
    }

    public function findById(int $id): ?Attachment
    {
        return Attachment::find($id);
    }

    public function findByIdWithRelations(int $id): ?Attachment
    {
        return Attachment::with(['task', 'message'])->find($id);
    }

    public function getByTask(int $taskId, int $perPage = 10): LengthAwarePaginator
    {
        return Attachment::where('task_id', $taskId)
            ->latest()
            ->paginate($perPage);
    }

    public function getByMessage(int $messageId, int $perPage = 10): LengthAwarePaginator
    {
        return Attachment::where('message_id', $messageId)
            ->latest()
            ->paginate($perPage);
    }

    public function delete(Attachment $attachment): bool
    {
        return $attachment->delete();
    }
}