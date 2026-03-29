<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Enfant extends Model
{
    use HasFactory;

    protected $table = 'enfants';

    protected $fillable = [
        'famille_id',
        'prenom',
        'nom_famille',
        'date_naissance',
        'genre',
        'chemin_photo',
        'notes',
        'notes_medicales',
    ];

    protected function casts(): array
    {
        return [
            'date_naissance' => 'date',
        ];
    }

    public function famille(): BelongsTo
    {
        return $this->belongsTo(Famille::class, 'famille_id');
    }

    public function taches(): HasMany
    {
        return $this->hasMany(Tache::class, 'enfant_id');
    }
}
