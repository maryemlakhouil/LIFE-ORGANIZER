<?php

namespace App\Notifications;

use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class NannyReservationResponseNotification extends Notification
{
    use Queueable;

    public function __construct(
        protected User $nanny,
        protected string $status
    ) {}

    public function via(object $notifiable): array
    {
        return ['database'];
    }

    public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage)
            ->line('The introduction to the notification.')
            ->action('Notification Action', url('/'))
            ->line('Thank you for using our application!');
    }

    public function toArray(object $notifiable): array
    {
        $accepted = $this->status === 'accepted';

        return [
            'type' => 'nanny_reservation_response',
            'title' => $accepted ? 'Réservation acceptée' : 'Réservation refusée',
            'message' => $accepted
                ? "{$this->nanny->name} a accepté votre demande de réservation."
                : "{$this->nanny->name} a refusé votre demande de réservation.",
            'nanny_id' => $this->nanny->id,
            'nanny_name' => $this->nanny->name,
            'nanny_email' => $this->nanny->email,
            'status' => $this->status,
            'responded_at' => now()->toDateTimeString(),
        ];
    }
}
