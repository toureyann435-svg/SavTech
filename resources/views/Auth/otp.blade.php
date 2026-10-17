<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Vérification du code - SavTech</title>
<style>
    * { margin: 0; padding: 0; box-sizing: border-box; }

    :root {
        --blanc: #ffffff;
        --bleu: #1a6fb5;
        --bleu-fonce: #12507f;
        --rouge: #e8492a;
        --gris: #3a3f44;
        --gris-clair: #f4f6f8;
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

    /* ====== ZONE OTP ====== */
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
        max-width: 460px;
        border-radius: 15px;
        padding: 40px 35px;
        box-shadow: 0 15px 40px rgba(0,0,0,0.3);
    }

    .carte-connexion .rond-logo {
        width: 75px; height: 75px;
        background: var(--bleu);
        border-radius: 50%;
        margin: 0 auto 20px;
        display: flex;
        align-items: center;
        justify-content: center;
        color: var(--blanc);
    }

    .carte-connexion h1 {
        text-align: center;
        color: var(--bleu);
        font-size: 1.7rem;
        margin-bottom: 8px;
    }

    .message-envoi {
        text-align: center;
        color: #777;
        font-size: 0.95rem;
        margin-bottom: 8px;
        line-height: 1.5;
    }
    .message-envoi strong { color: var(--gris); }

    .changer-numero {
        display: block;
        text-align: center;
        color: var(--bleu);
        font-size: 0.88rem;
        font-weight: 600;
        margin-bottom: 28px;
    }
    .changer-numero:hover { color: var(--rouge); }

    /* ====== LE CHAMP CODE (un seul input) ====== */
    .champ-code input {
        width: 100%;
        height: 64px;
        text-align: center;
        font-size: 1.8rem;
        font-weight: 800;
        letter-spacing: 18px;      /* espace visuellement les chiffres */
        text-indent: 18px;         /* compense le décalage du letter-spacing */
        font-family: inherit;
        color: var(--gris);
        border: 2px solid #dde3e8;
        border-radius: 12px;
        outline: none;
        transition: border-color 0.3s, box-shadow 0.3s, background 0.3s;
    }
    .champ-code input::placeholder {
        letter-spacing: 18px;
        text-indent: 18px;
        color: #c3cbd3;
        font-weight: 700;
    }
    .champ-code input:focus {
        border-color: var(--bleu);
        box-shadow: 0 0 0 3px rgba(26, 111, 181, 0.12);
        background: #f8fbfe;
    }
    .champ-code input.erreur {
        border-color: var(--rouge);
        background: #fdeae6;
        animation: secoue 0.4s;
    }
    @keyframes secoue {
        0%, 100% { transform: translateX(0); }
        25%      { transform: translateX(-6px); }
        75%      { transform: translateX(6px); }
    }

    .aide-code {
        display: block;
        text-align: center;
        margin-top: 8px;
        color: #999;
        font-size: 0.82rem;
    }

    .texte-erreur {
        display: block;
        text-align: center;
        color: var(--rouge);
        font-size: 0.85rem;
        font-weight: 600;
        margin: 12px 0 4px;
        min-height: 1.2em;
    }

    .btn-valider {
        width: 100%;
        padding: 14px;
        margin-top: 12px;
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

    .renvoyer {
        text-align: center;
        margin-top: 22px;
        font-size: 0.9rem;
        color: #777;
    }
    .renvoyer a { color: var(--bleu); font-weight: 700; }
    .renvoyer a:hover { color: var(--rouge); }

    .retour {
        display: block;
        text-align: center;
        margin-top: 15px;
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
        .carte-connexion { padding: 30px 20px; }
        .champ-code input,
        .champ-code input::placeholder {
            letter-spacing: 12px;
            text-indent: 12px;
            font-size: 1.5rem;
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
            <div class="rond-logo">
                <svg width="36" height="36" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <rect x="3" y="11" width="18" height="11" rx="2" ry="2"/>
                    <path d="M7 11V7a5 5 0 0 1 10 0v4"/>
                </svg>
            </div>

            <h1>Vérification</h1>

            <p class="message-envoi">
                Nous avons envoyé un code à 6 chiffres au<br>
                <strong>+225 XX XX XX XX XX</strong>
            </p>
            <a href="inscription.html" class="changer-numero">✏️ Modifier le numéro</a>

            <form method="POST" action="{{ route('verify_otp') }}">
                @error('erreur')
                 <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                <div class="champ-code">
                    <input type="text"
                           inputmode="numeric"
                           pattern="[0-9]{6}"
                           maxlength="6"
                           autocomplete="one-time-code"
                           placeholder="••••••"
                           title="Entrez les 6 chiffres reçus par SMS"
                           required name="otp">
                    @error('otp')
                     <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <small class="aide-code">Saisissez les 6 chiffres reçus par SMS</small>

                <span class="texte-erreur"></span>

                <button type="submit" class="btn-valider">✅ Vérifier le code</button>
            </form>

            <p class="renvoyer">Vous n'avez rien reçu ? <a href="renvoyer-otp">Renvoyer le code</a></p>
            <a href="connexion.html" class="retour">← Retour à la connexion</a>
        </div>
    </div>

    <footer>© 2025 <strong>SavTech</strong> — Votre satisfaction, notre priorité</footer>

</body>
</html>