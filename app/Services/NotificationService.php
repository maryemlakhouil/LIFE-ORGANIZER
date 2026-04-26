<?php

namespace App\Services;

use App\Models\User;
use App\Notifications\NannyReservationRequestNotification;
use App\Notifications\NannyReservationResponseNotification;
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

    public function respondToReservation(User $user, string $notificationId, string $status): DatabaseNotification
    {
        $notification = $this->notificationRepository->findForUser($notificationId, (string) $user->id);

        if (! $notification) {
            throw new ModelNotFoundException('Notification introuvable.');
        }

        if ($notification->type !== NannyReservationRequestNotification::class) {
            throw new ModelNotFoundException('Cette notification ne peut pas etre traitee.');
        }

        $data = $notification->data;
        $currentStatus = $data['status'] ?? 'pending';

        if ($currentStatus !== 'pending') {
            throw new ModelNotFoundException('Cette demande a deja ete traitee.');
        }

        $data['status'] = $status;
        $data['responded_at'] = now()->toDateTimeString();
        $data['responded_by'] = $user->id;

        $notification->data = $data;

        if (! $notification->read_at) {
            $notification->markAsRead();
        }

        $notification->save();

        $parentId = $data['parent_id'] ?? null;
        $parent = $parentId ? User::find($parentId) : null;

        if ($parent) {
            $parent->notify(new NannyReservationResponseNotification($user, $status));
        }

        return $notification->fresh();
    }
}
