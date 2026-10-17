@extends('Client.navbar')
@section('content_client')

    <div class="banniere">
        <h1>Nos <span>Produits</span></h1>
        <p>Des équipements de qualité pour tous vos besoins</p>
    </div>

    <div class="filtres">
        <button class="filtre actif" onclick="filtrer('tous', this)">Tous</button>
        <button class="filtre" onclick="filtrer('portable', this)">Ordinateurs portables</button>
        <button class="filtre" onclick="filtrer('bureau', this)">PC de bureau</button>
        <button class="filtre" onclick="filtrer('imprimante', this)">Imprimantes</button>
        <button class="filtre" onclick="filtrer('accessoire', this)">Accessoires</button>
    </div>

    <section id="catalogue">
        <div class="container">
            <div class="grille" id="grille">

                <!-- Produit 1 -->
                @if($produits->isNotEmpty())
                @foreach($produits as $produit)
<div class="produit" data-categorie="portable">
    <div class="image-produit">
        @if($produit->photo_1)
            <img src="{{ asset('storage/' . $produit->photo_1) }}" class="photo-produit-client" alt="{{ $produit->nom_produit }}">
        @else
         @if($produit->categorie == 'Portable')
            💻
         @elseif($produit->categorie == 'Bureau')
            ⌨️
         @elseif($produit->categorie == 'Imprimante')
            🖨️
         @elseif($produit->categorie == 'Accessoire')
            🎒
         @endif
        @endif
        <span class="badge {{ $produit->etat == 'Neuf' ? 'neuf' : 'occasion' }}">{{ $produit->etat }}</span>
    </div>
    <div class="infos">
        <h3>{{ $produit->nom_produit }}</h3>
        <p class="specs">{{ $produit->caracteristiques }}</p>
        <div class="prix">{{ number_format($produit->prix, 0, ',', ' ') }} FCFA</div>

        {{-- ===== INDICATEUR DE STOCK ===== --}}
        <div class="stock-produit {{ $produit->quantite == 0 ? 'rupture' : ($produit->quantite <= 5 ? 'faible' : 'enstock') }}">
            @if($produit->quantite == 0)
                ⛔ Rupture de stock
            @elseif($produit->quantite <= 5)
                ⚠️ Plus que {{ $produit->quantite }} {{ $produit->quantite > 1 ? 'exemplaires' : 'exemplaire' }} en stock !
            @else
                ✅ En stock ({{ $produit->quantite }} disponibles)
            @endif
        </div>

        <div class="actions-produit">
            <a href="{{ auth()->check() ? route('client.commande.produit', $produit->id) : route('login') }}" class="btn-commander {{ $produit->quantite == 0 ? 'desactive' : '' }}">Commander</a>
            <form method="POST" action="{{ route('client.store.panier', $produit->id) }}">
             <button type="submit" class="btn-panier" 
                    @if($produit->quantite == 0) disabled @endif>
                🛒 <span>{{ $produit->quantite == 0 ? 'Indisponible' : 'Ajouter au panier' }}</span>
             </button>
            </form>
        </div>
    </div>
</div>
                @endforeach
                @else
    <div class="vide-catalogue">
        <span class="vide-icone">🔍</span>
        <h3>Aucun produit trouvé</h3>
        <p>Oups ! Aucun produit ne correspond à votre recherche pour le moment.</p>
        <p class="vide-conseil">
            Revenez bientôt : de nouveaux ordinateurs et accessoires arrivent régulièrement ! 💻
        </p>
        <a href="/produits" class="btn-vide">Voir tout le catalogue</a>
    </div>
                @endif
    </section>

    <footer>
        <p>© 2025 <strong>Sav<span class="rouge">Tech</span></strong> — Votre satisfaction, notre priorité</p>
    </footer>

<script>
    // Filtre par catégorie
    function filtrer(categorie, bouton) {
        const produits = document.querySelectorAll('.produit');
        produits.forEach(p => {
            p.style.display = (categorie === 'tous' || p.dataset.categorie === categorie) ? 'flex' : 'none';
        });
        document.querySelectorAll('.filtre').forEach(f => f.classList.remove('actif'));
        bouton.classList.add('actif');
    }

    // Ajouter au panier (démo visuelle)
    function ajouterPanier(bouton) {
        bouton.classList.add('ajoute');
        const texte = bouton.querySelector('span');
        texte.textContent = 'Ajouté ! ✓';
        setTimeout(() => {
            bouton.classList.remove('ajoute');
            texte.textContent = 'Ajouter au panier';
        }, 1500);
    }
</script>
@endsection