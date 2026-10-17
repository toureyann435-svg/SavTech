@extends('Admin.navbar')

@section('title', 'Gestion des Stocks - SavTech Admin')

@section('content_admin')

<div class="container">

    {{-- En-tête --}}
    <div class="entete">
        <div>
            <h1>Gestion des <span>Stocks</span> 📦</h1>
            <p>Suivez et mettez à jour les quantités de vos produits</p>
        </div>
        <div class="entete-boutons">
            <a href="{{ route('admin.produit') }}" class="btn-retour">← Retour aux produits</a>
            <a href="{{ route('admin.dashboard') }}" class="btn-retour">← Dashboard</a>
        </div>
    </div>

    {{-- ==========================================================
         STATISTIQUES — ⚠️ chiffres à mettre à jour à la main
         ========================================================== --}}
    <div class="stats">
        <div class="stat-carte">
            <div class="stat-icone">🏷️</div>
            <div><h3>{{ $total_produits }}</h3><p>Produits référencés</p></div>
        </div>
        <div class="stat-carte">
            <div class="stat-icone">✅</div>
            <div><h3>{{ $produits_en_stock }}</h3><p>En stock</p></div>
        </div>
        <div class="stat-carte">
            <div class="stat-icone">⚠️</div>
            <div><h3>{{ $produits_stock_critique }}</h3><p>Stock faible (≤ 5)</p></div>
        </div>
        <div class="stat-carte">
            <div class="stat-icone">⛔</div>
            <div><h3>{{ $produits_rupture }}</h3><p>Rupture de stock</p></div>
        </div>
    </div>

    {{-- Tableau des stocks --}}
    <div class="panneau" style="margin-bottom:40px;">

        <h2>État des <span>stocks</span></h2>

        <div class="barre-stock">
{{-- ===== Barre : filtres + recherche ===== --}}
<form method="GET" action="{{ route('admin.stock') }}" class="barre-stock">

    <div class="filtres-stock">
        <button type="submit" name="statut" value="tous" class="fstock {{ request()->statut == 'tous' || request()->statut === null ? 'actif' : '' }}">
            <span class="fstock-icone">📋</span>
            <span class="fstock-texte">Tous</span>
            <span class="fstock-compte">{{ count($produits) }}</span>
        </button>

        <button type="submit" name="statut" value="enstock" class="fstock {{ request()->statut == 'enstock' ? 'actif' : '' }}">
            <span class="fstock-icone">✅</span>
            <span class="fstock-texte">En stock</span>
            <span class="fstock-compte">{{ $produits_en_stock }}</span>
        </button>

        <button type="submit" name="statut" value="faible" class="fstock {{ request()->statut == 'faible' ? 'actif' : '' }}">
            <span class="fstock-icone">⚠️</span>
            <span class="fstock-texte">Stock faible</span>
            <span class="fstock-compte">{{ $produits_stock_critique }}</span>
        </button>

        <button type="submit" name="statut" value="rupture" class="fstock {{ request()->statut == 'rupture' ? 'actif' : '' }}">
            <span class="fstock-icone">⛔</span>
            <span class="fstock-texte">Rupture</span>
            <span class="fstock-compte">{{ $produits_rupture }}</span>
        </button>
    </div>

    <div class="form-recherche">
        <input type="text" name="recherche" value="{{ $recherche ?? '' }}" class="recherche-stock"
               placeholder="🔍 Rechercher un produit...">
        <button type="submit" class="btn-mini btn-bleu" title="Rechercher">🔍</button>
    </div>

