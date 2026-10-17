<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Paiement sur place - SavTech</title>
<style>
    /* ====== COLLEZ ICI LE CSS COMMUN ====== */

    /* ====== SPÉCIFIQUE PAIEMENT SUR PLACE ====== */
    .code-retrait {
        text-align: center;
        background: var(--gris-clair);
        border: 2px dashed var(--bleu);
        border-radius: 12px;
        padding: 20px;
        margin-bottom: 22px;
    }
    .code-retrait small { color: #888; font-size: 0.82rem; }
    .code-retrait .code {
        font-size: 2rem;
        font-weight: 800;
        letter-spacing: 5px;
        color: var(--bleu);
        margin: 6px 0;
    }
    .code-retrait .duree {
        display: inline-block;
        background: var(--orange);
        color: var(--blanc);
        font-size: 0.78rem;
        font-weight: bold;
        padding: 3px 14px;
        border-radius: 50px;
    }

    .infos-boutique {
        background: var(--gris-clair);
        border-radius: 12px;
        padding: 15px 18px;
        margin-bottom: 22px;
    }
    .infos-boutique .ligne {
        display: flex;
        align-items: flex-start;
        gap: 10px;
        padding: 6px 0;
        font-size: 0.92rem;
        color: #777;
    }
    .infos-boutique .ligne strong { color: var(--gris); }

    .apporter {
        border-left: 5px solid var(--rouge);
        background: #fdeae6;
        border-radius: 8px;
        padding: 14px 18px;
        margin-bottom: 22px;
        font-size: 0.9rem;
        color: #8f2a17;
    }
    .apporter strong { display: block; margin-bottom: 4px; }



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
</style>
</head>
<body>

    <div class="topbar">📞 +225 XX XX XX XX XX &nbsp;|&nbsp; ✉️ savtech@gmail.com</div>

    <header>
        <a href="index.html"><div class="logo">Sav<span>Tech</span></div></a>
    </header>

    <div class="connexion-zone">
        <div class="carte-connexion">

            <h1>🏪 Paiement sur place</h1>

            {{-- ===== CODE DE RETRAIT ===== --}}
            <div class="code-retrait">
                <small>Votre code de retrait</small>
                <div class="code">{{ $code_retrait }}</div>
                <span class="duree">⏰ Produit réservé pendant 72 heures</span>
            </div>

            {{-- ===== RÉCAP DE LA COMMANDE ===== --}}
            <div class="commande-recap">
                @foreach ( $commande->item_commande as $items )
                 <div class="ligne"><span>{{ $items->produit->nom_produit }} ×{{ $items->quantite }}</span><strong>{{ number_format($items->prix_unitaire, 0, ',', ' ') }} FCFA</strong></div>
                @endforeach
                <div class="ligne total"><span>Total à payer à la boutique</span><span>{{ number_format($commande->montant_total, 0, ',', ' ') }} FCFA</span></div>
            </div>

            {{-- ===== INFOS BOUTIQUE ===== --}}
            <div class="infos-boutique">
                <div class="ligne"><span>📍</span><span><strong>Adresse :</strong> Votre adresse ici, Abidjan</span></div>
                <div class="ligne"><span>🕒</span><span><strong>Horaires :</strong> Lundi — Samedi, 08h00 à 18h00</span></div>
                <div class="ligne"><span>📞</span><span><strong>Contact :</strong> +225 XX XX XX XX XX</span></div>
            </div>

            {{-- ===== CE QU'IL FAUT APPORTER ===== --}}
            <div class="apporter">
                <strong>⚠️ N'oubliez pas d'apporter :</strong>
                • Votre code de retrait ({{ $code_retrait }})<br>
                • Une pièce d'identité au nom du titulaire de la commande
            </div>

            <form method="POST" action="{{ route('client.paiement.boutique.store', $commande->id) }}">
                @csrf
                <button type="submit" class="btn-valider" name="validation" value="validation">✅ J'ai compris, je passerai à la boutique</button>
            </form>

            <a href="/mon-espace" class="retour">← Retour à mon espace</a>
        </div>
    </div>

    <footer>© 2025 <strong>SavTech</strong> — Votre satisfaction, notre priorité</footer>

</body>
</html>