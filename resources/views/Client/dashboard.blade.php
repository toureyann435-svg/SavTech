@extends('Client.navbar')

@section('title', 'Mon Espace - SavTech')

@section('content_client')

    <div class="espace-zone">
        <div class="espace-carte">

            {{-- ===== BANDEAU PROFIL ===== --}}
            <div class="profil-bandeau">
                <div class="profil-avatar">{{ strtoupper(substr(auth()->user()->nom, 0, 1)) }}{{ strtoupper(substr(auth()->user()->prenom, 0, 1)) }}</div>
                <div class="profil-infos">
                    <h1>{{ auth()->user()->nom }} {{ auth()->user()->prenom }}</h1>
                    <p>+225 {{ auth()->user()->numero_telephone }} · savtech@gmail.com</p>
                </div>
                <span class="badge-client">Client depuis {{ auth()->user()->created_at->format('Y') }}</span>
            </div>

            @if(session('success'))
                <div class="alert-success">✅ {{ session('success') }}</div>
            @endif

            {{-- ===== STATISTIQUES ===== --}}
            <div class="stats-client">
                <div class="stat-client">
                    <span class="stat-icone">🛒</span>
                    <div><strong>{{ count($commandes) }}</strong><small>Commandes</small></div>
                </div>
                <div class="stat-client">
                    <span class="stat-icone">🔄</span>
                    <div><strong>{{ $commande_en_attente }}</strong><small>En cours</small></div>
                </div>
                <div class="stat-client">
                    <span class="stat-icone">✅</span>
                    <div><strong>{{ $commande_livree }}</strong><small>Livrées</small></div>
                </div>
            </div>

            {{-- ===== ACTIONS RAPIDES ===== --}}
            <div class="actions-client">
                <a href="{{ route('client.produit.index') }}" class="action-client">
                    <span>💻</span> Continuer mes achats
                </a>
                <a href="{{ route('client.panier') }}" class="action-client">
                    <span class="action-panier">
                        🛒
                        @if(session('panier') && count(session('panier')) > 0)
                            <span class="bulle-panier">{{ count(session('panier')) }}</span>
                        @endif
                    </span>
                    Mon panier
                </a>
                <a href="{{ route('welcome') }}#contact" class="action-client">
                    <span>📞</span> Contacter la boutique
                </a>
            </div>

            {{-- ===== HISTORIQUE DES COMMANDES ===== --}}
            <h2 class="titre-section">Mes <span>commandes</span></h2>

            <div class="commandes-liste">

                {{-- ==================================================
                     GABARIT D'UNE COMMANDE — copiez ce bloc, puis :
                     • numero / date
                     • produits (une ligne <li> par article)
                     • montant
                     • badge : badge-attente | badge-encours | badge-livree
                     ================================================== --}}

@foreach ( $commandes as $commande )
    <div class="commande-item">
        <div class="commande-entete">
            <span class="commande-num">{{ $commande->code }}</span>
            <span class="{{ $commande->status === 'Livré' || $commande->status === 'Confirmee' ? 'badge-livree' : 'badge-attente' }}">
                @if($commande->status == 'Livré')
                    ✅ Livrée
                @elseif ($commande->status == 'En attente')
                    ⏳ En attente
                @elseif($commande->status == 'Confirmee')
                    ✅ Confirmée
                @endif
            </span>
        </div>

        {{-- ===== BANNIÈRE : CHOIX DU PAIEMENT (status Confirmee uniquement) ===== --}}
@if($commande->status == 'Confirmee')
    <form method="GET" action="{{ route('client.paiement.choix', $commande->id) }}" class="banniere-paiement">
        @csrf
        <p class="paiement-titre">🎉 Votre commande est confirmée ! Comment souhaitez-vous payer ?</p>

        <div class="paiement-choix">
            <label class="paiement-option">
                <input type="radio" name="mode_paiement" value="en_ligne" required>
                <span class="paiement-carte">💳 <strong>Payer en ligne</strong><small>Orange Money / Wave</small></span>
            </label>
            <label class="paiement-option">
                <input type="radio" name="mode_paiement" value="boutique" required>
                <span class="paiement-carte">🏪 <strong>Payer à la boutique</strong><small>Lors du retrait</small></span>
            </label>
        </div>

        <button type="submit" class="paiement-valider">Valider mon choix →</button>
    </form>

