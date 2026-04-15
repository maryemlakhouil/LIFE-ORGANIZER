<?php

namespace App\Repositories\Contracts;

use App\Models\Attachment;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

interface AttachmentRepositoryInterface
{
    public function create(array $data): Attachment;

    public function findById(int $id): ?Attachment;

    public function findByIdWithRelations(int $id): ?Attachment;

    public function getByTask(int $taskId, int $perPage = 10): LengthAwarePaginator;

    public function getByMessage(int $messageId, int $perPage = 10): LengthAwarePaginator;

    public function delete(Attachment $attachment): bool;

}