<?php

namespace Tests\Feature\Api;

use App\Events\CallInvited;
use App\Events\CallSignalSent;
use App\Models\Conversation;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Event;
use Tests\TestCase;

class CallApiTest extends TestCase
{
    use RefreshDatabase;

    public function test_authenticated_conversation_participant_can_start_a_call_and_send_signal(): void
    {
        Event::fake([CallInvited::class, CallSignalSent::class]);

        $caller = User::factory()->create([
            'role' => 'parent',
            'is_active' => true,
        ]);

        $receiver = User::factory()->create([
            'role' => 'nounou',
            'is_active' => true,
        ]);

        $conversation = Conversation::create([
            'created_by' => $caller->id,
            'type' => 'direct',
        ]);

        $conversation->users()->attach([$caller->id, $receiver->id]);

        $token = auth('api')->login($caller);
        $headers = ['Authorization' => 'Bearer '.$token];

        $startResponse = $this->withHeaders($headers)->postJson(
            "/api/conversations/{$conversation->id}/calls/start",
            [
                'type' => 'video',
                'target_user_id' => $receiver->id,
            ]
        );

        $startResponse
            ->assertCreated()
            ->assertJsonPath('data.type', 'video')
            ->assertJsonPath('data.target_user.id', $receiver->id);

        $callId = $startResponse->json('data.call_id');

        $signalResponse = $this->withHeaders($headers)->postJson(
            "/api/conversations/{$conversation->id}/calls/{$callId}/signal",
            [
                'signal_type' => 'offer',
                'signal' => [
                    'sdp' => 'fake-sdp',
                    'type' => 'offer',
                ],
                'target_user_id' => $receiver->id,
            ]
        );

        $signalResponse
            ->assertOk()
            ->assertJsonPath('data.signal_type', 'offer')
            ->assertJsonPath('data.target_user.id', $receiver->id);

        Event::assertDispatched(CallInvited::class);
        Event::assertDispatched(CallSignalSent::class);
    }
}
