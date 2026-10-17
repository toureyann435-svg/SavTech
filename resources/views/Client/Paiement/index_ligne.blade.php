<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Paiement en ligne - SavTech</title>
<style>
    /* ====== COLLEZ ICI LE CSS COMMUN ====== */

    /* ====== SPÉCIFIQUE PAIEMENT EN LIGNE ====== */
    .montant-hero {
        text-align: center;
        background: var(--gris-clair);
        border-radius: 12px;
        padding: 18px;
        margin-bottom: 22px;
    }
    .montant-hero small { color: #888; font-size: 0.82rem; }
    .montant-hero .montant {
        font-size: 2.2rem;
        font-weight: 800;
        color: var(--rouge);
        line-height: 1.2;
    }
    .montant-hero .code {
        display: inline-block;
        margin-top: 4px;
        background: var(--bleu);
        color: var(--blanc);
        font-size: 0.75rem;
        font-weight: bold;
        padding: 3px 14px;
        border-radius: 50px;
    }

        * { margin: 0; padding: 0; box-sizing: border-box; }

    :root {
        --blanc: #ffffff;
        --bleu: #1a6fb5;
        --bleu-fonce: #12507f;
        --rouge: #e8492a;
        --gris: #3a3f44;
        --gris-clair: #f4f6f8;
        --vert: #2e9e5b;
        --orange: #e8942a;
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

    /* ====== ZONE DE PAIEMENT ====== */
    .connexion-zone {
        flex: 1;
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 40px 20px;
        background: linear-gradient(135deg, var(--bleu) 0%, var(--bleu-fonce) 60%, var(--gris) 100%);
    }
    .carte-connexion {
        background: var(--blanc);
        width: 100%;
        max-width: 480px;
        border-radius: 15px;
        padding: 35px;
        box-shadow: 0 15px 40px rgba(0,0,0,0.3);
    }
    .carte-connexion h1 {
        text-align: center;
        color: var(--bleu);
        font-size: 1.6rem;
        margin-bottom: 25px;
    }

    /* ====== RÉCAP DE LA COMMANDE ====== */
    .commande-recap {
        background: var(--gris-clair);
        border-radius: 12px;
        padding: 15px 18px;
        margin-bottom: 22px;
    }
    .commande-recap .ligne {
        display: flex;
        justify-content: space-between;
        font-size: 0.88rem;
        color: #777;
        padding: 4px 0;
    }
    .commande-recap .ligne strong { color: var(--gris); }
    .commande-recap .produits {
        margin: 6px 0;
        padding: 6px 0;
        border-top: 1px dashed #d7dee5;
        border-bottom: 1px dashed #d7dee5;
    }
    .commande-recap .total {
        justify-content: space-between;
        padding-top: 8px;
        font-weight: 800;
        font-size: 1.15rem;
        color: var(--rouge);
    }

    /* ====== CHOIX DU MOYEN (Wave / Orange Money) ====== */
    .groupe { margin-bottom: 18px; }
    .groupe > label {
        display: block;
        font-weight: 600;
        margin-bottom: 8px;
        color: var(--gris);
        font-size: 0.95rem;
    }
    .moyens {
        display: flex;
        gap: 10px;
    }
    .moyen { flex: 1; }
    .moyen input { display: none; }
    .moyen-carte {
        display: flex;
        flex-direction: column;
        align-items: center;
        gap: 4px;
        padding: 14px 10px;
        border: 2px solid #dde3e8;
        border-radius: 12px;
        cursor: pointer;
        font-weight: 700;
        font-size: 0.92rem;
        color: var(--gris);
        transition: border-color 0.3s, background 0.3s, transform 0.3s;
    }
    .moyen-carte .logo-moyen { font-size: 1.6rem; line-height: 1; }
    .moyen-carte:hover { border-color: var(--bleu); transform: translateY(-2px); }
    .moyen input:checked + .moyen-carte {
        border-color: var(--bleu);
        background: #f0f7fd;
        box-shadow: 0 0 0 3px rgba(26, 111, 181, 0.15);
    }

    /* ====== CHAMPS ====== */
    .groupe input {
        width: 100%;
        padding: 13px 15px;
        border: 2px solid #dde3e8;
        border-radius: 10px;
        font-size: 1rem;
        font-family: inherit;
        color: var(--gris);
        outline: none;
        transition: border-color 0.3s, box-shadow 0.3s;
    }
    .groupe input:focus {
        border-color: var(--bleu);
        box-shadow: 0 0 0 3px rgba(26, 111, 181, 0.12);
    }
    .aide-champ {
        display: block;
        margin-top: 6px;
        color: #999;
        font-size: 0.8rem;
    }
    .texte-erreur {
        display: block;
        margin-top: 5px;
        color: var(--rouge);
        font-size: 0.85rem;
        font-weight: 600;
    }

    /* ====== BOUTON ====== */
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

    .retour {
        display: block;
        text-align: center;
        margin-top: 18px;
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

    @media (max-width: 480px) {
        .carte-connexion { padding: 25px 18px; }
    }


        .groupe select {
        width: 100%;
        padding: 13px 15px;
        border: 2px solid #dde3e8;
        border-radius: 10px;
        font-size: 1rem;
        font-family: inherit;
        color: var(--gris);
        background: var(--blanc);
        outline: none;
        transition: border-color 0.3s, box-shadow 0.3s;
        cursor: pointer;
    }
    .groupe select:focus {
        border-color: var(--bleu);
        box-shadow: 0 0 0 3px rgba(26, 111, 181, 0.12);
    }
</style>
</head>
<body>

    <div class="topbar">📞 +225 XX XX XX XX XX &nbsp;|&nbsp; ✉️ savtech@gmail.com</div>

    <header>
        <a href="index.html"><div class="logo">Sav<span>Tech</span></div></a>
    </header>

    <div class="connexion-zone">
        <div class="carte-connexion">

            <h1>💳 Paiement en ligne</h1>

            {{-- ===== MONTANT À PAYER ===== --}}
            <div class="montant-hero">
                <small>Montant à payer</small>
                <div class="montant">{{ number_format($commande->montant_total, 0, ',', ' ') }} FCFA</div>
                <span class="code">Commande {{ $commande->code }}</span>
            </div>

            {{-- ===== RÉCAP DE LA COMMANDE ===== --}}
            <div class="commande-recap">
                @foreach ( $commande->item_commande as $items )
                 <div class="ligne"><span>{{ $items->produit->nom_produit }} ×{{ $items->quantite }}</span><strong>{{ number_format($items->prix_unitaire, 0, ',', ' ') }} FCFA</strong></div>
                @endforeach
                <div class="ligne"><span>Livraison</span><strong>Gratuite</strong></div>
            </div>

            <form method="POST" action="traitement-paiement-en-ligne">
                                {{-- ===== LOCALISATION ===== --}}
                <div class="groupe">
                    <label for="commune">Votre commune de livraison</label>
                    <select id="commune" name="commune" required onchange="communeChangee()">
                        <option value="" disabled selected>— Choisissez votre commune —</option>
                        <option value="boutique" data-distance="0">🏪 Retrait en boutique — Gratuit</option>
                        <option value="Plateau" data-distance="3">Plateau (≈ 3 km)</option>
                        <option value="Adjamé" data-distance="4">Adjamé (≈ 4 km)</option>
                        <option value="Treichville" data-distance="5">Treichville (≈ 5 km)</option>
                        <option value="Attécoubé" data-distance="6">Attécoubé (≈ 6 km)</option>
                        <option value="Marcory" data-distance="7">Marcory (≈ 7 km)</option>
                        <option value="Koumassi" data-distance="9">Koumassi (≈ 9 km)</option>
                        <option value="Cocody" data-distance="10">Cocody (≈ 10 km)</option>
                        <option value="Abobo" data-distance="11">Abobo (≈ 11 km)</option>
                        <option value="Yopougon" data-distance="12">Yopougon (≈ 12 km)</option>
                        <option value="Port-Bouët" data-distance="13">Port-Bouët (≈ 13 km)</option>
                        <option value="Riviera" data-distance="14">Riviera (≈ 14 km)</option>
                        <option value="Anyama" data-distance="15">Anyama (≈ 15 km)</option>
                        <option value="Bingerville" data-distance="18">Bingerville (≈ 18 km)</option>
                        <option value="Songon" data-distance="25">Songon (≈ 25 km)</option>
                        <option value="autre" data-distance="0">Autre / hors Abidjan — je précise la distance</option>
                    </select>
                </div>

                <div class="groupe" id="bloc-distance" style="display:none;">
                    <label for="distance">Distance depuis la boutique (km)</label>
                    <input type="number" id="distance" name="distance" min="0" step="0.5"
                           value="0" oninput="majTotal()">
                    <small class="aide-champ">Estimation acceptée — le livreur vous confirmera par téléphone</small>
                </div>

                {{-- ===== ADRESSE PRÉCISE ===== --}}
                <div class="groupe" id="bloc-adresse" style="display:none;">
                    <label for="adresse">Adresse précise / point de repère</label>
                    <input type="text" id="adresse" name="adresse"
                           placeholder="Ex : Riviera 3, près de la pharmacie Saint-Jean">
                </div>

                {{-- ===== CHOIX DU MOYEN ===== --}}
                <div class="groupe">
                    <label>Choisissez votre moyen de paiement</label>
                    <div class="moyens">
                        <label class="moyen">
                            <input type="radio" name="moyen" value="wave" required>
                            <span class="moyen-carte">
                                <span class="logo-moyen">🌊</span>
                                Wave
                            </span>
                        </label>
                        <label class="moyen">
                            <input type="radio" name="moyen" value="orange_money" required>
                            <span class="moyen-carte">
                                <span class="logo-moyen">🟠</span>
                                Orange Money
                            </span>
                        </label>
                    </div>
                </div>

                {{-- ===== NUMÉRO DE PAIEMENT ===== --}}
                <div class="groupe">
                    <label for="numero-paiement">Numéro du compte à débiter</label>
                    <input type="tel" id="numero-paiement" name="numero_paiement"
                           placeholder="Ex : 07 07 07 07 07" required>
                    <small class="aide-champ" id="aide-numero">
                        Un code de confirmation vous sera envoyé sur ce numéro
                    </small>
                    @error('numero_paiement')
                        <span class="texte-erreur">{{ $message }}</span>
                    @enderror
                </div>

                {{-- ===== NOM DU TITULAIRE ===== --}}
                <div class="groupe">
                    <label for="titulaire">Nom du titulaire du compte</label>
                    <input type="text" id="titulaire" name="titulaire"
                           placeholder="Ex : Kouassi Jean" required>
                    <small class="aide-champ">Le nom associé au compte Wave ou Orange Money</small>
                </div>

                <button type="submit" class="btn-valider">Payer {{ number_format($commande->montant_total, 0, ',', ' ') }} FCFA</button>
            </form>

            <p class="aide-champ" style="text-align:center; margin-top: 14px;">
                🔒 Paiement sécurisé — vous recevrez une demande de confirmation
                sur votre téléphone à valider avec votre code secret.
            </p>

            <a href="{{ route('client.dashboard') }}" class="retour">← Retour à mon espace</a>
        </div>
    </div>

    <footer>© 2025 <strong>SavTech</strong> — Votre satisfaction, notre priorité</footer>

<script>
// ===== TARIFICATION DE LIVRAISON (à ajuster selon vos tarifs) =====
const FORFAIT_BASE = 1000;   // FCFA — prise en charge du livreur
const TARIF_KM     = 100;    // FCFA par km

const fcfa = m => m.toLocaleString('fr-FR') + ' FCFA';

// Sous-total des produits (lu depuis le data-attribute du récap)
const SOUS_TOTAL = parseFloat(
    document.getElementById('recap-produits').dataset.sousTotal
) || 0;

const selectCommune = document.getElementById('commune');
const champDistance = document.getElementById('distance');

// Quand on choisit une commune : pré-remplir la distance et ajuster les blocs
function communeChangee() {
    const option = selectCommune.selectedOptions[0];
    const distance = parseFloat(option.dataset.distance) || 0;

    // La distance s'affiche (modifiable pour "Autre")
    champDistance.value = distance;
    champDistance.readOnly = (selectCommune.value !== 'autre');

    // L'adresse n'est utile que pour une livraison
    document.getElementById('bloc-adresse').style.display =
        selectCommune.value === 'boutique' ? 'none' : 'block';

    // La distance ne se modifie que pour "Autre"
    document.getElementById('bloc-distance').style.display =
        (selectCommune.value === '' || selectCommune.value === 'boutique')
            ? 'none' : 'block';

    majTotal();
}

// Calcule les frais et met à jour le récap + le bouton (valeurs RÉELLES)
function majTotal() {
    const commune = selectCommune.value;
    let frais = 0;

    if (commune === 'boutique') {
        frais = 0;
    } else if (commune !== '' ) {
        const distance = parseFloat(champDistance.value) || 0;
        frais = distance > 0 ? FORFAIT_BASE + Math.round(distance * TARIF_KM) : FORFAIT_BASE;
    }

    const total = SOUS_TOTAL + frais;

    // Mise à jour du récap
    document.getElementById('frais-livraison').textContent =
        commune === 'boutique' ? 'Gratuit (retrait)' : (frais > 0 ? fcfa(frais) : '— À calculer');
    document.getElementById('total-a-payer').textContent = fcfa(total);

    // Le bouton affiche le vrai montant à débiter
    document.querySelector('.btn-valider').textContent = 'Payer ' + fcfa(total);
}

// Premier calcul au chargement
majTotal();
</script>
</body>
</html>