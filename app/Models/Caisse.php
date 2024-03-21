<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Caisse extends Model
{
    use HasFactory;
    use Searchable;
    use SoftDeletes;

    protected $fillable = [
        'identifiant',
        'intitule',
        'date_debut',
        'date_echeance',
        'solde_actuel',
        'status',
        'utilisateur_id',
        'type_caisse_id',
        'structure_financiere_id',
    ];

    protected $searchableFields = ['*'];

    protected $casts = [
        'date_debut' => 'datetime',
        'date_echeance' => 'datetime',
    ];

    public function utilisateur()
    {
        return $this->belongsTo(Utilisateur::class);
    }

    public function transactions()
    {
        return $this->hasMany(Transaction::class);
    }

    public function typeCaisse()
    {
        return $this->belongsTo(TypeCaisse::class);
    }

    public function frequence()
    {
        return $this->hasOne(Frequence::class);
    }

    public function structureFinanciere()
    {
        return $this->belongsTo(StructureFinanciere::class);
    }
}
