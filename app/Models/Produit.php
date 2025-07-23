<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * @property int $id
 * @property int $utilisateur_id
 * @property string $nom
 * @property string|null $description
 * @property float $prix
 * @property string|null $image_url
 * @property bool $est_disponible
 * @property \Illuminate\Support\Carbon $created_at
 * @property \Illuminate\Support\Carbon $updated_at
 */
class Produit extends Model
{
    protected $fillable = [
        'utilisateur_id',
        'nom',
        'description',
        'prix',
        'image_url',
        'est_disponible'
    ];

    protected $casts = [
        'prix' => 'decimal:2',
        'est_disponible' => 'boolean'
    ];

    public function utilisateur(): BelongsTo
    {
        return $this->belongsTo(Utilisateur::class, 'utilisateur_id');
    }
}