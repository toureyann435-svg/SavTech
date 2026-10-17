<?php

namespace App\Models;
use App\Models\Paiement;

use Illuminate\Database\Eloquent\Model;

class Type_paiement extends Model
{
    protected $fillable = [
        'type_paiement'
    ];

    public function paiement(){
        return $this->hasMany(Paiement::class, 'id_type_paiement');
    }
}
