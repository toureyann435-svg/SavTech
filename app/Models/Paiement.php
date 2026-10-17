<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Moyen_paiement;
use App\Models\Type_paiement;
use App\Models\Commande;

class Paiement extends Model
{
    protected $fillable = [
        'id_commande',
        'id_type_paiement',
        'id_moyen_paiement',
        'montant',
        'date',
        'reference',
        'status'
    ];

    public function moyen_paiement(){
        return $this->belongsTo(Moyen_paiement::class, 'id_moyen_paiement');
    }

    public function type_paiement(){
        return $this->belongsTo(Type_paiement::class, 'id_type_paiement');
    }

    public function commande(){
        return $this->belongsTo(Commande::class, 'id_commande');
    }
}
