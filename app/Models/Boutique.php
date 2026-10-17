<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Boutique extends Model
{
    protected $fillable = [
        'id_proprietaire',
        'nom_boutique',
        'slogan',
        'numero_boutique',
        'numero_whatsapp',
        'email_boutique',
        'adresse_boutique',
        'heure_ouverture',
        'photo_1_boutique',
        'photo_2_boutique',
        'photo_3_boutique',
        'categorie_boutique',
    ];

    public function user(){
        return $this->belongsTo(User::class, 'id_proprietaire');
    }
}
