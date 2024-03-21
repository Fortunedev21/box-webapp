<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Frequence extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = ['libelle', 'heure', 'jours', 'caisse_id'];

    protected $searchableFields = ['*'];

    protected $casts = [
        'jours' => 'array',
    ];

    public function caisse()
    {
        return $this->belongsTo(Caisse::class);
    }
}
