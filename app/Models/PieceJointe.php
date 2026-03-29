<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class PieceJointe extends Model
{
    use HasFactory;

    protected $table = 'pieces_jointes';

    protected $fillable = [
        'televerse_par',
        'disque',
        'chemin',
        'nom_original',
        'type_mime',
        'taille',
        'metadonnees',
    ];

    protected function casts(): array
    {
        return [
            'metadonnees' => 'array',
        ];
    }

    public function joignable(): MorphTo
    {
        return $this->morphTo();
    }

    public function televerseur(): BelongsTo
    {
        return $this->belongsTo(Utilisateur::class, 'televerse_par');
    }
}
