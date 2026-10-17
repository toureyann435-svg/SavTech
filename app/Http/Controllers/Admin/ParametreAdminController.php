<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Carbon\Carbon;
use App\Models\User;
use App\Models\Boutique;

class ParametreAdminController extends Controller
{
    public function index(){
        $assistants = '';
        $boutique = Boutique::where('id_proprietaire', auth()->id())->first();
        return view('Admin.Parametre.index', compact('boutique', 'assistants'));
    }

    public function preferences(Request $request){

    }

    public function reset_password(Request $request){
        $old_password = $request->old_password;

        if(Hash::check($old_password, auth()->user()->password)){
            $validate = $request->validate([
                'password' => ['required', 'string', 'min:8', 'confirmed']
            ]);

            User::where('id', auth()->id())->update([
                'password' => bcrypt($validate['password']),
            ]);

            return redirect()->route('admin.parametre')->with('success', 'Mot de passe enregistré avec succès');
        }
        return back()->with('erreur', 'Le mot de passe actuel est incorrect');
    }


    public function infos_boutique(Request $request){
        
      $boutique = Boutique::where('id_proprietaire', auth()->id())->first();

      if(empty($boutique)){

        $validate = $request->validate([
            'nom_boutique' => ['required', 'string'],
            'slogan' => ['required', 'string', 'max:255'],
            'numero_telephone' => ['required', 'max_digits:10', 'digits:10', 'regex:/^0[5-7][0-9]{8}$/'],
            'numero_whatsapp' => ['required', 'max_digits:10', 'digits:10', 'regex:/^0[5-7][0-9]{8}$/'],
            'email_site' => ['required', 'string', 'email'],
            'adresse' => ['required', 'string', 'max:255'],
            'horaire' => ['required', 'string'],
            'photo1' => ['required', 'mimes:png,jpg,jpeg,webp', 'max:2048'],
            'photo2' => ['nullable', 'mimes:png,jpg,jpeg,webp', 'max:2048'],
            'photo3' => ['nullable', 'mimes:png,jpg,jpeg,webp', 'max:2048'],
        ]);

        if($validate['photo1']){
            $photo1 = $request->file('photo1')->store('boutique', 'public');
        }

        if(isset($validate['photo2']) && $validate['photo2'] ){
            $photo2 = $request->file('photo2')->store('boutique', 'public');
        }

        if(isset($validate['photo3']) && $validate['photo3']){
            $photo3 = $request->file('photo3')->store('boutique', 'public');
        }

        $boutique = Boutique::create([
            'id_proprietaire' => auth()->id(),
            'nom_boutique' => $validate['nom_boutique'],
            'slogan' => $validate['slogan'],
            'adresse_boutique' => $validate['adresse'],
            'email_boutique' => $validate['email_site'],
            'numero_boutique' => $validate['numero_telephone'],
            'numero_whatsapp' => $validate['numero_whatsapp'],
            'heure_ouverture' => $validate['horaire'],
            'photo_1_boutique' => $photo1,
            'photo_2_boutique' => ($photo2 ?? null),
            'photo_3_boutique' => ($photo3 ?? null),
        ]);

        return redirect()->route('admin.parametre')->with('success', 'Boutique créé avec succès');
      }

      else{
        $validate = $request->validate([
            'nom_boutique' => ['nullable', 'string'],
            'slogan' => ['nullable', 'string', 'max:255'],
            'numero_telephone' => ['nullable', 'max_digits:10', 'digits:10', 'regex:/^0[5-7][0-9]{8}$/'],
            'numero_whatsapp' => ['nullable', 'max_digits:10', 'digits:10', 'regex:/^0[5-7][0-9]{8}$/'],
            'email_site' => ['nullable', 'string', 'email'],
            'adresse' => ['nullable', 'string', 'max:255'],
            'horaire' => ['nullable', 'string'],
            'photo1' => ['nullable', 'mimes:png,jpg,jpeg,webp', 'max:2048'],
            'photo2' => ['nullable', 'mimes:png,jpg,jpeg,webp', 'max:2048'],
            'photo3' => ['nullable', 'mimes:png,jpg,jpeg,webp', 'max:2048'],
        ]);

        if(isset($validate['photo1']) && $validate['photo1']){
            $photo1 = $request->file('photo1')->store('boutique', 'public');
        }

        if(isset($validate['photo2']) && $validate['photo2'] ){
            $photo2 = $request->file('photo2')->store('boutique', 'public');
        }

        if(isset($validate['photo3']) && $validate['photo3']){
            $photo3 = $request->file('photo3')->store('boutique', 'public');
        }



        $boutique->update([
            'nom_boutique' => ($validate['nom_boutique'] ?? $boutique->nom_boutique),
            'slogan' => ($validate['slogan'] ?? $boutique->slogan),
            'adresse_boutique' => ($validate['adresse'] ?? $boutique->adresse_boutique),
            'email_boutique' => ($validate['email_site'] ?? $boutique->email_boutique),
            'numero_boutique' => ($validate['numero_telephone'] ?? $boutique->numero_boutique),
            'numero_whatsapp' => ($validate['numero_whatsapp'] ?? $boutique->numero_whatsapp),
            'heure_ouverture' => ($validate['horaire'] ?? $boutique->heure_ouverture),
            'photo_1_boutique' => ($photo1 ?? $boutique->photo_1_boutique),
            'photo_2_boutique' => ($photo2 ?? $boutique->photo_2_boutique),
            'photo_3_boutique' => ($photo3 ?? $boutique->photo_3_boutique),
        ]);

        return redirect()->route('admin.parametre')->with('success', 'Boutique mise à jour avec succès');
      }
    }

    public function store_assistant(Request $request){
        $role = Role::where('nom', 'Assistant')->first();
        $validate = $request->validate([
            'nom' => ['required', 'string'],
            'prenom' => ['required', 'string'],
            'email' => ['required', 'string', 'email'],
            'numero_telephone' => ['required', 'digits:10'],
            'password' => ['required', 'string', 'min:8'],
        ]);

        $otp = random_int(100000, 999999);
        $expired_otp = Carbon::now()->addMinutes(5);
        $email = $validate['email'];
        $password = $validate['password'];

        $user = User::create([
            'id_role' => $role->id,
            'nom' => $validate['nom'],
            'prenom' => $validate['prenom'],
            'numero_telephone' => $validate['numero_telephone'],
            'password' => bcrypt($validate['password']),
            'otp' => $otp,
            'otp_expiration' => $expired_otp
        ]);

        $salutation = Carbon::now()->format('H:i') < '12:30' ? 'Bonjour' : 'Bonsoir';

        Mail::raw("$salutation assistant $user->nom $user->prenom de l'entreprise SavTech, Votre compte a été crée par l'administrateur, veuillez vous connectez pour prendre conscience de votre poste.\n
        Vous retrouverez vos informations ci-dessous : \n
        Numero de Téléphone : $user->numero_telephone, \n
        Mot de passe : $password.", function ($messages) use ($email){
            $messages->to($email)->subject('Compte Assistant -'. config('app.name'));
        });
    }
}