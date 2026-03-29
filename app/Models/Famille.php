<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Famille extends Model
{
    use HasFactory;

    protected $table = 'familles';

    protected $fillable = [
        'cree_par',
        'nom',
        'fuseau_horaire',
        'notes',
    ];

    public function createur(): BelongsTo
    {
        return $this->belongsTo(Utilisateur::class, 'cree_par');
    }

    public function membres(): BelongsToMany
    {
        return $this->belongsToMany(Utilisateur::class, 'famille_utilisateur')
            ->withPivot(['role', 'est_contact_principal', 'invite_le', 'accepte_le'])
            ->withTimestamps();
    }

    public function enfants(): HasMany
    {
        return $this->hasMany(Enfant::class, 'famille_id');
    }

    public function taches(): HasMany
    {
        return $this->hasMany(Tache::class, 'famille_id');
    }

    public function conversations(): HasMany
    {
        return $this->hasMany(Conversation::class, 'famille_id');
    }

    public function avis(): HasMany
    {
        return $this->hasMany(Avis::class, 'famille_id');
    }
}
