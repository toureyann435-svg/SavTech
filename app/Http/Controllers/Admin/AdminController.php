<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Commande;

class AdminController extends Controller
{
    public function dashboard(){
        $commandes = Commande::orderBy('created_at', 'desc')->limit(3)->get();
        return view('Admin.dashboard', compact('commandes'));
    }
}
