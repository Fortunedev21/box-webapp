<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Commune extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = ['nom', 'departement_id'];

    protected $searchableFields = ['*'];

    public function departement()
    {
        return $this->belongsTo(Departement::class);
    }

    public function structureFinancieres()
    {
        return $this->belongsToMany(StructureFinanciere::class, 'agence');
    }
}
