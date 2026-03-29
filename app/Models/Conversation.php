<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Conversation extends Model
{
    use HasFactory;

    protected $table = 'conversations';

    protected $fillable = [
        'famille_id',
        'creee_par',
        'type',
        'titre',
    ];

    public function famille(): BelongsTo
    {
        return $this->belongsTo(Famille::class, 'famille_id');
    }

    public function createur(): BelongsTo
    {
        return $this->belongsTo(Utilisateur::class, 'creee_par');
    }

    public function participants(): BelongsToMany
    {
        return $this->belongsToMany(Utilisateur::class, 'participants_conversation')
            ->withPivot(['rejoint_a', 'dernier_lu_a', 'archive_a', 'est_muet'])
            ->withTimestamps();
    }

    public function messages(): HasMany
    {
        return $this->hasMany(Message::class, 'conversation_id');
    }
}
