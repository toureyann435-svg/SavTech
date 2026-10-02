<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProduitClientController extends Controller
{
    public function index(){
        return view('Client.Produit.index');
    }
 
}
