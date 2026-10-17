<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Mon Panier - SavTech</title>
<style>
    * { margin: 0; padding: 0; box-sizing: border-box; }

    :root {
        --blanc: #ffffff;
        --bleu: #1a6fb5;
        --bleu-fonce: #12507f;
        --rouge: #e8492a;
        --gris: #3a3f44;
        --gris-clair: #f4f6f8;
        --vert: #2e9e5b;
    }

    body {
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        color: var(--gris);
        background: var(--gris-clair);
        min-height: 100vh;
        display: flex;
        flex-direction: column;
    }
    a { text-decoration: none; }

    /* ====== HEADER ====== */
    .topbar {
        background: var(--gris);
        color: var(--blanc);
        font-size: 0.9rem;
        padding: 8px 20px;
        text-align: center;
    }
    header {
        background: var(--blanc);
        box-shadow: 0 2px 12px rgba(0,0,0,0.08);
        padding: 15px 20px;
        display: flex;
        justify-content: center;
    }
    .logo { font-size: 1.8rem; font-weight: 800; color: var(--bleu); }
    .logo span { color: var(--rouge); }

    /* ====== ZONE PANIER ====== */
    .panier-zone {
        flex: 1;
        padding: 40px 20px;
        background: linear-gradient(135deg, var(--bleu) 0%, var(--bleu-fonce) 60%, var(--gris) 100%);
    }

    .panier-carte {
        background: var(--blanc);
        width: 100%;
        max-width: 720px;
        margin: 0 auto;
        border-radius: 15px;
        padding: 35px;
        box-shadow: 0 15px 40px rgba(0,0,0,0.3);
    }

    .panier-carte h1 {
        text-align: center;
        color: var(--bleu);
        font-size: 1.7rem;
        margin-bottom: 25px;
    }
    .panier-carte h1 span { color: var(--rouge); }

    /* ====== LIGNE ARTICLE ====== */
    .article {
        display: flex;
        align-items: center;
        gap: 15px;
        padding: 15px 0;
        border-bottom: 1px solid #eef1f3;
    }

    .article-image {
        width: 70px;
        height: 70px;
        background: var(--gris-clair);
        border-radius: 10px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 2.2rem;
        overflow: hidden;
        flex-shrink: 0;
    }
    .article-image img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    .article-infos { flex: 1; min-width: 0; }
    .article-infos h3 {
        font-size: 0.98rem;
        color: var(--gris);
        line-height: 1.3;
    }
    .article-infos .specs {
        font-size: 0.78rem;
        color: #999;
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
    }
    .article-infos .prix-unitaire {
        font-size: 0.85rem;
        color: #777;
    }

    /* Quantité */
    .article-qte {
        display: flex;
        align-items: center;
        gap: 6px;
        flex-shrink: 0;
    }
    .qte-btn {
        width: 32px;
        height: 36px;
        background: var(--gris-clair);
        border: 2px solid #dde3e8;
        border-radius: 8px;
        font-size: 1.1rem;
        font-weight: bold;
        color: var(--gris);
        cursor: pointer;
        transition: background 0.3s, color 0.3s, border-color 0.3s;
    }
    .qte-btn:hover:not(:disabled) {
        background: var(--bleu);
        color: var(--blanc);
        border-color: var(--bleu);
    }
    .qte-btn:disabled { opacity: 0.35; cursor: not-allowed; }
    .article-qte input {
        width: 48px;
        height: 36px;
        text-align: center;
        border: 2px solid #dde3e8;
        border-radius: 8px;
        font-family: inherit;
        font-weight: 700;
        font-size: 0.95rem;
        color: var(--gris);
        outline: none;
    }
    .article-qte input:focus { border-color: var(--bleu); }

    /* Prix de la ligne + suppression */
    .article-fin {
        display: flex;
        flex-direction: column;
        align-items: flex-end;
        gap: 8px;
        flex-shrink: 0;
        min-width: 110px;
    }
    .article-prix {
        font-weight: 800;
        color: var(--rouge);
        font-size: 1rem;
        white-space: nowrap;
    }
    .btn-supprimer {
        width: 32px;
        height: 32px;
        border: none;
        border-radius: 8px;
        background: #fdeae6;
        cursor: pointer;
        font-size: 0.95rem;
        display: flex;
        align-items: center;
        justify-content: center;
        transition: background 0.3s, transform 0.3s;
    }
    .btn-supprimer:hover {
        background: var(--rouge);
        transform: translateY(-2px);
    }

    /* ====== RÉCAPITULATIF ====== */
    .recapitulatif {
        background: var(--gris-clair);
        border-radius: 12px;
        padding: 18px 20px;
        margin: 25px 0;
    }
    .recap-ligne {
        display: flex;
        justify-content: space-between;
        font-size: 0.95rem;
        color: #777;
        margin-bottom: 8px;
    }
    .recap-ligne:last-child {
        margin-bottom: 0;
        padding-top: 10px;
        border-top: 2px dashed #d7dee5;
        color: var(--gris);
        font-weight: 800;
        font-size: 1.15rem;
    }
    .recap-ligne strong { color: var(--gris); }
    .recap-ligne:last-child strong { color: var(--rouge); }
    .recap-note {
        font-size: 0.8rem;
        color: #999;
        margin-top: 8px;
        text-align: center;
    }

    .btn-commander-panier {
        width: 100%;
        padding: 15px;
        background: var(--rouge);
        color: var(--blanc);
        border: none;
        border-radius: 50px;
        font-size: 1.05rem;
        font-family: inherit;
        font-weight: bold;
        cursor: pointer;
        transition: background 0.3s, transform 0.3s, box-shadow 0.3s;
    }
    .btn-commander-panier:hover {
        background: var(--bleu);
        transform: translateY(-2px);
        box-shadow: 0 8px 20px rgba(26, 111, 181, 0.35);
    }

    .liens-panier {
        display: flex;
        justify-content: space-between;
        margin-top: 18px;
        flex-wrap: wrap;
        gap: 10px;
    }
    .liens-panier a {
        color: var(--bleu);
        font-size: 0.9rem;
        font-weight: 600;
    }
    .liens-panier a:hover { color: var(--rouge); }

    /* ====== ÉTAT VIDE ====== */
    .panier-vide { display: none; text-align: center; padding: 30px 10px; }
    .panier-vide .icone {
        display: inline-block;
        font-size: 4rem;
        margin-bottom: 15px;
        animation: flotte 2.5s ease-in-out infinite;
    }
    @keyframes flotte {
        0%, 100% { transform: translateY(0); }
        50%      { transform: translateY(-8px); }
    }
    .panier-vide h2 {
        color: var(--gris);
        font-size: 1.4rem;
        margin-bottom: 8px;
    }
    .panier-vide p {
        color: #777;
        font-size: 0.95rem;
        margin-bottom: 22px;
    }
    .btn-continuer {
        display: inline-block;
        background: var(--bleu);
        color: var(--blanc);
        padding: 13px 30px;
        border-radius: 50px;
        font-weight: 600;
        transition: background 0.3s, transform 0.3s;
    }
    .btn-continuer:hover { background: var(--rouge); transform: translateY(-2px); }

    footer {
        background: #24282c;
        color: #aaa;
        text-align: center;
        padding: 18px 20px;
        font-size: 0.9rem;
    }
    footer strong { color: var(--blanc); }

    /* ====== RESPONSIVE ====== */
    @media (max-width: 560px) {
        .panier-carte { padding: 25px 18px; }
        .article { flex-wrap: wrap; }
        .article-infos { flex-basis: calc(100% - 85px); }
        .article-qte { margin-left: 85px; }
        .article-fin { flex-direction: row; align-items: center; flex: 1; justify-content: space-between; }
    }


    /* ====== ALERTE SUCCÈS ====== */
    .alert-success {
        display: flex;
        align-items: center;
        gap: 10px;
        background: #e6f7ed;
        border: 1px solid #b8e6c9;
        border-left: 5px solid var(--vert);
        color: #1d6b3c;
        padding: 14px 18px;
        border-radius: 10px;
        margin-bottom: 25px;
        font-weight: 600;
        font-size: 0.95rem;
        animation: apparait 0.4s ease;
    }
    @keyframes apparait {
        from { opacity: 0; transform: translateY(-8px); }
        to   { opacity: 1; transform: translateY(0); }
    }


    /* ====== ALERTE ERREUR ====== */
    .alert-erreur {
        display: flex;
        align-items: center;
        gap: 10px;
        background: #fdeae6;
        border: 1px solid #f0b9ac;
        border-left: 5px solid var(--rouge);
        color: #8f2a17;
        padding: 14px 18px;
        border-radius: 10px;
        margin-bottom: 25px;
        font-weight: 600;
        font-size: 0.95rem;
        animation: apparait 0.4s ease;
    }
    @keyframes apparait {
        from { opacity: 0; transform: translateY(-8px); }
        to   { opacity: 1; transform: translateY(0); }
    }

    .liens-panier form { display: flex; }
    .lien-vider {
        background: none;
        border: none;
        color: var(--bleu);
        font-family: inherit;
        font-size: 0.9rem;
        font-weight: 600;
        cursor: pointer;
        padding: 0;
        transition: color 0.3s;
    }
    .lien-vider:hover { color: var(--rouge); }



