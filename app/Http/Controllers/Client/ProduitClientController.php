<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Produit;

class ProduitClientController extends Controller
{
    public function index(){
        $produits = Produit::all();
        return view('Client.Produit.index', compact('produits'));
    }
}
