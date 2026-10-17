<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Panier;
use App\Models\Produit;

class Item_panier extends Model
{
    protected $fillable = [
        'id_panier',
        'id_produit',
        'prix_unitaire',
        'quantite'
    ];

    public function panier(){
        return $this->belongsTo(Panier::class, 'id_panier');
    }

    public function produit(){
        return $this->belongsTo(Produit::class, 'id_produit');
    }
}
