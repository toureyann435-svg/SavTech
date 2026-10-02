<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Nos Produits - SavTech</title>
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
        background: var(--blanc);
        line-height: 1.6;
    }
    a { text-decoration: none; }
    .container { max-width: 1150px; margin: 0 auto; padding: 0 20px; }

    /* ====== HEADER ====== */
    .topbar {
        background: var(--gris);
        color: var(--blanc);
        font-size: 0.9rem;
        padding: 8px 0;
    }
    .topbar .container { display: flex; justify-content: space-between; flex-wrap: wrap; gap: 10px; }
    .topbar .rouge { color: #ff8a70; font-weight: bold; }

    header {
        background: var(--blanc);
        box-shadow: 0 2px 12px rgba(0,0,0,0.08);
        position: sticky;
        top: 0;
        z-index: 100;
    }
    nav {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 15px 20px;
        max-width: 1150px;
        margin: 0 auto;
        flex-wrap: wrap;
    }
    .logo { font-size: 1.8rem; font-weight: 800; color: var(--bleu); }
    .logo span { color: var(--rouge); }
    .nav-links { display: flex; gap: 25px; flex-wrap: wrap; align-items: center; }
    .nav-links a { color: var(--gris); font-weight: 600; transition: color 0.3s; }
    .nav-links a:hover { color: var(--rouge); }
    .nav-links a.actif { color: var(--bleu); border-bottom: 3px solid var(--rouge); }

    /* ====== BANNIÈRE ====== */
    .banniere {
        background: linear-gradient(135deg, var(--bleu) 0%, var(--bleu-fonce) 60%, var(--gris) 100%);
        color: var(--blanc);
        text-align: center;
        padding: 60px 20px;
    }
    .banniere h1 { font-size: 2.4rem; margin-bottom: 10px; }
    .banniere h1 span { color: #ffd0c4; }
    .banniere p { opacity: 0.95; font-size: 1.1rem; }

    /* ====== FILTRES ====== */
    .filtres {
        display: flex;
        justify-content: center;
        flex-wrap: wrap;
        gap: 12px;
        padding: 40px 20px 10px;
    }
    .filtre {
        padding: 10px 22px;
        border: 2px solid var(--bleu);
        color: var(--bleu);
        background: var(--blanc);
        border-radius: 50px;
        font-weight: 600;
        cursor: pointer;
        transition: all 0.3s;
    }
    .filtre:hover { background: var(--bleu); color: var(--blanc); }
    .filtre.actif { background: var(--rouge); border-color: var(--rouge); color: var(--blanc); }

    /* ====== GRILLE PRODUITS ====== */
    #catalogue { padding: 40px 0 80px; }
    .grille {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
        gap: 30px;
    }
    .produit {
        background: var(--blanc);
        border-radius: 12px;
        overflow: hidden;
        box-shadow: 0 4px 15px rgba(0,0,0,0.08);
        border-top: 4px solid var(--bleu);
        transition: transform 0.3s, box-shadow 0.3s;
        display: flex;
        flex-direction: column;
    }
    .produit:hover { transform: translateY(-8px); box-shadow: 0 12px 25px rgba(0,0,0,0.15); }
    .produit:nth-child(even) { border-top-color: var(--rouge); }

    .image-produit {
        height: 160px;
        background: var(--gris-clair);
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 4rem;
        position: relative;
    }
    /* Remplacez l'emoji par une vraie photo :
       <div class="image-produit"><img src="photo.jpg" style="width:100%;height:100%;object-fit:cover;" alt=""></div> */

    .badge {
        position: absolute;
        top: 10px;
        left: 10px;
        padding: 4px 12px;
        border-radius: 50px;
        font-size: 0.75rem;
        font-weight: bold;
        color: var(--blanc);
    }
    .badge.neuf { background: var(--bleu); }
    .badge.occasion { background: var(--rouge); }

    .infos { padding: 20px; flex: 1; display: flex; flex-direction: column; }
    .infos h3 { color: var(--gris); font-size: 1.05rem; margin-bottom: 6px; }
    .infos .specs { font-size: 0.85rem; color: #777; flex: 1; }
    .prix {
        color: var(--rouge);
        font-size: 1.3rem;
        font-weight: 800;
        margin: 12px 0;
    }
    .btn-connexion {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        background: var(--bleu);
        color: var(--blanc) !important;
        padding: 9px 18px;
        border-radius: 50px;
        font-weight: 600;
        line-height: 1; /* ← évite que le bouton soit trop haut */
        transition: background 0.3s, transform 0.3s, box-shadow 0.3s;
    }
    .btn-connexion:hover {
        background: var(--rouge);
        transform: translateY(-2px);
        box-shadow: 0 5px 15px rgba(232, 73, 42, 0.35);
    }
    .btn-commander {
        flex: 1;
        display: block;
        text-align: center;
        background: var(--bleu);
        color: var(--blanc);
        padding: 10px 8px;
        border-radius: 50px;
        font-weight: 600;
        font-size: 0.9rem;
        transition: background 0.3s;
    }
    .btn-commander:hover { background: var(--rouge); }

    /* ====== Boutons Commander + Panier côte à côte ====== */
    .actions-produit {
        display: flex;
        gap: 10px;
    }
    .btn-panier {
        flex: 1.2;
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 6px;
        background: var(--rouge);
        color: var(--blanc);
        padding: 10px 8px;
        border: none;
        border-radius: 50px;
        font-weight: 600;
        font-size: 0.9rem;
        font-family: inherit;
        cursor: pointer;
        transition: background 0.3s, transform 0.3s;
    }
    .btn-panier:hover { background: var(--bleu); transform: translateY(-2px); }
    .btn-panier.ajoute { background: #2e9e5b; } /* vert quand l'ajout réussit */

    /* ====== FOOTER ====== */
    footer {
        background: #24282c;
        color: #aaa;
        text-align: center;
        padding: 25px 20px;
        font-size: 0.9rem;
    }
    footer strong { color: var(--blanc); }
    footer .rouge { color: #ff8a70; }

    .vide {
        text-align: center;
        color: #999;
        padding: 60px 20px;
        grid-column: 1 / -1;
    }
</style>
</head>
<body>
    <div class="topbar">
        <div class="container">
            <div>📞 <span class="rouge">+225 XX XX XX XX XX</span></div>
            <div>✉️ savtech@gmail.com</div>
        </div>
    </div>

    <header>
        <nav>
            <div class="logo">Sav<span>Tech</span></div>
            <div class="nav-links">
                <a href="{{ route('welcome') }}">Accueil</a>
                <a href="produits.html" class="{{ request()->routeIs('client.produit.index') ? 'actif' : '' }}">Produits</a>
                <a href="">Services</a>
                <a href="index.html#contact">Contact</a>
                <a href="{{ route('login') }}" class="btn-connexion">
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"/>
                        <circle cx="12" cy="7" r="4"/>
                    </svg>
                    Connexion
                </a>
            </div>
        </nav>
    </header>

    @yield('content_client')
</body> 