@elseif ($commande->status == 'terminee')

    {{-- ===== PAIEMENT RÉGLÉ : RÉCAP DES INFORMATIONS ===== --}}
    <div class="banniere-paye">
        <div class="paye-entete">
            <span class="paye-coche">✅</span>
            <div>
                <strong>Paiement effectué</strong>
                <small>Commande payée le {{ Carbon\Carbon::parse($commande->paiement->date)->format('d/m/Y à H\hi') }}</small>
            </div>
        </div>

        <div class="paye-details">
            <div class="paye-ligne">
                <span>Montant payé</span>
                <strong>{{ number_format($commande->paiement->montant, 0, ',', ' ') }} FCFA</strong>
            </div>
            <div class="paye-ligne">
                <span>Mode de paiement</span>
                <strong>
                    @if($commande->paiement->type_paiement->type_paiement == 'Paiement en ligne')
                        💳 En ligne
                    @elseif($commande->paiement->type_paiement->type_paiement == 'Paiement sur place')
                        🏪 À la boutique
                    @else
                        — Non renseigné
                    @endif
                </strong>
            </div>

            {{-- ===== DÉTAIL SELON LE MODE ===== --}}
            @if($commande->paiement->type_paiement->type_paiement == 'Paiement en ligne')
                <div class="paye-ligne">
                    <span>Moyen utilisé</span>
                    <strong>{{ strtoupper($commande->paiement->moyen_paiement->moyen_paiement ?? 'Wave / Orange Money') }}</strong>
                </div>
                <div class="paye-ligne">
                    <span>Référence de la transaction</span>
                    <strong class="paye-reference">{{ $commande->paiement->reference ?? 'REF-' . $commande->id }}</strong>
                </div>
            @elseif($commande->paiement->type_paiement->type_paiement == 'Paiement sur place')
                <div class="paye-code-retrait">
                    <small>Code de retrait utilisé</small>
                    <div class="code">{{ $commande->paiement->reference ?? 'SAV-' . $commande->id }}</div>
                </div>
            @endif
        </div>

        {{-- ===== CONFIRMATION DE RÉCEPTION (intégrée à la bannière) ===== --}}
        @if(Carbon\Carbon::now()->gte($commande->paiement->date))
            @if(empty($commande->recue_le))

                {{-- Pas encore confirmée : bouton --}}
                <form method="GET" action="{{ route('client.commande.confirmation', $commande->id) }}" class="reception-bloc">
                    @csrf
                    <div class="reception-texte">
                        <strong>📦 Vous avez reçu votre commande ?</strong>
                        <small>Confirmez pour finaliser définitivement cette commande.</small>
                    </div>
                    <button type="submit"
                            class="btn-reception"
                            onclick="return confirm('Confirmez-vous avoir bien reçu votre commande ? Cette action est définitive.');">
                        ✅ Oui, j'ai reçu
                    </button>
                </form>

            @else

                {{-- Déjà confirmée : simple mention --}}
                <div class="reception-bloc recu">
                    <span class="reception-texte">
                        <strong>📦 Commande reçue</strong>
                        <small>Confirmée le {{ Carbon\Carbon::parse($commande->recue_le)->format('d/m/Y') }}</small>
                    </span>
                </div>

            @endif
        @endif

        <p class="paye-note">Merci pour votre confiance ! Un reçu est disponible sur demande à la boutique.</p>
    </div>

@endif

        <ul class="commande-produits">
            @foreach ( $commande->item_commande as $items)
                <li>{{ $items->produit->nom_produit }} ×{{ $items->quantite }}</li>
            @endforeach
        </ul>
        <div class="commande-pied">
            <span class="commande-date">📅 {{ $commande->created_at->format('d/m/Y') }}</span>
            <span class="commande-montant">{{ number_format($commande->montant_total, 0, ',', ' ') }} FCFA</span>
        </div> 
    </div>
@endforeach

            </div>

            {{-- ===== ÉTAT VIDE (à activer via Blade si aucune commande) ===== --}}
            {{--

            <div class="commandes-vide">
                <span>📦</span>
                <h3>Aucune commande pour l'instant</h3>
                <p>Vos futures commandes apparaîtront ici.</p>
                <a href="{{ route('client.produit.index') }}">Découvrir nos produits</a>
            </div>

            --}}

        </div>
    </div>

@endsection