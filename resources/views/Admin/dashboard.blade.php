@extends('Admin.navbar')

@section('title', 'Dashboard - SavTech Admin')

@section('content_admin')

    <div class="container">

        {{-- En-tête --}}
        <div class="entete">
            <div>
                <h1>Bonjour, <span>Admin</span> 👋</h1>
                <p>Voici l'activité de la boutique aujourd'hui</p>
            </div>
            <a href="#" class="btn-rouge">➕ Ajouter un produit</a>
        </div>

        {{-- Statistiques --}}
        <div class="stats">
            @if(!isset($stats))
                <p>Aucune statistique disponible pour le moment.</p>
            @else
            @foreach($stats as $stat)
                <div class="stat-carte">
                    <div class="stat-icone">{{ $stat['icone'] }}</div>
                    <div>
                        <h3>{{ $stat['valeur'] }}</h3>
                        <p>{{ $stat['label'] }}</p>
                    </div>
                </div>
            @endforeach
            @endif
        </div>

        {{-- Graphique + Actions rapides --}}
        <div class="deux-colonnes">
            <div class="panneau">
                <h2>Ventes de la <span>semaine</span> (en FCFA)</h2>
                <div class="graphique">
                    <div class="barre-groupe"><div class="barre" style="height:45%"></div><div class="barre-jour">Lun</div></div>
                    <div class="barre-groupe"><div class="barre rouge" style="height:70%"></div><div class="barre-jour">Mar</div></div>
                    <div class="barre-groupe"><div class="barre" style="height:55%"></div><div class="barre-jour">Mer</div></div>
                    <div class="barre-groupe"><div class="barre rouge" style="height:90%"></div><div class="barre-jour">Jeu</div></div>
                    <div class="barre-groupe"><div class="barre" style="height:65%"></div><div class="barre-jour">Ven</div></div>
                    <div class="barre-groupe"><div class="barre rouge" style="height:100%"></div><div class="barre-jour">Sam</div></div>
                    <div class="barre-groupe"><div class="barre" style="height:35%"></div><div class="barre-jour">Dim</div></div>
                </div>
            </div>

            <div class="panneau">
                <h2>Actions <span>rapides</span></h2>
                <div class="actions">
                    <a href="#" class="action"><span class="emo">➕</span> Ajouter un produit</a>
                    <a href="#" class="action"><span class="emo">📦</span> Gérer le stock</a>
                    <a href="#" class="action"><span class="emo">🛒</span> Voir les commandes</a>
                    <a href="#" class="action"><span class="emo">⚙️</span> Paramètres</a>
                </div>
            </div>
        </div>

        {{-- Dernières commandes --}}
        <div class="panneau" style="margin-bottom:40px;">
            <h2>Dernières <span>commandes</span></h2>
            <div class="tableau-wrapper">
                <table>
                    <thead>
                        <tr>
                            <th>N°</th>
                            <th>Client</th>
                            <th>Produit</th>
                            <th>Montant</th>
                            <th>Statut</th>
                            <th>Date</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if(!isset($commandes))
                            <tr><td colspan="6">Aucune commande pour le moment.</td></tr>
                        @else
                            @foreach($commandes as $commande)
                                <tr>
                                    <td>{{ $commande['numero'] }}</td>
                                    <td>{{ $commande['client'] }}</td>
                                    <td>{{ $commande['produit'] }}</td>
                                    <td>{{ $commande['montant'] }}</td>
                                    <td><span class="badge {{ $commande['classe'] }}">{{ $commande['statut'] }}</span></td>
                                    <td>{{ $commande['date'] }}</td>
                                </tr>
                            @endforeach
                        @endif
                    </tbody>
                </table>
            </div>
        </div>

    </div>

@endsection