<?php

namespace Tests\Feature\Api;

use App\Models\User;
use App\Notifications\NannyReservationRequestNotification;
use App\Notifications\NannyReservationResponseNotification;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Notifications\DatabaseNotification;
use Tests\TestCase;

class NannyReservationApiTest extends TestCase
{
    use RefreshDatabase;

    public function test_authenticated_parent_can_send_reservation_request_to_nanny(): void
    {
        $parent = User::factory()->create([
            'role' => 'parent',
            'is_active' => true,
        ]);

        $nanny = User::factory()->create([
            'role' => 'nounou',
            'is_active' => true,
        ]);

        $token = auth('api')->login($parent);

        $response = $this->withHeaders([
            'Authorization' => 'Bearer ' . $token,
        ])->postJson('/api/nannies/' . $nanny->id . '/reserve');

        $response
            ->assertOk()
            ->assertJsonPath('message', 'La demande de réservation a été envoyée à la nounou.');

        $this->assertDatabaseHas('notifications', [
            'notifiable_id' => (string) $nanny->id,
            'notifiable_type' => User::class,
            'type' => NannyReservationRequestNotification::class,
        ]);
    }

    public function test_parent_cannot_send_duplicate_reservation_request_the_same_day(): void
    {
        $parent = User::factory()->create([
            'role' => 'parent',
            'is_active' => true,
        ]);

        $nanny = User::factory()->create([
            'role' => 'nounou',
            'is_active' => true,
        ]);

        DatabaseNotification::create([
            'id' => (string) str()->uuid(),
            'type' => NannyReservationRequestNotification::class,
            'notifiable_type' => User::class,
            'notifiable_id' => (string) $nanny->id,
            'data' => [
                'parent_id' => $parent->id,
                'title' => 'Nouvelle demande de réservation',
                'message' => 'Déjà envoyée.',
            ],
        ]);

        $token = auth('api')->login($parent);

        $response = $this->withHeaders([
            'Authorization' => 'Bearer ' . $token,
        ])->postJson('/api/nannies/' . $nanny->id . '/reserve');

        $response
            ->assertStatus(422)
            ->assertJsonPath('message', 'Une demande a déjà été envoyée aujourd’hui à cette nounou.');
    }

    public function test_nanny_can_accept_reservation_request(): void
    {
        $parent = User::factory()->create([
            'role' => 'parent',
            'is_active' => true,
        ]);

        $nanny = User::factory()->create([
            'role' => 'nounou',
            'is_active' => true,
        ]);

        $notification = DatabaseNotification::create([
            'id' => (string) str()->uuid(),
            'type' => NannyReservationRequestNotification::class,
            'notifiable_type' => User::class,
            'notifiable_id' => (string) $nanny->id,
            'data' => [
                'parent_id' => $parent->id,
                'parent_name' => $parent->name,
                'status' => 'pending',
            ],
        ]);

        $token = auth('api')->login($nanny);

        $response = $this->withHeaders([
            'Authorization' => 'Bearer ' . $token,
        ])->postJson('/api/notifications/' . $notification->id . '/reservation-response', [
            'status' => 'accepted',
        ]);

        $response
            ->assertOk()
            ->assertJsonPath('message', 'Demande de reservation acceptee.');

        $this->assertDatabaseHas('notifications', [
            'id' => $notification->id,
            'type' => NannyReservationRequestNotification::class,
        ]);

        $updated = DatabaseNotification::find($notification->id);
        $this->assertSame('accepted', $updated->data['status']);

        $this->assertDatabaseHas('notifications', [
            'notifiable_id' => (string) $parent->id,
            'notifiable_type' => User::class,
            'type' => NannyReservationResponseNotification::class,
        ]);
    }
}
