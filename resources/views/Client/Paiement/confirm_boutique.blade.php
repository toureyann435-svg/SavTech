<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Confirmation - SavTech</title>
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

    /* ====== ZONE DE CONTENU (fond dégradé + carte centrée) ====== */
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

    /* ====== RÉCAP DE COMMANDE ====== */
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
    .commande-recap .total {
        padding-top: 8px;
        font-weight: 800;
        font-size: 1.1rem;
        color: var(--rouge);
    }

    /* ====== CHAMPS ====== */
    .groupe { margin-bottom: 18px; }
    .groupe > label {
        display: block;
        font-weight: 600;
        margin-bottom: 8px;
        color: var(--gris);
        font-size: 0.95rem;
    }
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

    /* ====== BOUTONS ====== */
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

    /* ====== RESPONSIVE ====== */
    @media (max-width: 480px) {
        .carte-connexion { padding: 25px 18px; }
    }

    /* ====== SPÉCIFIQUE CONFIRMATION ====== */
    .confirmation-hero {
        text-align: center;
        margin-bottom: 25px;
    }
    .coche {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        width: 80px;
        height: 80px;
        background: #e6f7ed;
        border: 3px solid var(--vert);
        border-radius: 50%;
        font-size: 2.6rem;
        margin-bottom: 15px;
        animation: pop 0.5s ease;
    }
    @keyframes pop {
        0%   { transform: scale(0); }
        70%  { transform: scale(1.15); }
        100% { transform: scale(1); }
    }
    .confirmation-hero h1 {
        color: var(--vert);
        font-size: 1.5rem;
        margin-bottom: 8px;
    }
    .confirmation-hero p {
        color: #777;
        font-size: 0.95rem;
        line-height: 1.5;
    }

    /* Code de retrait */
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
        font-size: 2.2rem;
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

    /* Infos boutique */
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
        margin-bottom: 25px;
        font-size: 0.9rem;
        color: #8f2a17;
        line-height: 1.7;
    }
    .apporter strong { display: block; margin-bottom: 4px; }

    /* Boutons */
    .btn-pdf {
        width: 100%;
        padding: 15px;
        background: var(--bleu);
        color: var(--blanc);
        border: none;
        border-radius: 50px;
        font-size: 1.02rem;
        font-family: inherit;
        font-weight: bold;
        cursor: pointer;
        transition: background 0.3s, transform 0.3s, box-shadow 0.3s;
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 10px;
    }
    .btn-pdf:hover {
        background: var(--rouge);
        transform: translateY(-2px);
        box-shadow: 0 8px 20px rgba(232, 73, 42, 0.35);
    }
    .btn-secondaire {
        width: 100%;
        margin-top: 12px;
        padding: 13px;
        background: var(--gris-clair);
        color: var(--gris);
        border: 2px solid #dde3e8;
        border-radius: 50px;
        font-size: 0.95rem;
        font-family: inherit;
        font-weight: 600;
        cursor: pointer;
        transition: background 0.3s, border-color 0.3s;
    }
    .btn-secondaire:hover { border-color: var(--bleu); background: #f0f7fd; }

    /* ====== LE TICKET (invisible à l'écran, imprimé en PDF) ====== */
    .ticket {
        display: none;
    }

    /* ====== À L'IMPRESSION : on ne montre QUE le ticket ====== */
    @media print {
        body * { display: none !important; }   /* tout est masqué... */
        .ticket, .ticket * { display: block !important; }  /* ...sauf le ticket */
        body {
            background: var(--blanc);
            min-height: auto;
            display: block;
        }
        .ticket {
            width: 320px;
            margin: 0 auto;
            padding: 20px;
            border: 2px dashed var(--gris);
            font-family: 'Segoe UI', Tahoma, sans-serif;
            color: #111;
        }
        .ticket-entete {
            text-align: center;
            border-bottom: 2px solid #111;
            padding-bottom: 10px;
            margin-bottom: 12px;
        }
        .ticket-entete .logo-t { font-size: 1.4rem; font-weight: 800; }
        .ticket-entete .logo-t span { color: #e8492a; }
        .ticket-entete small { color: #555; font-size: 0.75rem; }

        .ticket-titre {
            text-align: center;
            font-weight: 800;
            font-size: 1.05rem;
            margin-bottom: 10px;
        }
        .ticket-code {
            text-align: center;
            font-size: 1.8rem;
            font-weight: 800;
            letter-spacing: 4px;
            border: 2px solid #111;
            border-radius: 8px;
            padding: 8px;
            margin-bottom: 12px;
        }
        .ticket-ligne {
            display: flex;
            justify-content: space-between;
            font-size: 0.85rem;
            padding: 3px 0;
        }
        .ticket-total {
            display: flex;
            justify-content: space-between;
            font-weight: 800;
            font-size: 1rem;
            border-top: 2px dashed #111;
            padding-top: 8px;
            margin-top: 6px;
        }
        .ticket-section {
            font-size: 0.78rem;
            color: #333;
            border-top: 1px solid #ccc;
            padding-top: 8px;
            margin-top: 12px;
            line-height: 1.6;
        }
        .ticket-section strong { display: block; margin-bottom: 2px; }
        .ticket-footer {
            text-align: center;
            font-size: 0.72rem;
            color: #555;
            border-top: 2px solid #111;
            margin-top: 12px;
            padding-top: 8px;
        }
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

            {{-- ===== CONFIRMATION ===== --}}
            <div class="confirmation-hero">
                <span class="coche">✅</span>
                <h1>Commande réservée !</h1>
                <p>Votre paiement sur place est enregistré.<br>
                   Présentez ce code à la boutique pour récupérer vos articles.</p>
            </div>

            {{-- ===== CODE DE RETRAIT ===== --}}
            <div class="code-retrait">
                <small>Votre code de retrait</small>
                <div class="code">{{ $paiement->reference }}</div>
                <span class="duree">⏰ Produit réservé jusqu'au {{ Carbon\Carbon::parse($paiement->date)->addDays(3)->format('d-m-Y') }}</span>
            </div>

            {{-- ===== INFOS BOUTIQUE ===== --}}
            <div class="infos-boutique">
                <div class="ligne"><span>📍</span><span><strong>Adresse :</strong> Votre adresse ici, Abidjan</span></div>
                <div class="ligne"><span>🕒</span><span><strong>Horaires :</strong> Lundi — Samedi, 08h00 à 18h00</span></div>
                <div class="ligne"><span>📞</span><span><strong>Contact :</strong> +225 XX XX XX XX XX</span></div>
            </div>

            {{-- ===== RAPPEL ===== --}}
            <div class="apporter">
                <strong>⚠️ À présenter à la boutique :</strong>
                • Ce code de retrait (imprimé ou sur votre téléphone)<br>
                • Une pièce d'identité au nom du titulaire
            </div>

            {{-- ===== BOUTONS ===== --}}
            <button type="button" class="btn-pdf" onclick="telechargerTicket()">
                📄 Télécharger mon ticket en PDF
            </button>
            <button type="button" class="btn-secondaire"
                    onclick="window.location.href='{{ route('client.dashboard') }}'">
                ← Retour à mon espace
            </button>

        </div>
    </div>

    <footer>© 2025 <strong>SavTech</strong> — Votre satisfaction, notre priorité</footer>

    {{-- ===== LE TICKET PDF (apparaît uniquement à l'impression) ===== --}}
    <div class="ticket">
        <div class="ticket-entete">
            <div class="logo-t">Sav<span>Tech</span></div>
            <small>Votre satisfaction, notre priorité</small>
        </div>

        <div class="ticket-titre">TICKET DE RETRAIT — PAIEMENT SUR PLACE</div>

        <div class="ticket-code">{{ $paiement->reference }}</div>

        <div class="ticket-ligne"><span>Commande</span><span></span></div>
        <div class="ticket-ligne"><span>Date de réservation</span><span>{{ $paiement->date }}</span></div>
        <div class="ticket-ligne"><span>À récupérer avant le</span><span>{{ Carbon\Carbon::parse($paiement->date)->addDays(3)->format('d-m-Y') }}</span></div>

        <div class="ticket-section">
            <strong>Détail de la commande</strong>
            @foreach ( $paiement->commande->item_commande as $items )
             <div class="ticket-ligne"><span>{{ $items->produit->nom_produit }} ×{{ $items->quantite }}</span><span>{{ number_format($items->prix_unitaire, 0, ',', ' ') }} FCFA</span></div>
            @endforeach
            <div class="ticket-total"><span>Total à payer</span><span>{{ number_format($paiement->montant, 0, ',', ' ') }} FCFA</span></div>
        </div>

        <div class="ticket-section">
            <strong>Boutique SavTech</strong>
            📍 Votre adresse ici, Abidjan<br>
            🕒 Lundi — Samedi, 08h00 à 18h00<br>
            📞 +225 XX XX XX XX XX
        </div>

        <div class="ticket-footer">
            Présentez ce ticket accompagné d'une pièce d'identité.<br>
            Le produit est réservé jusqu'au {{ Carbon\Carbon::parse($paiement->date)->addDays(3)->format('d-m-Y') }}.
        </div>
    </div>

<script>
    // Ouvre la boîte d'impression du navigateur :
    // le client choisit « Enregistrer au format PDF » → obtient son fichier.
    // Le CSS @media print ne laisse apparaître que le ticket.
    function telechargerTicket() {
        window.print();
    }
</script>
</body>
</html>