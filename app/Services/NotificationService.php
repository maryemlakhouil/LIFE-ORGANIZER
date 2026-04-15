<?php

namespace App\Services;

use App\Models\User;
use App\Repositories\Contracts\NotificationRepositoryInterface;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Notifications\DatabaseNotification;
use Illuminate\Support\Carbon;

class NotificationService
{
    public function __construct(
        protected NotificationRepositoryInterface $notificationRepository
    ) {}

    public function getAuthenticatedUserNotifications(User $user, int $perPage = 15): LengthAwarePaginator
    {
        return $this->notificationRepository->getForUser((string) $user->id, $perPage);
    }

    public function showNotification(User $user, string $notificationId): DatabaseNotification
    {
        $notification = $this->notificationRepository->findForUser($notificationId, (string) $user->id);

        if (! $notification) {
            throw new ModelNotFoundException('Notification introuvable.');
        }

        return $notification;
    }

    public function markAsRead(User $user, string $notificationId): DatabaseNotification
    {
        $notification = $this->notificationRepository->findForUser($notificationId, (string) $user->id);

        if (! $notification) {
            throw new ModelNotFoundException('Notification introuvable.');
        }

        if (! $notification->read_at) {
            $notification->markAsRead();
        }

        return $notification->fresh();
    }

    public function markAllAsRead(User $user): void
    {
        $user->unreadNotifications->markAsRead();
    }

    public function deleteNotification(User $user, string $notificationId): void
    {
        $notification = $this->notificationRepository->findForUser($notificationId, (string) $user->id);

        if (! $notification) {
            throw new ModelNotFoundException('Notification introuvable.');
        }

        $this->notificationRepository->delete($notification);
    }
}