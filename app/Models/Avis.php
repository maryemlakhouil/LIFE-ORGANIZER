<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Avis extends Model
{
    use HasFactory;

    protected $table = 'avis';

    protected $fillable = [
        'famille_id',
        'tache_id',
        'auteur_id',
        'cible_id',
        'note',
        'comment',
        'soumis_a',
    ];

    protected function casts(): array
    {
        return [
            'soumis_a' => 'datetime',
        ];
    }

    public function famille(): BelongsTo
    {
        return $this->belongsTo(Famille::class, 'famille_id');
    }

    public function tache(): BelongsTo
    {
        return $this->belongsTo(Tache::class, 'tache_id');
    }

    public function auteur(): BelongsTo
    {
        return $this->belongsTo(Utilisateur::class, 'auteur_id');
    }

    public function cible(): BelongsTo
    {
        return $this->belongsTo(Utilisateur::class, 'cible_id');
    }
}
