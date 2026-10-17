<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Role;

class LoginController extends Controller
{
    public function Login(){
        return view('Auth.login');
    }

    public function loginUser(Request $request){
        $validate = $request->validate([
            'numero_telephone' => ['required', 'digits:10', 'regex:/^0[5-7][0-9]{8}$/'],
            'password' => ['required', 'min:4'],
        ]);

        $remember = $request->boolean('remember');

        if(auth()->attempt($validate, $remember)){
            $request->session()->regenerate();

            if(auth()->user()->role->nom === 'Administrateur'){
                return redirect()->route('admin.dashboard');
            }
            elseif(auth()->user()->role->nom === 'Client'){
                return redirect()->route('client.produit.index');
            }
        }
        return redirect()->back()->with('erreur', 'Mot de passe ou numéro de téléphone incorrect');
    }

    public function logout(Request $request){
        auth()->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login');
    }

}