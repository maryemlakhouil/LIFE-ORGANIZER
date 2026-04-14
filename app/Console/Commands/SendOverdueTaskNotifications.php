<?php

namespace App\Console\Commands;

use App\Models\Task;
use App\Models\User;
use App\Notifications\TaskOverdueNotification;
use Illuminate\Console\Command;
use Illuminate\Notifications\DatabaseNotification;
use Illuminate\Support\Carbon;

class SendOverdueTaskNotifications extends Command
{
    protected $signature = 'tasks:notify-overdue';
    protected $description = 'Envoyer des notifications pour les tâches en retard';

    public function handle(): int
    {
        $today = Carbon::today();

        $tasks = Task::whereNotNull('assigned_to')
            ->whereNotNull('due_date')
            ->whereDate('due_date', '<', $today)
            ->whereIn('status', ['pending', 'in_progress'])
            ->get();

        foreach ($tasks as $task) {
            $nanny = User::find($task->assigned_to);

            if (! $nanny || ! $nanny->is_active) {
                continue;
            }

            $alreadySentToday = DatabaseNotification::where('notifiable_id', (string) $nanny->id)
                ->where('notifiable_type', User::class)
                ->where('type', TaskOverdueNotification::class)
                ->whereDate('created_at', $today)
                ->where('data->type', 'task_overdue')
                ->where('data->task_id', $task->id)
                ->exists();

            if (! $alreadySentToday) {
                $nanny->notify(new TaskOverdueNotification($task));
            }
        }

        $this->info('Notifications des tâches en retard envoyées.');

        return self::SUCCESS;
    }
}