<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Produit;
use App\Models\Panier;
use App\Models\Item_panier;
use App\Models\Commande;
use App\Models\Item_commande;

class CommandeClientController extends Controller
{
    public function index(Produit $produit){
        return view('Client.Commande.index', compact('produit'));
    }

    public function store(){
        $panier = Panier::where('id_client', auth()->id())->with('item_panier')->first();

        if($panier->item_panier->isNotEmpty()){

        
         $dernier_commande = Commande::latest('id')->first();
         $numero = $dernier_commande ?  $dernier_commande->id + 1 : 1;
         $code_commande = 'CMD-#'.str_pad($numero, 4, 0, STR_PAD_LEFT);

         $commande = Commande::create([
             'id_client' => auth()->id(),
             'code' => $code_commande,
             'frais_livraison' => 2000,
             'montant_total' => 0,
         ]);
         $montant_total = 0;
         foreach($panier->item_panier as $items){
             $montant_total = $montant_total + ($items->prix_unitaire * $items->quantite);

             Item_commande::create([
                 'id_cmd' => $commande->id,
                 'id_produit' => $items->id_produit,
                 'prix_unitaire' => $items->prix_unitaire,
                 'quantite' => $items->quantite
             ]);

             $produit = Produit::where('id', $items->id_produit)->first();

             $produit->decrement('quantite', $items->quantite);

             $items->delete();
         }

         $commande->update([
             'montant_total' => $montant_total
         ]);
            return redirect()->route('client.dashboard')->with('success', 'Commande effectué avec succès, veuillez attendre la confirmation du vendeur');
        }
        else{
            return redirect()->route('client.panier')->withErrors(['erreur_commande', 'Votre panier est vide']);
        }
    }


    public function update_status(Commande $commande){
        $commande->update([
            'status' => 'Livré'
        ]);

        $commande->paiement->update([
            'status' => "Paye",
        ]);

        return redirect()->route('client.dashboard');
    }

}
