<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Transaction extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = [
        'montant',
        'identifiant_transation',
        'identifiant_paiement',
        'date_transaction',
        'status',
        'caisse_id',
    ];

    protected $searchableFields = ['*'];

    protected $casts = [
        'date_transaction' => 'datetime',
    ];

    public function caisse()
    {
        return $this->belongsTo(Caisse::class);
    }
}
