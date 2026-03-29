<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\MorphMany;

class Tache extends Model
{
    use HasFactory;

    protected $table = 'taches';

    protected $fillable = [
        'famille_id',
        'enfant_id',
        'creee_par',
        'attribuee_a',
        'titre',
        'description',
        'frequence',
        'priorite',
        'statut',
        'est_recurrente',
        'regle_recurrence',
        'commence_a',
        'echeance_a',
        'terminee_a',
        'rappel_a',
    ];

    protected function casts(): array
    {
        return [
            'est_recurrente' => 'boolean',
            'commence_a' => 'datetime',
            'echeance_a' => 'datetime',
            'terminee_a' => 'datetime',
            'rappel_a' => 'datetime',
        ];
    }

    public function famille(): BelongsTo
    {
        return $this->belongsTo(Famille::class, 'famille_id');
    }

    public function enfant(): BelongsTo
    {
        return $this->belongsTo(Enfant::class, 'enfant_id');
    }

    public function createur(): BelongsTo
    {
        return $this->belongsTo(Utilisateur::class, 'creee_par');
    }

    public function assignee(): BelongsTo
    {
        return $this->belongsTo(Utilisateur::class, 'attribuee_a');
    }

    public function suivis(): HasMany
    {
        return $this->hasMany(SuiviTache::class, 'tache_id');
    }

    public function piecesJointes(): MorphMany
    {
        return $this->morphMany(PieceJointe::class, 'joignable');
    }
}
