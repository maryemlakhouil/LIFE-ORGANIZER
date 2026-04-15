<?php

namespace App\Repositories\Contracts;

use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Notifications\DatabaseNotification;

interface NotificationRepositoryInterface
{
    public function getForUser(string $notifiableId, int $perPage = 15): LengthAwarePaginator;

    public function findForUser(string $notificationId, string $notifiableId): ?DatabaseNotification;

    public function delete(DatabaseNotification $notification): bool;
}