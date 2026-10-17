<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Produit;

class StockAdminController extends Controller
{
    public function index(Request $request){
        if($request->statut === null || $request->statut == 'tous'){
            $produits = Produit::all();
        }
        elseif($request->statut == 'enstock'){
            $produits = Produit::where('quantite', '>', 5)->get();
        }
        elseif($request->statut == 'faible'){
            $produits = Produit::whereBetween('quantite', [1 , 5])->get();
        }
        else{
            $produits = Produit::where('quantite', '=', 0)->get();
        }

        $total_produits = Produit::count();
        $produits_en_stock = Produit::where('quantite', '>', 5)->count();
        $produits_stock_critique = Produit::whereBetween('quantite', [1, 5])->count();
        $produits_rupture = Produit::where('quantite', '=', 0)->count();
        $valeur_totale = Produit::sum(\DB::raw('prix * quantite'));
        return view('Admin.Stock.index', compact('total_produits', 'produits_en_stock', 'produits_stock_critique', 'produits_rupture', 'produits', 'valeur_totale'  ));
    }

    public function updatestock(Request $request, Produit $produit){
        $validate = $request->validate([
            'quantite' => ['nullable', 'min:0'],
        ]);

        $produit->update([
            'quantite' => $validate['quantite'] ?? $produit->quantite,
        ]);

        return redirect()->route('admin.stock')->with('success', 'Quantité mise à jour avec succès.');
    }
}
