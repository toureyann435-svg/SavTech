<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\User;
use App\Models\Role;

class Sign_upController extends Controller
{
    public function register(){
        return view('Auth.sign-up');
    }

    public function store_register(Request $request){
        $validate = $request->validate([
            'nom' => ['required', 'string'],
            'prenom' => ['required', 'string'],
            'numero' => ['required', 'digits:10'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'conditions' => ['required', 'accepted']
        ]);

        $otp = random_int(100000, 999999);
        $expired = Carbon::now()->addMinutes(5);

        $role_client = Role::where('nom', 'like', '%'. 'client' .'%')->first();

        if($role_client){
           $user = User::create([
             'nom' => $validate['nom'],
             'prenom' => $validate['prenom'],
             'id_role' => $role_client->id,
             'numero_telephone' => $validate['numero'],
             'password' => bcrypt($validate['password']),
             'otp' => $otp,
             'otp_expiration' => $expired
            ]);
            session(['user_id' => $user->id]);
            return redirect()->route('otp');
        }
        return back()->withErrors(['erreur' => 'Les Informations sont incorrectes']);
    }
}
