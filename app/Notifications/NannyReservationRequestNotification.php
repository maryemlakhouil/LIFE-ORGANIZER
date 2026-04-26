<?php

namespace App\Notifications;

use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class NannyReservationRequestNotification extends Notification
{
    use Queueable;

    public function __construct(
        protected User $parent,
        protected array $familyNames = []
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
        $familyLabel = count($this->familyNames) > 0
            ? implode(', ', $this->familyNames)
            : 'Famille non précisée';

        return [
            'type' => 'nanny_reservation_request',
            'title' => 'Nouvelle demande de réservation',
            'message' => "{$this->parent->name} souhaite réserver votre profil nounou.",
            'status' => 'pending',
            'parent_id' => $this->parent->id,
            'parent_name' => $this->parent->name,
            'parent_email' => $this->parent->email,
            'family_names' => $this->familyNames,
            'family_label' => $familyLabel,
            'requested_at' => now()->toDateTimeString(),
        ];
    }
}
