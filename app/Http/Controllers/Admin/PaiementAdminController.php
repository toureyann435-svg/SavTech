<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Commande;
use App\Models\Paiement;
use App\Models\Item_commande;

class PaiementAdminController extends Controller
{
    public function index(){
        $paiements = Paiement::all();

        $total_paiement = Paiement::where('status', 'Paye')->sum('montant');

        $paiement_attente = Paiement::where('status', 'En attente')->count();

        $paiement_ligne = Paiement::where('id_type_paiement', function ($query){
            $query->select('id')->from('type_paiements')->where('type_paiement', 'Paiement en ligne');
        })->count();

        $paiement_sur_place = Paiement::where('id_type_paiement', function ($query){
            $query->select('id')->from('type_paiements')->where('type_paiement', 'Paiement sur place');
        })->count();
        return view('Admin.Paiement.index', compact('total_paiement', 'paiement_attente', 'paiement_ligne', 'paiement_sur_place', 'paiements'));
    }
}
