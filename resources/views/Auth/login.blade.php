<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Connexion - SavTech</title>
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

    /* ====== ZONE DE CONNEXION ====== */
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
        max-width: 420px;
        border-radius: 15px;
        padding: 45px 35px;
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
        margin-bottom: 30px;
    }

    .groupe {
        margin-bottom: 20px;
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
        padding: 13px 15px;
        border: 2px solid #dde3e8;
        border-radius: 10px;
        font-size: 1rem;
        color: var(--gris);
        outline: none;
        transition: border-color 0.3s;
    }
    .champ input:focus { border-color: var(--bleu); }

    .toggle-mdp {
        position: absolute;
        right: 12px;
        top: 50%;
        transform: translateY(-50%);
        background: none;
        border: none;
        cursor: pointer;
        color: #999;
        display: flex;
        padding: 4px;
    }
    .toggle-mdp:hover { color: var(--bleu); }

    .options {
        display: flex;
        justify-content: space-between;
        align-items: center;
        font-size: 0.88rem;
        margin-bottom: 25px;
        flex-wrap: wrap;
        gap: 8px;
    }
    .options label {
        display: flex;
        align-items: center;
        gap: 6px;
        color: #777;
        cursor: pointer;
    }
    .options input { accent-color: var(--rouge); }
    .options a { color: var(--bleu); font-weight: 600; }
    .options a:hover { color: var(--rouge); }

    .btn-connexion {
        width: 100%;
        padding: 14px;
        background: var(--rouge);
        color: var(--blanc);
        border: none;
        border-radius: 50px;
        font-size: 1.05rem;
        font-weight: bold;
        cursor: pointer;
        transition: background 0.3s, transform 0.3s, box-shadow 0.3s;
    }
    .btn-connexion:hover {
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
</style>
</head>
<body>

    <div class="topbar">📞 +225 XX XX XX XX XX &nbsp;|&nbsp; ✉️ savtech@gmail.com</div>

    <header>
        <a href="{{ route('welcome') }}"><div class="logo">Sav<span>Tech</span></div></a>
    </header>

    <div class="connexion-zone">
        <div class="carte-connexion">
            <div class="rond-logo">
                <svg width="38" height="38" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"/>
                    <circle cx="12" cy="7" r="4"/>
                </svg>
            </div>

            <h1>Connexion</h1>
            <p class="sous-titre">Votre satisfaction, notre priorité</p>
            @if(session('erreur'))
             <div class="alert alert-danger">
                {{ session('erreur') }}
             </div>
            @endif
            <form action="{{ route('login.store') }}" method="POST">
                @csrf
                <div class="groupe">
                    <label for="numero">Numéro de téléphone</label>
                    <div class="champ">
                        <input type="tel" id="numero" placeholder="+225 XX XX XX XX XX" name="numero_telephone">
                    </div>
                </div>

                <div class="groupe">
                    <label for="mdp">Mot de passe</label>
                    <div class="champ">
                        <input type="password" id="mdp" placeholder="Votre mot de passe" name="password">
                        <button type="button" class="toggle-mdp" onclick="voirMdp()" title="Afficher / masquer">
                            <svg id="oeil" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"/>
                                <circle cx="12" cy="12" r="3"/>
                            </svg>
                        </button>
                    </div>
                </div>

                <div class="options">
                    <label><input type="checkbox" name="remember"> Se souvenir de moi</label>
                    <a href="#">Mot de passe oublié ?</a>
                </div>

                <button type="submit" class="btn-connexion">Se connecter</button>
            </form>

            <p class="inscription">Pas encore de compte ? <a href="{{ route('register') }}">Créer un compte</a></p>
            <a href="{{ route('welcome') }}" class="retour">← Retour à l'accueil</a>
        </div>
    </div>

    <footer>© 2025 <strong>SavTech</strong> — Votre satisfaction, notre priorité</footer>

<script>
    // Afficher / masquer le mot de passe
    function voirMdp() {
        const champ = document.getElementById('mdp');
        champ.type = (champ.type === 'password') ? 'text' : 'password';
    }

    // Connexion (démo — à brancher sur un serveur plus tard)
    function connexion(e) {
        e.preventDefault();
        const numero = document.getElementById('numero').value.trim();
        const mdp = document.getElementById('mdp').value;

        if (numero.length < 8) {
            alert('Veuillez entrer un numéro de téléphone valide.');
            return false;
        }
        if (mdp.length < 4) {
            alert('Le mot de passe doit contenir au moins 4 caractères.');
            return false;
        }
        alert('Connexion réussie ! (Démo — la vérification réelle se fera côté serveur)');
        return false;
    }
</script>
</body>
</html>