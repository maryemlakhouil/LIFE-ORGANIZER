<?php

use Illuminate\Support\Facades\Broadcast;
use App\Models\Conversation;
use App\Models\User;

Broadcast::channel('App.Models.User.{id}', function ($user, $id) {
    return (int) $user->id === (int) $id;
});


Broadcast::channel('conversation.{conversationId}', function (User $user, int $conversationId) {
    $isParticipant = Conversation::where('id', $conversationId)
        ->whereHas('users', function ($query) use ($user) {
            $query->where('users.id', $user->id);
        })
        ->exists();

    if (! $isParticipant) {
        return false;
    }

    return [
        'id' => $user->id,
        'name' => $user->name,
        'photo' => $user->photo,
        'role' => $user->role,
    ];
}, ['guards' => ['api']]);
