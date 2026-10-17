<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Inscription - SavTech</title>
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

    /* ====== ZONE D'INSCRIPTION ====== */
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
        max-width: 460px;              /* un peu plus large : 4 champs */
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
        margin-bottom: 5px;
    }
    .carte-connexion .sous-titre {
        text-align: center;
        color: #888;
        font-size: 0.95rem;
        margin-bottom: 25px;
    }

    .groupe {
        margin-bottom: 16px;
    }
    .groupe label {
        display: block;
        font-weight: 600;
        margin-bottom: 7px;
        color: var(--gris);
        font-size: 0.95rem;
    }
    .champ {
        position: relative;
    }
    .champ input {
        width: 100%;
        padding: 12px 15px;
        border: 2px solid #dde3e8;
        border-radius: 10px;
        font-size: 1rem;
        font-family: inherit;
        color: var(--gris);
        outline: none;
        transition: border-color 0.3s, box-shadow 0.3s;
    }
    .champ input:focus {
        border-color: var(--bleu);
        box-shadow: 0 0 0 3px rgba(26, 111, 181, 0.12);
    }

    .aide-mdp {
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
    .champ input.erreur { border-color: var(--rouge); }

    .options {
        margin: 20px 0 22px;
        font-size: 0.88rem;
    }
    .options label {
        display: flex;
        align-items: center;
        gap: 8px;
        color: #777;
        cursor: pointer;
        line-height: 1.4;
    }
    .options input { accent-color: var(--rouge); width: 16px; height: 16px; flex-shrink: 0; }

    .btn-valider {
        width: 100%;
        padding: 14px;
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

    .inscription {
        text-align: center;
        margin-top: 25px;
        font-size: 0.92rem;
        color: #777;
    }
    .inscription a { color: var(--rouge); font-weight: 700; }
    .inscription a:hover { text-decoration: underline; }

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
        .carte-connexion { padding: 30px 22px; }
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
                <svg width="38" height="38" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"/>
                    <circle cx="12" cy="7" r="4"/>
                    <line x1="20" y1="8" x2="20" y2="14"/>
                    <line x1="23" y1="11" x2="17" y2="11"/>
                </svg>
            </div>

            <h1>Créer un compte</h1>
            <p class="sous-titre">Votre satisfaction, notre priorité</p>

            <form method="POST" action="{{ route('store_register') }}">
                @csrf
                <div class="groupe">
                    <label for="nom">Nom</label>
                    <div class="champ">
                        <input type="text" id="nom" name="nom" placeholder="Ex : Kouassi" required>
                    </div>
                    @error('nom')
                     <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="groupe">
                    <label for="nom">Prénom</label>
                    <div class="champ">
                        <input type="text" id="nom" name="prenom" placeholder="Ex : Jean-Marc" required>
                    </div>
                    @error('prenom')
                     <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="groupe">
                    <label for="numero">Numéro de téléphone</label>
                    <div class="champ">
                        <input type="tel" id="numero" name="numero" placeholder="+225 XX XX XX XX XX" required>
                    </div>
                    @error('numero')
                     <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="groupe">
                    <label for="mdp">Mot de passe</label>
                    <div class="champ">
                        <input type="password" id="mdp" name="password" placeholder="Minimum 8 caractères" required>
                    </div>
                    @error('password')
                     <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                    <small class="aide-mdp">8 caractères minimum, avec au moins un chiffre</small>
                </div>

                <div class="groupe">
                    <label for="mdp-conf">Confirmer le mot de passe</label>
                    <div class="champ">
                        <input type="password" id="mdp-conf" name="password_confirmation" placeholder="Retapez le mot de passe" required>
                    </div>
                </div>

                <div class="options">
                    <label>
                        <input type="checkbox" name="conditions" required>
                        J'accepte les conditions générales de SavTech
                    </label>
                    @error('conditions')
                     <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>

                <button type="submit" class="btn-valider">✨ Créer mon compte</button>
            </form>

            <p class="inscription">Déjà un compte ? <a href="{{ route('login') }}">Se connecter</a></p>
            <a href="{{ route('welcome') }}" class="retour">← Retour à l'accueil</a>
        </div>
    </div>

    <footer>© 2025 <strong>SavTech</strong> — Votre satisfaction, notre priorité</footer>

</body>
</html>