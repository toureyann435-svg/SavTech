<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Commande;
use App\Models\Produit;

class Item_commande extends Model
{
    protected $fillable = [
        'id_cmd',
        'id_produit',
        'prix_unitaire',
        'quantite'
    ];

    public function commande(){
        return $this->belongsTo(Commande::class, 'id_cmd');
    }

    public function produit(){
        return $this->belongsTo(Produit::class, 'id_produit');
    }
}
