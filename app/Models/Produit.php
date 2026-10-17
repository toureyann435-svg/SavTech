<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Item_panier;
use App\Models\Item_commande;

class Produit extends Model
{
    protected $fillable = [
        'nom_produit',
        'caracteristiques',
        'prix',
        'categorie',
        'etat',
        'quantite',
        'photo_1',
        'photo_2',
        'photo_3',
        'status',
    ];

    public function item_panier(){
        return $this->hasMany(Item_panier::class, 'id_produit');
    }

    public function item_commande(){
        return $this->hasMany(Item_commande::class, 'id_cmd');
    }
}
