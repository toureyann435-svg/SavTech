<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Commande;
use App\Models\Item_commande;

class CommandeAdminController extends Controller
{
    public function index(Request $request){

        if($request->statut === null || $request->statut == "Tous"){
            $commandes = Commande::all();
        }
        elseif($request->statut !== null && $request->statut != "Tous"){
            $commandes = Commande::where('status', $request->statut)->get();
        }

        if($request->recherche){
            $commandes = Commande::where('code', 'like','%'. $request->recherche .'%')->get();
        }
        $total_commande = Commande::count();
        $commande_en_attente = Commande::where('status', 'En attente')->count();
        $commande_livree = Commande::where('status', 'Livré')->count();
        $commande_confirme = Commande::where('status', 'Confirmee')->count();
        $somme_commande = Commande::where('status', 'Confirmee')->orWhere('status', 'Livré')->sum('montant_total');
        return view('Admin.Commande.index', compact('commandes','total_commande','commande_en_attente', 'commande_livree', 'somme_commande', 'commande_confirme'));
    }

    public function statut_update(Commande $commande, Request $request){
        $validate = $request->validate([
            'statut' => ['string']
        ]);

        if($commande->status === $validate['statut']){
            return redirect()->route('admin.commande');
        }
        else{
           $commande->update([
             'status' => $validate['statut'],
           ]);
           return redirect()->route('admin.commande'); 
        }
    }
}
