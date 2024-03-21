<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Departement extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = ['nom'];

    protected $searchableFields = ['*'];

    public function communes()
    {
        return $this->hasMany(Commune::class);
    }
}
