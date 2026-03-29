<?php

namespace App\Models;

use Database\Factories\UtilisateurFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Utilisateur extends Authenticatable
{
    /** @use HasFactory<UtilisateurFactory> */
    use HasFactory, Notifiable;

    protected $table = 'utilisateurs';

    protected $fillable = [
        'nom',
        'prenom',
        'nom_famille',
        'email',
        'telephone',
        'role',
        'chemin_avatar',
        'fuseau_horaire',
        'theme',
        'est_actif',
        'dernier_vu_a',
        'password',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'est_actif' => 'boolean',
            'dernier_vu_a' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function familles(): BelongsToMany
    {
        return $this->belongsToMany(Famille::class, 'famille_utilisateur')
            ->withPivot(['role', 'est_contact_principal', 'invite_le', 'accepte_le'])
            ->withTimestamps();
    }

    public function famillesCreees(): HasMany
    {
        return $this->hasMany(Famille::class, 'cree_par');
    }

    public function tachesCreees(): HasMany
    {
        return $this->hasMany(Tache::class, 'creee_par');
    }

    public function tachesAttribuees(): HasMany
    {
        return $this->hasMany(Tache::class, 'attribuee_a');
    }

    public function suivisTaches(): HasMany
    {
        return $this->hasMany(SuiviTache::class, 'acteur_id');
    }

    public function conversations(): BelongsToMany
    {
        return $this->belongsToMany(Conversation::class, 'participants_conversation')
            ->withPivot(['rejoint_a', 'dernier_lu_a', 'archive_a', 'est_muet'])
            ->withTimestamps();
    }

    public function messages(): HasMany
    {
        return $this->hasMany(Message::class, 'expediteur_id');
    }

    public function piecesJointesTeleversees(): HasMany
    {
        return $this->hasMany(PieceJointe::class, 'televerse_par');
    }

    public function avisEnvoyes(): HasMany
    {
        return $this->hasMany(Avis::class, 'auteur_id');
    }

    public function avisRecus(): HasMany
    {
        return $this->hasMany(Avis::class, 'cible_id');
    }
}
