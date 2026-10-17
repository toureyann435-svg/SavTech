@extends('Admin.navbar')

@section('title', 'Gestion des Clients - SavTech Admin')

@section('content_admin')

<div class="container">

    {{-- En-tête --}}
    <div class="entete">
        <div>
            <h1>Gestion des <span>Clients</span> 👥</h1>
            <p>Tous les clients inscrits sur la plateforme</p>
        </div>
        <div class="entete-boutons">
            <a href="/admin/dashboard" class="btn-retour">← Dashboard</a>
        </div>
    </div>

    {{-- ==========================================================
         STATISTIQUES — ⚠️ chiffres à mettre à jour à la main
         ========================================================== --}}
    <div class="stats">
        <div class="stat-carte">
            <div class="stat-icone">👥</div>
            <div><h3>{{ count($users_client) }}</h3><p>Clients inscrits</p></div>
        </div>
        <div class="stat-carte">
            <div class="stat-icone">🛒</div>
            <div><h3>{{ $total_clients_avec_commande }}</h3><p>Ayant commandé</p></div>
        </div>
        <div class="stat-carte">
            <div class="stat-icone">🆕</div>
            <div><h3>{{ $user_mois_actuel }}</h3><p>Inscrits ce mois</p></div>
        </div>
    </div>

    {{-- Tableau des clients --}}
    <div class="panneau" style="margin-bottom:40px;">

        <h2>Liste des <span>clients</span></h2>

        <div class="tableau-wrapper">
            <table>
                <thead>
                    <tr>
                        <th>Client</th>
                        <th>Téléphone</th>
                        <th>Email</th>
                        <th>Commandes</th>
                        <th>Total dépensé</th>
                        <th>Inscrit le</th>
                    </tr>
                </thead>
                <tbody>

                    {{-- ==================================================
                         GABARIT D'UNE LIGNE CLIENT — copiez ce bloc pour
                         ajouter un client, puis remplissez les champs :

                         • initiales (avatar) → 1ʳᵉ lettre nom + prénom
                         • couleur avatar (facultatif) :
                             vert | rouge | orange | gris (défaut : bleu)
                         • nom / prénom / téléphone / email
                         • badge commandes :
                             <span class="badge encours">2 commandes</span>  (a commandé)
                             <span class="badge attente">0 commande</span>   (jamais)
                         • total dépensé      → somme de ses commandes
                         • date d'inscription
                         ================================================== --}}
                    {{--

                    <tr>
                        <td>
                            <div class="cmd-client">
                                <span class="avatar-client">XX</span>
                                <div><strong>NOM Prénom</strong></div>
                            </div>
                        </td>
                        <td>+225 XX XX XX XX XX</td>
                        <td>email@exemple.com</td>
                        <td>
                            <span class="badge STATUT">N commande(s)</span>
                        </td>
                        <td class="td-prix">TOTAL FCFA</td>
                        <td>JJ/MM/AAAA</td>
                    </tr>

                    --}}
                    @if ($users_client->isNotEmpty())
                    @foreach ( $users_client as $client )
                    <tr>
                        <td>
                            <div class="cmd-client">
                                <span class="avatar-client">KJ</span>
                                <div><strong>{{ $client->nom }} {{ $client->prenom }}</strong></div>
                            </div>
                        </td>
                        <td>{{ $client->numero_telephone }}</td>
                        <td>kouassi.jean@gmail.com</td>
                        <td><span class="badge {{ count($client->commande) != 0 ? "encours" : "attente" }}">{{ count($client->commande) }} commandes</span></td>
                        <td class="td-prix">
                            @if($client->commande->sum('montant_total') != 0)
                            {{ number_format($client->commande->sum('montant_total'), 0, ',', ' ') }} FCFA
                            @else
                             —
                            @endif
                        </td>
                        <td>{{ $client->created_at->format('d-m-Y') }}</td>
                    </tr>
                    @endforeach
                    @else
                    <tr>
                        <td colspan="6">Aucun client inscrit</td>
                    </tr>   
                    @endif

                </tbody>
            </table>
        </div>
    </div>

</div>

@endsection