@extends('Admin.navbar')

@section('title', 'Gestion des Paiements - SavTech Admin')

@section('content_admin')

<div class="container">

    {{-- En-tête --}}
    <div class="entete">
        <div>
            <h1>Gestion des <span>Paiements</span> 💳</h1>
            <p>Suivez les paiements reçus et en attente</p>
        </div>
        <div class="entete-boutons">
            <a href="/admin/commandes" class="btn-retour">← Commandes</a>
            <a href="/admin/dashboard" class="btn-retour">← Dashboard</a>
        </div>
    </div>

    {{-- ==========================================================
         STATISTIQUES — ⚠️ chiffres à mettre à jour à la main
         ========================================================== --}}
    <div class="stats">
        <div class="stat-carte">
            <div class="stat-icone">💰</div>
            <div><h3>{{ number_format($total_paiement, 0, ',', ' ') }}</h3><p>FCFA encaissés</p></div>
        </div>
        <div class="stat-carte">
            <div class="stat-icone">⏳</div>
            <div><h3>{{ $paiement_attente }}</h3><p>Paiements en attente</p></div>
        </div>
        <div class="stat-carte">
            <div class="stat-icone">💳</div>
            <div><h3>{{ $paiement_ligne }}</h3><p>Payés en ligne</p></div>
        </div>
        <div class="stat-carte">
            <div class="stat-icone">🏪</div>
            <div><h3>{{ $paiement_sur_place }}</h3><p>Payés à la boutique</p></div>
        </div>
    </div>

    {{-- Tableau des paiements --}}
    <div class="panneau" style="margin-bottom:40px;">

        <h2>Liste des <span>paiements</span></h2>

        <div class="tableau-wrapper">
            <table>
                <thead>
                    <tr>
                        <th>Commande</th>
                        <th>Client</th>
                        <th>Montant</th>
                        <th>Mode</th>
                        <th>Statut</th>
                        <th>Date</th>
                    </tr>
                </thead>
                <tbody>

                    {{-- ==================================================
                         GABARIT D'UNE LIGNE PAIEMENT — copiez ce bloc pour
                         ajouter un paiement, puis remplissez les champs :

                         • numero / initiales avatar / nom / téléphone
                         • montant
                         • mode :
                             💳 En ligne    (ou)    🏪 Boutique
                             (ou) <span style="color:#999;">— Non choisi</span>
                         • statut :
                             <span class="badge livree">✅ Payé</span>       (Livrée)
                             <span class="badge encours">🔄 En cours</span>  (Confirmée)
                             <span class="badge attente">⏳ En attente</span> (En attente)
                         • date
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
                        <td class="td-prix">MONTANT FCFA</td>
                        <td>MODE</td>
                        <td><span class="badge STATUT">STATUT</span></td>
                        <td>JJ/MM/AAAA</td>
                    </tr>

                    --}}
                    @if($paiements->isNotEmpty())
                    @foreach ( $paiements as $paiement )
                    <tr>
                        <td class="cmd-num">{{ $paiement->commande->code }}</td>
                        <td>
                            <div class="cmd-client">
                                <span class="avatar-client">KJ</span>
                                <div>
                                    <strong>{{ $paiement->commande->user->nom }} {{ $paiement->commande->user->prenom }}</strong><br>
                                    <small>{{ $paiement->commande->user->numero_telephone }}</small>
                                </div>
                            </div>
                        </td>
                        <td class="td-prix">{{ number_format($paiement->montant, 0, ',', ' ') }} FCFA</td>
                        <td>{{ $paiement->moyen_paiement->moyen_paiement == "Paiement en ligne" ? "💳 En ligne" : "🏪 Boutique" }}</td>
                        <td>
                            <span class="badge {{ $paiement['status'] == 'Paye' ? 'livree' : ($paiement['status'] == 'En attente' ? 'encours' : "" ) }}">
                                {{ $paiement->status == "Paye" ? "✅ Payé" : ($paiement->status == 'En attente' ? '🔄 En cours' : '') }}
                            </span>
                        </td>
                        <td>{{ Carbon\Carbon::parse($paiement->date)->format('d-m-Y') }}</td>
                    </tr>
                    @endforeach
                    @else
                    <tr>
                        <td colspan="6">Aucun paiement n'a été effectué</td>
                    </tr>
                    @endif
                </tbody>
            </table>
        </div>

        {{-- Total — ⚠️ à mettre à jour à la main --}}
        <div class="recap-commandes">
            💰 Total encaissé :
            <strong>{{ number_format($total_paiement, 0, ',', ' ') }} FCFA</strong>
        </div>
    </div>

</div>

@endsection