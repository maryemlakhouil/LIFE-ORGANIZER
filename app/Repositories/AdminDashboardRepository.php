<?php

namespace App\Repositories;

use App\Models\Child;
use App\Models\Comment;
use App\Models\Conversation;
use App\Models\Family;
use App\Models\Message;
use App\Models\Task;
use App\Models\User;
use App\Repositories\Contracts\AdminDashboardRepositoryInterface;
use Illuminate\Support\Carbon;

class AdminDashboardRepository implements AdminDashboardRepositoryInterface
{
    public function getDashboardStats(): array
    {
        $today = Carbon::today();
        $last7Days = Carbon::now()->subDays(7);

        return [
            'users' => [
                'total' => User::count(),
                'active' => User::where('is_active', true)->count(),
                'inactive' => User::where('is_active', false)->count(),
                'parents' => User::where('role', 'parent')->count(),
                'nannies' => User::where('role', 'nounou')->count(),
                'admins' => User::where('role', 'admin')->count(),
            ],

            'families' => [
                'total' => Family::count(),
            ],

            'children' => [
                'total' => Child::count(),
            ],

            'tasks' => [
                'total' => Task::count(),
                'pending' => Task::where('status', 'pending')->count(),
                'in_progress' => Task::where('status', 'in_progress')->count(),
                'completed' => Task::where('status', 'completed')->count(),
                'cancelled' => Task::where('status', 'cancelled')->count(),
                'overdue' => Task::whereNotNull('due_date')
                    ->whereDate('due_date', '<', $today)
                    ->whereIn('status', ['pending', 'in_progress'])
                    ->count(),
            ],

            'communication' => [
                'conversations' => Conversation::count(),
                'messages' => Message::count(),
                'comments' => Comment::count(),
            ],

            'recent_activity' => [
                'new_users_last_7_days' => User::where('created_at', '>=', $last7Days)->count(),
                'new_families_last_7_days' => Family::where('created_at', '>=', $last7Days)->count(),
                'new_tasks_last_7_days' => Task::where('created_at', '>=', $last7Days)->count(),
                'new_messages_last_7_days' => Message::where('created_at', '>=', $last7Days)->count(),
                'new_comments_last_7_days' => Comment::where('created_at', '>=', $last7Days)->count(),
            ],

            'latest_comments' => Comment::with([
                'user:id,name,email',
                'task:id,title',
            ])
                ->latest()
                ->take(8)
                ->get()
                ->map(function (Comment $comment) {
                    return [
                        'id' => $comment->id,
                        'content' => $comment->content,
                        'created_at' => $comment->created_at,
                        'user' => $comment->user ? [
                            'id' => $comment->user->id,
                            'name' => $comment->user->name,
                            'email' => $comment->user->email,
                        ] : null,
                        'task' => $comment->task ? [
                            'id' => $comment->task->id,
                            'title' => $comment->task->title,
                        ] : null,
                    ];
                })
                ->values()
                ->all(),
        ];
    }
}
