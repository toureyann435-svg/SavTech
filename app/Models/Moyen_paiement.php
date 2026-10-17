<?php

namespace App\Models;
use App\Models\Paiement;

use Illuminate\Database\Eloquent\Model;

class Moyen_paiement extends Model
{
    protected $fillable = [
        'moyen_paiement'
    ];

    public function paiement(){
        return $this->hasMany(Paiement::class, 'id_moyen_paiement');
    }
}
