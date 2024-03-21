<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class StructureFinanciere extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = [
        'identifiant',
        'denomination',
        'date_creation',
        'immatriculation',
        'email',
        'siege_social',
        'agrement',
        'site_internet',
        'statut_juridique',
        'numero_inscription',
        'boite_postal',
        'phone',
        'cellulaire',
        'fax',
        'taux_interet',
        'delai_retrait_fond',
        'avatar',
    ];

    protected $searchableFields = ['*'];

    protected $table = 'structure_financieres';

    public $timestamps = false;

    protected $casts = [
        'date_creation' => 'date',
        'immatriculation' => 'array',
        'phone' => 'array',
        'cellulaire' => 'array',
        'fax' => 'array',
    ];

    public function caisses()
    {
        return $this->hasMany(Caisse::class);
    }

    public function communes()
    {
        return $this->belongsToMany(Commune::class, 'agence');
    }
}
