<?php

namespace App\Repositories;

use App\Repositories\Contracts\NotificationRepositoryInterface;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Notifications\DatabaseNotification;

class NotificationRepository implements NotificationRepositoryInterface
{
    public function getForUser(string $notifiableId, int $perPage = 15): LengthAwarePaginator
    {
        return DatabaseNotification::where('notifiable_id', $notifiableId)
            ->where('notifiable_type', \App\Models\User::class)
            ->latest()
            ->paginate($perPage);
    }

    public function findForUser(string $notificationId, string $notifiableId): ?DatabaseNotification
    {
        return DatabaseNotification::where('id', $notificationId)
            ->where('notifiable_id', $notifiableId)
            ->where('notifiable_type', \App\Models\User::class)
            ->first();
    }

    public function delete(DatabaseNotification $notification): bool
    {
        return $notification->delete();
    }
}