.article-image img {
    width: 100%;
    height: 100%;
    object-fit: cover;
}
</style>
</head>
<body>

    <div class="topbar">📞 +225 XX XX XX XX XX &nbsp;|&nbsp; ✉️ savtech@gmail.com</div>

    <header>
        <a href="index.html"><div class="logo">Sav<span>Tech</span></div></a>
    </header>

    <div class="panier-zone">
        <div class="panier-carte">

            <h1>Mon <span>Panier</span> 🛒</h1>
@if(session('success'))
    <div class="alert-success">
        ✅ {{ session('success') }}
    </div>
@endif
@error('erreur')
    <div class="alert-erreur">
        ⚠️ {{ $message }}
    </div>
@enderror
@error('erreur_commande')
    <div class="alert-erreur">
        ⚠️ {{ $message }}
    </div>
@enderror
            {{-- ===== CONTENU DU PANIER ===== --}}

            {{-- ==================================================
                 GABARIT D'UN ARTICLE — copiez ce bloc pour ajouter
                 un article, puis remplissez les champs :

                 • emoji / photo     → l'image du produit
                 • nom / specs       → infos du produit
                 • prix unitaire     → prix × 1
                 • quantite          → la valeur de l'input
                 • prix de la ligne  → prix × quantité (à calculer)
                 ================================================== --}}
            {{--

            <div class="article">
                <div class="article-image">EMOJI</div>
                <div class="article-infos">
                    <h3>NOM DU PRODUIT</h3>
                    <p class="specs">CARACTÉRISTIQUES</p>
                    <span class="prix-unitaire">PRIX UNITAIRE FCFA l'unité</span>
                </div>
                <form method="POST" action="" class="article-qte">
                    <input type="number" value="QUANTITE" min="1" name="quantite">
                </form>
                <div class="article-fin">
                    <span class="article-prix">PRIX × QUANTITE FCFA</span>
                    <form method="POST" action="">
                        <button type="submit" class="btn-supprimer" title="Retirer du panier">🗑️</button>
                    </form>
                </div>
            </div>

            --}}

            @foreach($items_panier as $item_panier)
            <div class="article">
                <div class="article-image">
                  @if($item_panier->produit->photo_1)
                     <img src="{{ asset('storage/' . $item_panier->produit->photo_1) }}" alt="{{ $item_panier->produit->nom_produit }}">
                  @endif
                </div>
                <div class="article-infos">
                    <h3>{{ $item_panier->produit->nom_produit }}</h3>
                    <p class="specs">{{ $item_panier->produit->caracteristiques }}</p>
                    <span class="prix-unitaire">{{ number_format($item_panier->produit->prix, 0, ',', ' ') }} FCFA l'unité</span>
                </div>
                <form method="POST" action="{{ route('client.action', $item_panier->id) }}" class="article-qte">
                    @csrf
                    <button type="submit" class="qte-btn" title="Diminuer la quantité" name="action" value="discrease" {{ $item_panier->quantite == 1 ? 'disabled' : '' }} >−</button>
                    <input type="number" value="{{ $item_panier->quantite }}" min="1" name="quantite">
                    <button type="submit" class="qte-btn" title="Augmenter la quantité" name="action" value="add" {{ $item_panier->quantite == $item_panier->produit->quantite ? 'disabled' : '' }} >+</button>
                </form>
                <div class="article-fin">
                    <span class="article-prix">{{ number_format(($item_panier->produit->prix*$item_panier->quantite), 0, ',', ' ') }} FCFA</span>
                    <form method="POST" action="{{ route('client.delete.item', $item_panier->id) }}">
                        <button type="submit" class="btn-supprimer" title="Retirer du panier">🗑️</button>
                    </form>
                </div>
            </div>
            @endforeach

            {{-- ===== RÉCAPITULATIF — ⚠️ chiffres à mettre à jour à la main ===== --}}
            <div class="recapitulatif">
                <div class="recap-ligne">
                    <span>Articles ({{ count($items_panier) }})</span>
                    <strong>
                        {{ number_format($sum_items_panier, 0, ',', ' ') }} FCFA
                    </strong>
                </div>
                <div class="recap-ligne">
                    <span>Livraison</span>
                    <strong>À l'étape suivante</strong>
                </div>
                <div class="recap-ligne">
                    <span>Sous-total</span>
                    <strong>{{ number_format($sum_items_panier, 0, ',', ' ') }} FCFA</strong>
                </div>
                <p class="recap-note">Les frais de livraison sont calculés sur la page de commande</p>
            </div>

            <a href="{{ route('client.commande') }}" class="btn-commander-panier">Passer la commande →</a>

            <div class="liens-panier">
                <a href="{{ route('client.produit.index') }}">← Continuer mes achats</a>
                <form method="POST" action="{{ route('client.delete.all.item') }}">
                    <button type="submit" class="lien-vider">🗑️ Vider le panier</button>
                </form>
            </div>

            {{-- ===== ÉTAT VIDE =====
                 À afficher via Blade quand le panier sera en session :
                 @if(count($articles) == 0) ... ce bloc ... @endif
            --}}
            {{--

            <div class="panier-vide">
                <span class="icone">🛒</span>
                <h2>Votre panier est vide</h2>
                <p>Parcourez notre catalogue et ajoutez vos produits préférés !</p>
                <a href="produits.html" class="btn-continuer">Découvrir nos produits</a>
            </div>

            --}}

        </div>
    </div>

    <footer>© 2025 <strong>SavTech</strong> — Votre satisfaction, notre priorité</footer>
</body>
</html>