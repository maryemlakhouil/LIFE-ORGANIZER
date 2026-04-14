<?php

namespace Tests\Feature\Api;

use App\Models\Task;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class TaskApiTest extends TestCase
{
    use RefreshDatabase;

    public function test_authenticated_parent_can_list_and_create_tasks(): void
    {
        $user = User::factory()->create([
            'role' => 'parent',
            'is_active' => true,
        ]);

        Task::create([
            'title' => 'Existing task',
            'created_by' => $user->id,
            'status' => 'pending',
            'priority' => 'medium',
        ]);

        $token = auth('api')->login($user);

        $headers = [
            'Authorization' => 'Bearer '.$token,
        ];

        $listResponse = $this->withHeaders($headers)->getJson('/api/tasks');

        $listResponse
            ->assertOk()
            ->assertJsonPath('data.data.0.title', 'Existing task');

        $storeResponse = $this->withHeaders($headers)->postJson('/api/tasks', [
            'title' => 'New task',
            'description' => 'Task from API',
            'priority' => 'high',
            'status' => 'pending',
        ]);

        $storeResponse
            ->assertCreated()
            ->assertJsonPath('data.title', 'New task');
    }
}
