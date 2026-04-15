<?php

namespace App\Providers;

use App\Repositories\Contracts\TaskRepositoryInterface;
use App\Repositories\Contracts\FamilyRepositoryInterface;
use App\Repositories\Contracts\ChildRepositoryInterface;
use App\Repositories\Contracts\CommentRepositoryInterface;
use App\Repositories\Contracts\SubTaskRepositoryInterface;
use App\Repositories\Contracts\AttachmentRepositoryInterface;
use App\Repositories\Contracts\ConversationRepositoryInterface;
use App\Repositories\Contracts\MessageRepositoryInterface;
use App\Repositories\Contracts\NotificationRepositoryInterface;

use App\Repositories\MessageRepository;
use App\Repositories\ConversationRepository;
use App\Repositories\AttachmentRepository;
use App\Repositories\SubTaskRepository;
use App\Repositories\CommentRepository;
use App\Repositories\ChildRepository;
use App\Repositories\TaskRepository;
use App\Repositories\FamilyRepository;
use Illuminate\Support\ServiceProvider;
use App\Repositories\NotificationRepository;



class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->bind(TaskRepositoryInterface::class, TaskRepository::class);
        $this->app->bind(FamilyRepositoryInterface::class, FamilyRepository::class);
        $this->app->bind(ChildRepositoryInterface::class, ChildRepository::class);
        $this->app->bind(CommentRepositoryInterface::class, CommentRepository::class);
        $this->app->bind(SubTaskRepositoryInterface::class, SubTaskRepository::class);
        $this->app->bind(AttachmentRepositoryInterface::class, AttachmentRepository::class);
        $this->app->bind(ConversationRepositoryInterface::class, ConversationRepository::class);
        $this->app->bind(MessageRepositoryInterface::class, MessageRepository::class);
        $this->app->bind(NotificationRepositoryInterface::class, NotificationRepository::class);

    }

    public function boot(): void
    {
        //
    }
}
