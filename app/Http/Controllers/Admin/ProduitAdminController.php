<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Produit;

class ProduitAdminController extends Controller
{
    public function index(){
        $produits = Produit::all();
        return view('Admin.Produit.index', compact('produits'));
    }

    public function create(){
        return view('Admin.Produit.create');
    }

    public function store(Request $request){
        $validate = $request->validate([
            'nom' => ['required', 'string', 'max:255'],
            'categorie' => ['required', 'string', 'max:255'],
            'prix' => ['required', 'numeric', 'min:0'],
            'etat' => ['required', 'string', 'in:Neuf,Occasion'],
            'quantite' => ['required', 'numeric', 'min:0'],
            'caracteristiques' => ['required', 'string'],
            'photo1' => ['required', 'image', 'mimes:jpeg,png,jpg,gif,svg', 'max:2048'],
            'photo2' => ['nullable', 'image', 'mimes:jpeg,png,jpg,gif,svg', 'max:2048'],
            'photo3' => ['nullable', 'image', 'mimes:jpeg,png,jpg,gif,svg', 'max:2048']
        ]);

        if($validate['photo1']){
            $photo1path = $request->file('photo1')->store('produits', 'public');
            $validate['photo1'] = $photo1path;
        }

        if(isset($validate['photo2']) && $validate['photo2']){
            $photo2path = $request->file('photo2')->store('produits', 'public');
            $validate['photo2'] = $photo2path;
        }

        if(isset($validate['photo3']) && $validate['photo3']){
            $photo3path = $request->file('photo3')->store('produits', 'public');
            $validate['photo3'] = $photo3path;
        }

        $produit = Produit::create([
            'nom_produit' => $validate['nom'],
            'categorie' => $validate['categorie'],
            'prix' => $validate['prix'],
            'etat' => $validate['etat'],
            'caracteristiques' => $validate['caracteristiques'],
            'quantite' => $validate['quantite'],
            'photo_1' => $validate['photo1'],
            'photo_2' => ($validate['photo2'] ?? null),
            'photo_3' => ($validate['photo3'] ?? null)
        ]);
        return redirect()->route('admin.produit')->with('success', 'Produit ajouté avec succès.');
    }

    public function edit_produit(Produit $produit){
        return view('Admin.Produit.edit', compact('produit'));
    }

    public function modify_produit(Produit $produit){
        $validate = request()->validate([
            'nom' => ['nullable', 'string', 'max:255'],
            'categorie' => ['nullable', 'string', 'max:255'],
            'prix' => ['nullable', 'numeric', 'min:0'],
            'etat' => ['nullable', 'string'],
            'quantite' => ['nullable', 'numeric', 'min:0'],
            'caracteristiques' => ['nullable', 'string'],
            'photo1' => ['nullable', 'image', 'mimes:jpeg,png,jpg,gif,svg', 'max:2048'],
            'photo2' => ['nullable', 'image', 'mimes:jpeg,png,jpg,gif,svg', 'max:2048'],
            'photo3' => ['nullable', 'image', 'mimes:jpeg,png,jpg,gif,svg', 'max:2048']
        ]);

        if(isset($validate['photo1']) && $validate['photo1']){
            $photo1path = request()->file('photo1')->store('produits', 'public');
            $validate['photo_1'] = $photo1path;
        }

        if(isset($validate['photo2']) && $validate['photo2']){
            $photo2path = request()->file('photo2')->store('produits', 'public');
            $validate['photo_2'] = $photo2path;
        }

        if(isset($validate['photo3']) && $validate['photo3']){
            $photo3path = request()->file('photo3')->store('produits', 'public');
            $validate['photo_3'] = $photo3path;
        }

        $produit->update([
            'nom_produit' => $validate['nom_produit'] ?? $produit->nom_produit,
            'categorie' => $validate['categorie'] ?? $produit->categorie,
            'prix' => $validate['prix'] ?? $produit->prix,
            'etat' => $validate['etat'] ?? $produit->etat,
            'caracteristiques' => $validate['caracteristiques'] ?? $produit->caracteristiques,
            'quantite' => $validate['quantite'] ?? $produit->quantite,
            'photo_1' => $validate['photo_1'] ?? $produit->photo_1,
            'photo_2' => $validate['photo_2'] ?? $produit->photo_2,
            'photo_3' => $validate['photo_3'] ?? $produit->photo_3
        ]);
        return redirect()->route('admin.produit')->with('success', 'Produit modifié avec succès.');
    }

    public function delete_produit(Produit $produit){
        $produit->delete();
        return back()->with('success', 'Produit supprimé avec succès.');
    }
}
