<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Item_commande;
use App\Models\Paiement;

class Commande extends Model
{
    protected $fillable = [
        'id_client',
        'code',
        'montant_total',
        'frais_livraison',
        'status'
    ];

    public function user(){
        return $this->belongsTo(User::class, 'id_client');
    }

    public function item_commande(){
        return $this->hasMany(Item_commande::class, 'id_cmd');
    }

    public function paiement(){
        return $this->hasOne(Paiement::class, 'id_commande');
    }
}
