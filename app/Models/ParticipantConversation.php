<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ParticipantConversation extends Model
{
    use HasFactory;

    protected $table = 'participants_conversation';

    protected $fillable = [
        'conversation_id',
        'utilisateur_id',
        'rejoint_a',
        'dernier_lu_a',
        'archive_a',
        'est_muet',
    ];

    protected function casts(): array
    {
        return [
            'rejoint_a' => 'datetime',
            'dernier_lu_a' => 'datetime',
            'archive_a' => 'datetime',
            'est_muet' => 'boolean',
        ];
    }

    public function conversation(): BelongsTo
    {
        return $this->belongsTo(Conversation::class);
    }

    public function utilisateur(): BelongsTo
    {
        return $this->belongsTo(Utilisateur::class, 'utilisateur_id');
    }
}
