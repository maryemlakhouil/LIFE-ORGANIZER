<?php

namespace App\Models;

use Database\Factories\UtilisateurFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    /** @use HasFactory<UtilisateurFactory> */
    use HasFactory, Notifiable;

    protected $table = 'users';

    protected $fillable = [
        'nom',
        'prenom',
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

    public function familles()
    {
        return $this->belongsToMany(Famille::class, 'famille_utilisateur')
            ->withPivot(['role', 'est_contact_principal', 'invite_le', 'accepte_le'])
            ->withTimestamps();
    }

    public function famillesCreees()
    {
        return $this->hasMany(Famille::class, 'cree_par');
    }

    public function tachesCreees()
    {
        return $this->hasMany(Tache::class, 'creee_par');
    }

    public function tachesAttribuees()
    {
        return $this->hasMany(Tache::class, 'attribuee_a');
    }

    public function suivisTaches()
    {
        return $this->hasMany(SuiviTache::class, 'acteur_id');
    }

    public function conversations()
    {
        return $this->belongsToMany(Conversation::class, 'participants_conversation')
            ->withPivot(['rejoint_a', 'dernier_lu_a', 'archive_a', 'est_muet'])
            ->withTimestamps();
    }

    public function messages()
    {
        return $this->hasMany(Message::class, 'expediteur_id');
    }

    public function Attachments()
    {
        return $this->hasMany(PieceJointe::class, 'televerse_par');
    }

    public function avisEnvoyes()
    {
        return $this->hasMany(Avis::class, 'auteur_id');
    }

    public function avisRecus()
    {
        return $this->hasMany(Avis::class, 'cible_id');
    }
}
