<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Commander - SavTech</title>
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

    /* ====== ZONE DE COMMANDE ====== */
    .commande-zone {
        flex: 1;
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 40px 20px;
        background: linear-gradient(135deg, var(--bleu) 0%, var(--bleu-fonce) 60%, var(--gris) 100%);
    }

    .carte-commande {
        background: var(--blanc);
        width: 100%;
        max-width: 540px;
        border-radius: 15px;
        padding: 35px 35px;
        box-shadow: 0 15px 40px rgba(0,0,0,0.3);
    }

    /* ====== RÉCAP DU PRODUIT ====== */
    .produit-recap {
        display: flex;
        align-items: center;
        gap: 15px;
        padding: 15px;
        background: var(--gris-clair);
        border-radius: 12px;
        margin-bottom: 25px;
    }
    .produit-image {
        width: 75px;
        height: 75px;
        background: #e8edf2;
        border-radius: 10px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 2.4rem;
        overflow: hidden;
        flex-shrink: 0;
    }
    .produit-image img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }
    .produit-infos h2 {
        font-size: 1.1rem;
        color: var(--gris);
        line-height: 1.3;
    }
    .produit-infos .specs {
        font-size: 0.82rem;
        color: #888;
        margin: 3px 0;
    }
    .produit-infos .prix-unitaire {
        color: var(--rouge);
        font-weight: 800;
        font-size: 1.05rem;
    }
    .etat-badge {
        display: inline-block;
        padding: 2px 10px;
        border-radius: 50px;
        font-size: 0.72rem;
        font-weight: bold;
        color: var(--blanc);
        background: var(--bleu);
        margin-bottom: 4px;
    }
    .etat-badge.occasion { background: var(--rouge); }

    /* ====== FORMULAIRE ====== */
    .groupe { margin-bottom: 18px; }
    .groupe label {
        display: block;
        font-weight: 600;
        margin-bottom: 7px;
        color: var(--gris);
        font-size: 0.95rem;
    }
    .groupe input,
    .groupe select,
    .groupe textarea {
        width: 100%;
        padding: 12px 15px;
        border: 2px solid #dde3e8;
        border-radius: 10px;
        font-size: 1rem;
        font-family: inherit;
        color: var(--gris);
        outline: none;
        transition: border-color 0.3s, box-shadow 0.3s;
        background: var(--blanc);
    }
    .groupe textarea { resize: vertical; min-height: 70px; }
    .groupe input:focus,
    .groupe select:focus,
    .groupe textarea:focus {
        border-color: var(--bleu);
        box-shadow: 0 0 0 3px rgba(26, 111, 181, 0.12);
    }

    /* Quantité avec boutons − / + */
    .quantite-ligne {
        display: flex;
        align-items: center;
        gap: 12px;
    }
    .qte-btn {
        width: 44px;
        height: 46px;
        background: var(--gris-clair);
        border: 2px solid #dde3e8;
        border-radius: 10px;
        font-size: 1.3rem;
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
    .qte-btn:disabled { opacity: 0.4; cursor: not-allowed; }
    .quantite-ligne input {
        width: 90px;
        text-align: center;
        font-weight: 700;
    }
    .stock-info {
        font-size: 0.82rem;
        color: #888;
    }

    /* ====== MODES DE PAIEMENT ====== */
    .paiements { display: flex; flex-wrap: wrap; gap: 10px; }
    .paiement {
        flex: 1;
        min-width: 130px;   /* ← 110px devient 130px : 2 par ligne sur mobile */
        border: 2px solid #dde3e8;
        border-radius: 10px;
        padding: 10px 8px;
        text-align: center;
        font-weight: 600;
        font-size: 0.88rem;
        cursor: pointer;
        transition: border-color 0.3s, background 0.3s;
    }
    .paiement input { display: none; }
    .paiement input:checked + span { color: var(--bleu); }
    .paiement:has(input:checked) {
        border-color: var(--bleu);
        background: #f0f7fd;
    }

    /* ====== RÉSUMÉ DE LA COMMANDE ====== */
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

    .btn-valider {
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
    .btn-valider:hover {
        background: var(--bleu);
        transform: translateY(-2px);
        box-shadow: 0 8px 20px rgba(26, 111, 181, 0.35);
    }

    .confiance {
        text-align: center;
        color: #888;
        font-size: 0.85rem;
        margin-top: 14px;
        line-height: 1.5;
    }

    /* ====== ÉTAPES ====== */
    .etapes {
        display: flex;
        justify-content: space-between;
        margin-top: 25px;
        padding-top: 20px;
        border-top: 1px solid #eef1f3;
    }
    .etape { text-align: center; flex: 1; }
    .etape .num {
        width: 30px; height: 30px;
        background: var(--bleu);
        color: var(--blanc);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-weight: bold;
        font-size: 0.85rem;
        margin: 0 auto 6px;
    }
    .etape small { color: #999; font-size: 0.75rem; line-height: 1.3; display: block; }

    .retour {
        display: block;
        text-align: center;
        margin-top: 20px;
        color: var(--bleu);
        font-size: 0.9rem;
        font-weight: 600;
    }
    .retour:hover { color: var(--rouge); }

    footer {
        background: #24282c;
        color: #aaa;
        text-align: center;
        padding: 18px 20px;
        font-size: 0.9rem;
    }
    footer strong { color: var(--blanc); }

    /* ====== RESPONSIVE ====== */
    @media (max-width: 480px) {
        .carte-commande { padding: 25px 20px; }
        .produit-recap { flex-direction: column; text-align: center; }
    }
</style>
</head>
<body>

    <div class="topbar">📞 +225 XX XX XX XX XX &nbsp;|&nbsp; ✉️ savtech@gmail.com</div>

    <header>
        <a href="index.html"><div class="logo">Sav<span>Tech</span></div></a>
    </header>

    <div class="commande-zone">
        <div class="carte-commande">

            {{-- ===== RÉCAP DU PRODUIT ===== --}}
            <div class="produit-recap">
                <div class="produit-image">
                    {{-- Remplacez par : <img src="photos/hp-pavilion.jpg" alt="HP Pavilion 15"> --}}
                    💻
                </div>
                <div class="produit-infos">
                    <span class="etat-badge">{{ $produit->etat }}</span>
                    <h2>{{ $produit->nom_produit }}</h2>
                    <p class="specs">{{ $produit->caracteristiques }}</p>
                    <span class="prix-unitaire">{{ number_format($produit->prix, 0, ',', ' ') }} FCFA</span>
                </div>
            </div>

            <form method="POST" action="traitement-commande">

                {{-- ===== 1. MOYEN DE PAIEMENT (en premier) ===== --}}
                <div class="groupe">
                    <label>Choisissez votre moyen de paiement</label>
                    <div class="paiements">
                        {{--<label class="paiement">
                            <input type="radio" name="paiement" value="livraison" checked>
                            <span>💵 À la livraison</span>
                        </label>--}}
                        <label class="paiement">
                            <input type="radio" name="paiement" value="sur_place">
                            <span>🏪 Paiement sur place</span>
                        </label>
                        <label class="paiement">
                            <input type="radio" name="paiement" value="orange">
                            <span>🟠 Orange Money</span>
                        </label>
                        <label class="paiement">
                            <input type="radio" name="paiement" value="wave">
                            <span>🔵 Wave</span>
                        </label>
                    </div>
                </div>

                {{-- ===== 2. QUANTITÉ ===== --}}
                <div class="groupe">
                    <label>Quantité</label>
                    <div class="quantite-ligne">
                        <button type="button" class="qte-btn" id="btn-moins" onclick="changerQuantite(-1)">−</button>
                        <input type="number" id="quantite" name="quantite" value="1" min="1" max="{{ $produit->quantite }}" required oninput="majTotal()">
                        <button type="button" class="qte-btn" id="btn-plus" onclick="changerQuantite(1)">+</button>
                        <span class="stock-info">{{ $produit->quantite }} en stock</span>
                    </div>
                </div>

                {{-- ===== 3. INFOS CLIENT ===== --}}
                <div class="groupe">
                    <label for="nom">Nom complet</label>
                    <input type="text" id="nom" name="nom" placeholder="Ex : Kouassi Jean" value="{{ auth()->user()->nom }} {{ auth()->user()->prenom }}" required>
                </div>

                <div class="groupe">
                    <label for="numero">Numéro de téléphone</label>
                    <input type="tel" id="numero" name="numero" placeholder="+225 XX XX XX XX XX" value="{{ auth()->user()->numero_telephone }}" required>
                </div>

                <div class="groupe">
                    <label for="zone">Zone de livraison</label>
                    <select id="zone" name="zone" onchange="majTotal()" required>
                        <option value="2000" data-frais="2000">Abidjan centre — 2 000 FCFA</option>
                        <option value="3000" data-frais="3000">Cocody / Marcory — 3 000 FCFA</option>
                        <option value="4000" data-frais="4000">Yopougon / Abobo — 4 000 FCFA</option>
                        <option value="5000" data-frais="5000">Bingerville / Songon — 5 000 FCFA</option>
                        <option value="0" data-frais="0">Retrait en boutique — Gratuit</option>
                    </select>
                </div>

                <div class="groupe">
                    <label for="adresse">Adresse / point de repère (optionnel)</label>
                    <input type="text" id="adresse" name="adresse" placeholder="Ex : Riviera 3, près de la pharmacie">
                </div>

                <div class="groupe">
                    <label for="notes">Remarques (optionnel)</label>
                    <textarea id="notes" name="notes" placeholder="Une précision sur votre commande..."></textarea>
                </div>

                {{-- ===== RÉSUMÉ ===== --}}
                <div class="recapitulatif">
                    <div class="recap-ligne">
                        <span>Sous-total</span>
                        <strong id="sous-total">{{ $produit->prix }} FCFA</strong>
                    </div>
                    <div class="recap-ligne">
                        <span>Livraison</span>
                        <strong id="frais-livraison">2 000 FCFA</strong>
                    </div>
                    <div class="recap-ligne">
                        <span>Total à payer</span>
                        <strong id="total">287 000 FCFA</strong>
                    </div>
                </div>

                <button type="submit" class="btn-valider">✅ Confirmer ma commande</button>
            </form>

            <p class="confiance">
                📞 Nous vous appellerons pour confirmer avant livraison.<br>
                Aucun paiement en ligne — vous payez à la réception.
            </p>

            <div class="etapes">
                <div class="etape"><div class="num">1</div><small>Vous<br>commandez</small></div>
                <div class="etape"><div class="num">2</div><small>Nous vous<br>appelons</small></div>
                <div class="etape"><div class="num">3</div><small>Livraison +<br>paiement</small></div>
            </div>

            <a href="{{ route('client.produit.index') }}" class="retour">← Continuer mes achats</a>
        </div>
    </div>

    <footer>© 2025 <strong>SavTech</strong> — Votre satisfaction, notre priorité</footer>

<script>
    // ===== DONNÉES RÉELLES DU PRODUIT (à remplacer dynamiquement plus tard) =====
    const PRIX_UNITAIRE = {{ $produit->prix }};  // prix du produit en FCFA
    const STOCK_MAX     = {{ $produit->quantite }};       // quantité disponible

    const fcfa = m => m.toLocaleString('fr-FR') + ' FCFA';

    // Boutons − / + (bloqués aux bornes 1 et stock)
    function changerQuantite(delta) {
        const champ = document.getElementById('quantite');
        let v = parseInt(champ.value) || 1;
        v = Math.min(STOCK_MAX, Math.max(1, v + delta));
        champ.value = v;
        majTotal();
    }

    // Recalcule sous-total, frais et total (valeurs RÉELLES affichées au client)
    function majTotal() {
        const qte   = parseInt(document.getElementById('quantite').value) || 1;
        const frais = parseInt(document.getElementById('zone').selectedOptions[0].dataset.frais);

        const sousTotal = PRIX_UNITAIRE * qte;

        document.getElementById('sous-total').textContent     = fcfa(sousTotal);
        document.getElementById('frais-livraison').textContent = frais === 0 ? 'Gratuit' : fcfa(frais);
        document.getElementById('total').textContent          = fcfa(sousTotal + frais);

        // Bloque les boutons aux bornes
        document.getElementById('btn-moins').disabled = (qte <= 1);
        document.getElementById('btn-plus').disabled  = (qte >= STOCK_MAX);
    }

    // Premier calcul au chargement
    majTotal();
</script>
</body>
</html>