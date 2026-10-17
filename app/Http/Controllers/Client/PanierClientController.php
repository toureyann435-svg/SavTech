<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Panier;
use App\Models\Item_panier;
use App\Models\Produit;


class PanierClientController extends Controller
{
    public function index(){
        $items_panier = Item_panier::where('id_panier', function ($query){
            $query->select('id')->from('paniers')->where('id_client', auth()->id());
        })->get();


        $sum_items_panier = Item_panier::where('id_panier', function ($query){
            $query->select('id')->from('paniers')->where('id_client', auth()->id());
        })->sum(DB::raw('prix_unitaire * quantite'));

        return view('Client.Panier.index', compact('items_panier', 'sum_items_panier'));
    }

    public function store(Produit $produit){
        
        $panier = Panier::where('id_client', auth()->id())->first();
        if(empty($panier)){
            $panier = Panier::create([
                'id_client' => auth()->id(),
            ]);
        }

        $item_panier = Item_panier::where('id_panier', $panier->id)->where('id_produit', $produit->id)->first();

        if(!empty($item_panier)){
            return redirect()->route('client.panier')->withErrors(['erreur' => 'Le produit est déjà dans votre panier']);
        }
        else{
            Item_panier::create([
                'id_panier' => $panier->id,
                'id_produit' => $produit->id,
                'prix_unitaire' => $produit->prix
            ]);

            return redirect()->route('client.panier')->with('success', 'Votre a été bien ajouté dans votre panier');
        }
    }

    public function delete_item_panier(Item_panier $item){
        $item->delete();
        return back()->with('success', 'Le produit a bien été supprimé');
    }

    public function delete_all_items(){
        $items = Item_panier::where('id_panier', function ($query){
            $query->select('id')->from('paniers')->where('id_client', auth()->id());
        })->delete();

        if($items > 0){
            return back()->with('success', 'Panier vidé avec succès');
        }
        else{
            return back()->withErrors(['erreur' => 'La panier est déjà vide']);
        }
    }

    public function action(Request $request, Item_panier $item){
        if($request->action === 'add'){
            $item->update([
                'quantite' => $item->quantite + 1
            ]);
            return redirect()->route('client.panier');
        }
        elseif($request->action === 'discrease'){
            $item->update([
                'quantite' => $item->quantite - 1
            ]);
            return redirect()->route('client.panier');
        }
        elseif($request->quantite){
            $item->update([
                'quantite' => $request->quantite,
            ]);
            return redirect()->route('client.panier');
        }
    }
}
