<?php

namespace Tests\Feature\Api;

use App\Models\Task;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class CommentApiTest extends TestCase
{
    use RefreshDatabase;

    public function test_parent_and_assigned_nanny_can_access_task_comments(): void
    {
        $parent = User::factory()->create([
            'role' => 'parent',
            'is_active' => true,
        ]);

        $nanny = User::factory()->create([
            'role' => 'nounou',
            'is_active' => true,
        ]);

        $task = Task::create([
            'title' => 'Task with comments',
            'created_by' => $parent->id,
            'assigned_to' => $nanny->id,
            'status' => 'pending',
            'priority' => 'medium',
        ]);

        $parentToken = auth('api')->login($parent);

        $storeResponse = $this->withHeaders([
            'Authorization' => 'Bearer ' . $parentToken,
        ])->postJson('/api/comments', [
            'task_id' => $task->id,
            'content' => 'Premier commentaire parent',
        ]);

        $storeResponse
            ->assertCreated()
            ->assertJsonPath('data.content', 'Premier commentaire parent');

        $nannyToken = auth('api')->login($nanny);

        $listResponse = $this->withHeaders([
            'Authorization' => 'Bearer ' . $nannyToken,
        ])->getJson('/api/tasks/' . $task->id . '/comments');

        $listResponse
            ->assertOk()
            ->assertJsonPath('data.data.0.content', 'Premier commentaire parent');
    }
}
