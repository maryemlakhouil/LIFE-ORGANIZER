<?php

namespace Tests\Feature\Api;

use App\Models\Conversation;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ConversationApiTest extends TestCase
{
    use RefreshDatabase;

    public function test_parent_can_create_or_reuse_direct_conversation_with_nanny(): void
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

        $headers = [
            'Authorization' => 'Bearer ' . $token,
        ];

        $firstResponse = $this->withHeaders($headers)->postJson('/api/conversations', [
            'type' => 'direct',
            'participant_ids' => [$nanny->id],
        ]);

        $firstResponse
            ->assertCreated()
            ->assertJsonPath('data.type', 'direct');

        $firstConversationId = $firstResponse->json('data.id');

        $secondResponse = $this->withHeaders($headers)->postJson('/api/conversations', [
            'type' => 'direct',
            'participant_ids' => [$nanny->id],
        ]);

        $secondResponse
            ->assertCreated()
            ->assertJsonPath('data.id', $firstConversationId);

        $this->assertSame(1, Conversation::count());
    }
}