</form>

        <div class="tableau-wrapper">
            @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
            <table>
                <thead>
                    <tr>
                        <th>Produit</th>
                        <th>Catégorie</th>
                        <th>Prix unitaire</th>
                        <th>Quantité</th>
                        <th>Statut</th>
                        <th>Valeur du stock</th>
                    </tr>
                </thead>
                <tbody>

                    {{-- ==================================================
                         GABARIT D'UNE LIGNE PRODUIT — copiez ce bloc pour
                         ajouter un produit, puis remplissez les champs :

                         • nom / specs       → nom et caractéristiques
                         • categorie         → Portable, Bureau, Imprimante ou Accessoire
                         • prix              → prix unitaire
                         • quantite          → la valeur de l'input
                         • badge (statut)    → 3 choix possibles :
                             <span class="badge enstock">✅ En stock</span>       (quantité > 5)
                             <span class="badge faible">⚠️ Stock faible</span>    (quantité 1 à 5)
                             <span class="badge rupture">⛔ Rupture</span>        (quantité 0)
                         • valeur du stock   → prix × quantité (à calculer)
                         ================================================== --}}
                    {{--

                    <tr>
                        <td>
                            <div class="produit-cellule">
                                <span style="font-size:1.5rem;">📦</span>
                                <div>
                                    <strong>NOM DU PRODUIT</strong><br>
                                    <small class="td-specs">CARACTÉRISTIQUES</small>
                                </div>
                            </div>
                        </td>
                        <td>CATÉGORIE</td>
                        <td class="td-prix">PRIX FCFA</td>
                        <td>
                            <form class="stock-form">
                                <input type="number" value="QUANTITE" min="0" class="champ-quantite">
                                <button type="submit" class="btn-mini btn-bleu" title="Enregistrer la quantité">💾</button>
                            </form>
                        </td>
                        <td><span class="badge STATUT">STATUT TEXTE</span></td>
                        <td class="td-valeur">PRIX × QUANTITE FCFA</td>
                    </tr>

                    --}}

                    @if($produits->isEmpty())
                        <tr>
                            <td colspan="6" style="text-align:center;">Aucun produit trouvé.</td>
                        </tr>
                    @else
                    @foreach($produits as $produit)

                    <tr>
                        <td>
                            <div class="produit-cellule">
                                @if($produit->photo_1)
                                <img src="{{ asset('storage/'. $produit->photo_1) }}" class="td-photo" alt="NOM DU PRODUIT">
                                @else
                                <span style="font-size:1.5rem;">📦</span>
                                @endif
                                <div>
                                    <strong>{{ $produit->nom_produit }}</strong><br>
                                    <small class="td-specs">{{ $produit->caracteristiques }}</small>
                                </div>
                            </div>
                        </td>
                        <td>{{ $produit->categorie }}</td>
                        <td class="td-prix">{{ number_format($produit->prix, 0, ',', ' ') }} FCFA</td>
                        <td>
                            <form class="stock-form" method = "POST" action="{{ route('admin.stock.update', $produit->id) }}">
                                @csrf
                                @method('PUT')
                                <input type="number" value="{{ $produit->quantite }}" min="0" class="champ-quantite" name="quantite">
                                <button type="submit" class="btn-mini btn-bleu" title="Enregistrer la quantité">💾</button>
                            </form>
                        </td>
                        <td>
                            @if($produit->quantite > 5)
                                <span class="">✅ En stock</span>
                            @elseif($produit->quantite > 0 && $produit->quantite <= 5)
                                <span class="">⚠️ Stock faible</span>
                            @else
                                <span class="">❌ Rupture de stock</span>
                            @endif
                        </td>
                        <td class="td-valeur">{{ number_format($produit->prix * $produit->quantite, 0, ',', ' ') }} FCFA</td>
                    </tr>
                    @endforeach
                    @endif

                    {{-- ==================================================
                         FIN DU GABARIT
                         ================================================== --}}

                </tbody>
            </table>
        </div>

        {{-- Valeur totale — ⚠️ à mettre à jour à la main --}}
        <div class="total-stock">
            💰 Valeur totale du stock :
            <strong>{{ number_format($valeur_totale, 0, ',', ' ') }} FCFA</strong>
        </div>
    </div>

</div>

@endsection