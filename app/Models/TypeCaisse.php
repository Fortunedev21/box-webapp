<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class TypeCaisse extends Model
{
    use HasFactory;
    use Searchable;
    use SoftDeletes;

    protected $fillable = ['libelle', 'slug', 'status'];

    protected $searchableFields = ['*'];

    protected $table = 'type_caisses';

    public function caisses()
    {
        return $this->hasMany(Caisse::class);
    }
}
