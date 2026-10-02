<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Client\ProduitClientController;
use App\Http\Controllers\Auth\LoginController;

Route::get('/', function () {
    return view('welcome');
})->name('welcome');
route::get('/login', [LoginController::class, 'Login'])->name('login');

Route::get('/produit', [ProduitClientController::class, 'index'])->name('client.produit.index');
