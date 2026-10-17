<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Models\Role;
use App\Models\Panier;
use App\Models\Commande;
use App\Models\Boutique;

class User extends Authenticatable
{
    protected $fillable = [
        'nom',
        'prenom',
        'numero_telephone',
        'password',
        'id_role',
        'otp',
        'otp_expiration',
    ];

    public function role()
    {
        return $this->belongsTo(Role::class, 'id_role');
    }

    public function panier(){
        return $this->hasOne(Panier::class, 'id_client');
    }

    public function commande(){
        return $this->hasMany(Commande::class, 'id_client');
    }

    public function boutique(){
        return $this->hasOne(Boutique::class, 'id_proprietaire');
    }
}
