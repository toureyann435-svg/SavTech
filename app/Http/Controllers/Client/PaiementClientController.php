<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Commande;
use App\Models\Paiement;
use App\Models\Type_paiement;
use App\Models\Moyen_paiement;
use Carbon\Carbon;

class PaiementClientController extends Controller
{
    public function index_boutique(){
        $id_commande = session('id_commande');
        $commande = Commande::where('id', $id_commande)->first();
        $code_retrait = 'SAV-'.random_int(1000, 9999);
        session(['code_retrait' => $code_retrait]);
        return view('Client.Paiement.index_boutique', compact('commande', 'code_retrait'));
    }

    public function confirm_boutique(Paiement $paiement){
        return view('Client.Paiement.confirm_boutique', compact('paiement'));
    }

    public function index_ligne(){
        $id_commande = session('id_commande');
        $commande = Commande::where('id', $id_commande)->first();
        return view('Client.Paiement.index_ligne', compact('commande'));
    }

    public function index_choix(Request $request, Commande $commande){
        session(['id_commande'=> $commande->id]);
        if($request->mode_paiement == "en_ligne"){
            return redirect()->route('client.paiement.ligne');
        }
        return redirect()->route('client.paiement.boutique');
    }

    public function store_paiement_boutique(Request $request, Commande $commande){
        if($request->validation !== null){
            $type_paiement = Type_paiement::where('type_paiement', 'Paiement sur place')->first();
            $moyen_paiement = Moyen_paiement::where('moyen_paiement', 'Gratuit')->first();
            $code = session('code_retrait');

            $paiement = Paiement::create([
                'id_commande' => $commande->id,
                'id_moyen_paiement' => $moyen_paiement->id,
                'id_type_paiement' => $type_paiement->id,
                'reference' => $code,
                'montant' => $commande->montant_total,
                'date' => Carbon::now(),
            ]);

            $commande->update([
                'status' => 'Termine',
            ]);

            return redirect()->route('client.paiement.boutique.confirm', $paiement);
        }
        return redirect()->route('client.paiement.boutique');
    }
}
