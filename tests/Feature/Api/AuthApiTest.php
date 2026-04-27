<?php

namespace Tests\Feature\Api;

use App\Models\Family;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class AuthApiTest extends TestCase
{
    use RefreshDatabase;

    public function test_user_can_register_with_jwt_token(): void
    {
        $response = $this->postJson('/api/auth/register', [
            'name' => 'Parent Test',
            'email' => 'parent@example.com',
            'password' => 'password123',
            'password_confirmation' => 'password123',
            'role' => 'parent',
        ]);

        $response
            ->assertCreated()
            ->assertJsonStructure([
                'message',
                'user' => ['id', 'name', 'email', 'role'],
                'access_token',
                'token_type',
                'expires_in',
            ]);

        $this->assertDatabaseHas('families', [
            'name' => 'Famille Parent Test',
        ]);

        $family = Family::where('name', 'Famille Parent Test')->first();

        $this->assertNotNull($family);
        $this->assertDatabaseHas('family_user', [
            'family_id' => $family->id,
            'user_id' => $response->json('user.id'),
        ]);
    }
}
