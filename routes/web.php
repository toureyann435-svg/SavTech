<?php

use App\Models\Boutique;

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Client\ProduitClientController;
use App\Http\Controllers\Client\CommandeClientController;
use App\Http\Controllers\Client\PanierClientController;
use App\Http\Controllers\Client\ClientController;
use App\Http\Controllers\Client\PaiementClientController;

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\Sign_upController;
use App\Http\Controllers\Auth\OtpController;

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\ProduitAdminController;
use App\Http\Controllers\Admin\StockAdminController;
use App\Http\Controllers\Admin\CommandeAdminController;
use App\Http\Controllers\Admin\ParametreAdminController;
use App\Http\Controllers\Admin\ClientAdminController;
use App\Http\Controllers\Admin\PaiementAdminController;

Route::get('/', function () {
    $boutique = Boutique::where('id_proprietaire', function ($query){
        $query->select('id')->from('users')->where('id_role', function ($role){
            $role->select('id')->from('roles')->where('nom', 'Administrateur')->first();
        });
    });
    return view('welcome', compact('boutique'));
})->name('welcome');

route::get('/register', [Sign_upController::class, 'register'])->name('register');
route::post('/store_register', [Sign_upController::class, 'store_register'])->name('store_register');

route::get('/register/otp', [OtpController::class, 'otp'])->name('otp');
route::post('/register/otp/verify', [OtpController::class, 'verify_otp'])->name('verify_otp');

route::get('/login', [LoginController::class, 'Login'])->name('login');
route::post('/login/store', [LoginController::class, 'loginUser'])->name('login.store');
route::post('/logout', [LoginController::class, 'logout'])->name('logout');

route::get('/service', [ClientController::class, 'service'])->name('client.service');
route::get('/a_propos', [ClientController::class, 'propos'])->name('client.propos');
route::get('/contact', [ClientController::class, 'contact'])->name('client.contact');


route::middleware('auth')->group(function(){

    route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');

    route::get('/admin/client', [ClientAdminController::class, 'index'])->name('admin.client');

    route::get('/admin/paiement', [PaiementAdminController::class, 'index'])->name('admin.paiement');

    route::get('/admin/produit', [ProduitAdminController::class, 'index'])->name('admin.produit');
    route::get('/admin/produit/create', [ProduitAdminController::class, 'create'])->name('admin.produit.create');
    route::post('/admin/produit/store', [ProduitAdminController::class, 'store'])->name('admin.produit.store');
    route::get('/admin/produit/{produit}/edit', [ProduitAdminController::class, 'edit_produit'])->name('admin.produit.edit');
    route::put('/admin/produit/{produit}/update', [ProduitAdminController::class, 'modify_produit'])->name('admin.produit.update');
    route::delete('/admin/produit/{produit}/delete', [ProduitAdminController::class, 'delete_produit'])->name('admin.produit.delete');

    route::get('/admin/stock', [StockAdminController::class, 'index'])->name('admin.stock');
    route::put('/admin/stock/{produit}/update', [StockAdminController::class, 'updatestock'])->name('admin.stock.update');

    route::get('/admin/commande', [CommandeAdminController::class, 'index'])->name('admin.commande');
    route::put('/admin/commande/update/{commande}', [CommandeAdminController::class, 'statut_update'])->name('admin.commande.statut_update');

    route::get('/admin/parametre', [ParametreAdminController::class, 'index'])->name('admin.parametre');
    route::post('/admin/parametre/reset_password', [ParametreAdminController::class, 'reset_password'])->name('admin.parametre.reset_password');
    route::post('/admin/parametre/', [ParametreAdminController::class, 'infos_boutique'])->name('admin.store_boutique');


    route::get('/dashboard', [ClientController::class, 'dashboard'])->name('client.dashboard');


    Route::get('/produit', [ProduitClientController::class, 'index'])->name('client.produit.index');

    route::get('/commande/{produit}', [CommandeClientController::class, 'index'])->name('client.commande.produit');
    route::get('/commande', [CommandeClientController::class, 'store'])->name('client.commande');
    route::get('/commande/confirmation/{commande}', [CommandeClientController::class, 'update_status'])->name('client.commande.confirmation');

    route::get('/panier', [PanierClientController::class, 'index'])->name('client.panier');
    route::post('/panier/store/{produit}', [PanierClientController::class, 'store'])->name('client.store.panier');
    route::post('/panier/delete/{item}', [PanierClientController::class, 'delete_item_panier'])->name('client.delete.item');
    route::post('/panier/delete_all', [PanierClientController::class, 'delete_all_items'])->name('client.delete.all.item');
    route::post('/panier/action/{item}', [PanierClientController::class, 'action'])->name('client.action');


    route::get('/paiement/ligne', [PaiementClientController::class, 'index_ligne'])->name('client.paiement.ligne');
    route::get('/paiement/boutique', [PaiementClientController::class, 'index_boutique'])->name('client.paiement.boutique');
    route::get('/paiement/type_paiement/{commande}', [PaiementClientController::class, 'index_choix'])->name('client.paiement.choix');
    route::post('/paiement/type_paiement/{commande}', [PaiementClientController::class, 'store_paiement_boutique'])->name('client.paiement.boutique.store');
    route::get('/paiement/type_paiement/confirm/{paiement}', [PaiementClientController::class, 'confirm_boutique'])->name('client.paiement.boutique.confirm');
    });
    
    