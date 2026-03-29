<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class SuiviTache extends Model
{
    use HasFactory;

    protected $table = 'suivis_taches';

    protected $fillable = [
        'tache_id',
        'acteur_id',
        'statut_precedent',
        'statut_actuel',
        'note',
        'modifie_a',
    ];

    protected function casts(): array
    {
        return [
            'modifie_a' => 'datetime',
        ];
    }

    public function tache(): BelongsTo
    {
        return $this->belongsTo(Tache::class, 'tache_id');
    }

    public function acteur(): BelongsTo
    {
        return $this->belongsTo(Utilisateur::class, 'acteur_id');
    }
}
