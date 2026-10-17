<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class OtpController extends Controller
{
    public function otp(){
        return view('Auth.otp');
    }

    public function verify_otp(Request $request){
        $session_user_id = session('user_id');
        $user = User::where('id', $session_user_id)->first();

        $validate = $request->validate([
            'otp' => ['required', 'string']
        ]);

        if($validate['otp'] == $user->otp){
            return redirect()->route('client.produit.index');
        }
        elseif(Carbon::now()->gt($user->otp_expiration)){
            return back()->withErrors(['erreur' => 'Le code a expiré']);
        }
        else{
            return back()->withErrors(['erreur' => 'Le code est incorrect']);
        }
    }
}
