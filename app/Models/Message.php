<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphMany;

class Message extends Model
{
    use HasFactory;

    protected $table = 'messages';

    protected $fillable = [
        'conversation_id',
        'expediteur_id',
        'type',
        'contenu',
        'modifie_a',
        'supprime_a',
    ];

    protected function casts(): array
    {
        return [
            'modifie_a' => 'datetime',
            'supprime_a' => 'datetime',
        ];
    }

    public function conversation(): BelongsTo
    {
        return $this->belongsTo(Conversation::class);
    }

    public function expediteur(): BelongsTo
    {
        return $this->belongsTo(Utilisateur::class, 'expediteur_id');
    }

    public function piecesJointes(): MorphMany
    {
        return $this->morphMany(PieceJointe::class, 'joignable');
    }
}
