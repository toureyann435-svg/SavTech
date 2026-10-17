<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Commande;
use App\Models\Item_commande;

class ClientController extends Controller
{
    public function dashboard(){
        $commandes = Commande::where('id_client', auth()->id())->with('item_commande')->get();
        $commande_en_attente = Commande::where('status', 'En attente')->count();
        $commande_livree = Commande::where('status', 'Livré')->count();
        return view('Client.dashboard', compact('commande_en_attente', 'commandes', 'commande_livree'));
    }

    public function service(){
        return view('Client.Pages.services');
    }

    public function propos(){
        return view('Client.Pages.propos');
    }

    public function contact(){
        return view('Client.Pages.contact');
    }
}
