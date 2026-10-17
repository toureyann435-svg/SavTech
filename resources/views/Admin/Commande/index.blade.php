@extends('Admin.navbar')

@section('title', 'Gestion des Commandes - SavTech Admin')

@section('content_admin')

<div class="container">

    {{-- En-tête --}}
    <div class="entete">
        <div>
            <h1>Gestion des <span>Commandes</span> 🛒</h1>
            <p>Suivez et traitez les commandes de vos clients</p>
        </div>
        <div class="entete-boutons">
            <a href="{{ route('admin.stock') }}" class="btn-retour">← Stocks</a>
            <a href="{{ route('admin.dashboard') }}" class="btn-retour">← Dashboard</a>
        </div>
    </div>

    {{-- ==========================================================
         STATISTIQUES — ⚠️ chiffres à mettre à jour à la main
         ========================================================== --}}
    <div class="stats">
        <div class="stat-carte">
            <div class="stat-icone">🛒</div>
            <div><h3>{{ $total_commande }}</h3><p>Commandes au total</p></div>
        </div>
        <div class="stat-carte">
            <div class="stat-icone">⏳</div>
            <div><h3>{{ $commande_en_attente }}</h3><p>En attente</p></div>
        </div>
        <div class="stat-carte">
            <div class="stat-icone">🔄</div>
            <div><h3>{{ $commande_confirme }}</h3><p>Confirmée</p></div>
        </div>
        <div class="stat-carte">
            <div class="stat-icone">✅</div>
            <div><h3>{{ $commande_livree }}</h3><p>Livrées</p></div>
        </div>
    </div>

    {{-- Tableau des commandes --}}
    <div class="panneau" style="margin-bottom:40px;">

        <h2>Liste des <span>commandes</span></h2>

        {{-- Filtres + recherche (visuels pour l'instant) --}}
<form method="GET" action="{{ route('admin.commande') }}" class="barre-stock">

    <div class="filtres-stock">
        <label class="fstock">
            <input type="radio" name="statut" value="Tous"
                   onchange="this.form.submit()"
                   {{ request()->statut == 'Tous' || request()->statut === null ? 'checked' : '' }}>
            <span class="fstock-icone">📋</span>
            <span class="fstock-texte">Tous</span>
            <span class="fstock-compte">{{ $total_commande }}</span>
        </label>

        <label class="fstock">
            <input type="radio" name="statut" value="En attente"
                   onchange="this.form.submit()"
                   {{ request()->statut == 'En attente' ? 'checked' : '' }}>
            <span class="fstock-icone">⏳</span>
            <span class="fstock-texte">En attente</span>
            <span class="fstock-compte">{{ $commande_en_attente }}</span>
        </label>

        <label class="fstock">
            <input type="radio" name="statut" value="Confirmee"
                   onchange="this.form.submit()"
                   {{ request()->statut == 'Confirmee' ? 'checked' : '' }}>
            <span class="fstock-icone">🔄</span>
            <span class="fstock-texte">Confirmée</span>
            <span class="fstock-compte">{{ $commande_confirme }}</span>
        </label>

        <label class="fstock">
            <input type="radio" name="statut" value="Livré"
                   onchange="this.form.submit()"
                   {{ request()->statut == 'Livré' ? 'checked' : '' }}>
            <span class="fstock-icone">✅</span>
            <span class="fstock-texte">Livrées</span>
            <span class="fstock-compte">{{ $commande_livree }}</span>
        </label>
    </div>

    <div class="form-recherche">
        <input type="hidden" value="{{ request()->statut }}">
        <input type="text" name="recherche" value="{{ request('recherche') }}" class="recherche-stock"
               placeholder="🔍 Rechercher un client ou un n°...">
        <button type="submit" class="btn-mini btn-bleu" title="Rechercher">🔍</button>
    </div>

</form>

        <div class="tableau-wrapper">
            <table>
                <thead>
                    <tr>
                        <th>N°</th>
                        <th>Client</th>
                        <th>Produits</th>
                        <th>Montant</th>
                        <th>Statut</th>
                        <th>Date</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>

                    {{-- ==================================================
                         GABARIT D'UNE LIGNE COMMANDE — copiez ce bloc pour
                         ajouter une commande, puis remplissez les champs :

                         • numero   → ex : #0127
                         • initiales + classe couleur d'avatar :
                             (rien) = bleu | vert | rouge | orange | gris
                         • client   → nom + téléphone
                         • produits → une ligne <li> par produit
                         • badge (statut) → 3 choix possibles :
                             <span class="badge attente">En attente</span>
                             <span class="badge encours">En cours</span>
                             <span class="badge livree">Livrée</span>
                         • montant / date
                         • selected sur le bon <option> du select
                         ================================================== --}}
                    {{--

                    <tr>
                        <td class="cmd-num">#0000</td>
                        <td>
                            <div class="cmd-client">
                                <span class="avatar-client">XX</span>
                                <div>
                                    <strong>NOM DU CLIENT</strong><br>
                                    <small>+225 XX XX XX XX XX</small>
                                </div>
                            </div>
                        </td>
                        <td>
                            <ul class="cmd-produits">
                                <li>NOM DU PRODUIT ×1</li>
                            </ul>
                        </td>
                        <td class="td-prix">MONTANT FCFA</td>
                        <td><span class="badge STATUT">STATUT</span></td>
                        <td>JJ/MM/AAAA</td>
                        <td>
                            <div class="cmd-actions">
                                <a href="#" class="btn-mini btn-bleu" title="Voir les détails">👁️</a>
                                <form class="cmd-statut-form">
                                    <select class="select-statut" name="statut">
                                        <option>En attente</option>
                                        <option>En cours</option>
                                        <option>Livrée</option>
                                    </select>
                                    <button type="submit" class="btn-mini btn-bleu" title="Enregistrer le statut">💾</button>
                                </form>
                            </div>
                        </td>
                    </tr>

                    --}}

                    @foreach ( $commandes as $commande )
                    <tr>
                        <td class="cmd-num">{{ $commande->code }}</td>
                        <td>
                            <div class="cmd-client">
                                <span class="avatar-client">KJ</span>
                                <div>
                                    <strong>{{ $commande->user->nom }} {{ $commande->user->prenom }}</strong><br>
                                    <small>{{ $commande->user->numero_telephone }}</small>
                                </div>
                            </div>
                        </td>
                        <td>
                            <ul class="cmd-produits">
                                @foreach ( $commande->item_commande as $items )
                                 <li>{{ $items->produit->nom_produit }} ×{{ $items->quantite }}</li>
                                @endforeach
                            </ul>
                        </td>
                        <td class="td-prix">{{ number_format($commande->montant_total, 0, ',', ' ') }} FCFA</td>
                        <td><span class="badge {{ $commande['status'] == "Livré" || $commande['status'] == "Confirmee" ? 'livree' : 'En attente' }}">{{ $commande->status }}</span></td>
                        <td>{{ $commande->created_at->format('d-m-Y') }}</td>
                        <td>
                            <div class="cmd-actions">
                                <a href="#" class="btn-mini btn-bleu" title="Voir les détails">👁️</a>
                                <form class="cmd-statut-form" method="POST" action="{{ route('admin.commande.statut_update',$commande->id) }}">
                                    @csrf
                                    @method('PUT')
                                    <select class="select-statut" name="statut">
                                        <option value="En attente" {{ $commande->status == "En attente" ? 'selected' : '' }}>En attente</option>
                                        <option value="Confirmee" {{ $commande->status == "Confirmee" ? 'selected' : '' }}>Confirmée</option>
                                        <option value="Livré" {{ $commande->status == "Livré" ? 'selected' : '' }}>Livrée</option>
                                    </select>
                                    <button type="submit" class="btn-mini btn-bleu" title="Enregistrer le statut">💾</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @endforeach

                </tbody>
            </table>
        </div>

        {{-- Récapitulatif — ⚠️ à mettre à jour à la main --}}
        <div class="recap-commandes">
            💰 Chiffre d'affaires affiché :
            <strong>{{ number_format($somme_commande, 0, ',', ' ') }} FCFA</strong>
        </div>
    </div>

</div>


@endsection