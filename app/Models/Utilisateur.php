<?php

namespace App\Models;

use Laravel\Sanctum\HasApiTokens;
use App\Models\Scopes\Searchable;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Utilisateur extends Authenticatable
{
    use HasRoles;
    use Notifiable;
    use HasFactory;
    use Searchable;
    use SoftDeletes;
    use HasApiTokens;

    protected $fillable = [
        'nom',
        'prenom',
        'email',
        'password',
        'lieu_naissance',
        'profession',
        'identifiant_perso',
        'avatar',
        'sexe',
        'ville_residence',
        'code_parainage',
        'preference',
        'piece_identite',
        'cni',
        'numero_imatriculation',
        'agence',
    ];

    protected $searchableFields = ['*'];

    protected $hidden = ['password', 'remember_token'];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'preference' => 'array',
        'agence' => 'array',
    ];

    public function caisses()
    {
        return $this->hasMany(Caisse::class);
    }

    public function modePaiements()
    {
        return $this->hasMany(ModePaiement::class);
    }

    public function isSuperAdmin(): bool
    {
        return $this->hasRole('super-admin');
    }
}
