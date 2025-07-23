<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

/**
 * @property int $id
 * @property string $role
 * @property string $nom_entreprise
 * @property string $email
 * @property string $password
 * @property string $nom_contact
 * @property string $telephone
 * @property string $adresse
 * @property string $siret
 * @property string|null $description
 * @property string|null $logo_url
 */
class Utilisateur extends Authenticatable
{
    use Notifiable;

    protected $table = 'utilisateurs';

    protected $fillable = [
        'nom_entreprise',
        'email',
        'password',
        'role',
        'nom_contact',
        'telephone',
        'adresse',
        'siret',
        'description',
        'logo_url',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'role' => 'string',
    ];

    public function stands(): HasMany
    {
        return $this->hasMany(Stand::class, 'utilisateur_id');
    }

    public function produits(): HasMany
    {
        return $this->hasMany(Produit::class, 'utilisateur_id');
    }

    // Méthodes d'aide pour les rôles
    public function isAdmin(): bool
    {
        return $this->role === 'admin';
    }

    public function isEntrepreneurApprouve(): bool
    {
        return $this->role === 'entrepreneur_approuve';
    }

    public function isEnAttente(): bool
    {
        return $this->role === 'entrepreneur_en_attente';
    }
}