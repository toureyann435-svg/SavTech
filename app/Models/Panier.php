<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Item_panier;

class Panier extends Model
{
    protected $fillable = [
        'id_client'
    ];

    public function client(){
        return $this->belongsTo(User::class, 'id_client');
    }

    public function item_panier(){
        return $this->hasMany(Item_panier::class, 'id_panier');
    }
}
