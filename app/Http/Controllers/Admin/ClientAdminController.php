<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Commande;
use App\Models\Item_commande;
use Carbon\Carbon;

class ClientAdminController extends Controller
{
    public function index(){
        $users_client = User::where('id_role', function ($query){
            $query->select('id')->from('roles')->where('nom', 'Client');
        })->get();

        $user_mois_actuel = User::where('id_role', function ($query) {
           $query->select('id')->from('roles')->where('nom', 'Client');
        })->whereMonth('created_at', Carbon::now()->month)->whereYear('created_at', Carbon::now()->year)->count();

        $total_clients_avec_commande = User::where('id_role', function ($query) {
         $query->select('id')->from('roles')->where('nom', 'Client');
        })->whereHas('commande')->count();

        return view('Admin.Client.index', compact('users_client', 'user_mois_actuel', 'total_clients_avec_commande'));
    }
}
