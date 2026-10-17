<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>SavTech - Vente & Réparation d'ordinateurs</title>
<style>
    /* ====== PALETTE INSPIRÉE DU VÊTEMENT ======
       Blanc t-shirt      : #ffffff
       Bleu du texte      : #1a6fb5
       Rouge des icônes   : #e8492a
       Gris du pantalon   : #3a3f44
    ============================================ */

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

    /* ====== BARRE DE CONTACT (en haut) ====== */
    .topbar {
        background: var(--gris);
        color: var(--blanc);
        font-size: 0.9rem;
        padding: 8px 0;
    }
    .topbar .container {
        display: flex;
        justify-content: space-between;
        flex-wrap: wrap;
        gap: 10px;
    }
    .topbar .rouge { color: #ff8a70; font-weight: bold; }

    /* ====== NAVIGATION ====== */
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


    /* ====== SECTION HERO ====== */
    .hero {
        background: linear-gradient(135deg, var(--bleu) 0%, var(--bleu-fonce) 60%, var(--gris) 100%);
        color: var(--blanc);
        text-align: center;
        padding: 110px 20px;
    }
    .hero h1 {
        font-size: 2.8rem;
        margin-bottom: 15px;
    }
    .hero h1 span { color: #ffd0c4; }
    .hero p {
        font-size: 1.25rem;
        max-width: 650px;
        margin: 0 auto 35px;
        opacity: 0.95;
    }
    .btn {
        display: inline-block;
        padding: 14px 35px;
        border-radius: 50px;
        font-weight: bold;
        transition: transform 0.3s, box-shadow 0.3s;
        margin: 5px;
    }
    .btn:hover { transform: translateY(-3px); box-shadow: 0 8px 20px rgba(0,0,0,0.25); }
    .btn-rouge { background: var(--rouge); color: var(--blanc); }
    .btn-blanc { background: var(--blanc); color: var(--bleu); }

    /* ====== SECTIONS ====== */
    section { padding: 80px 0; }
    .section-titre {
        text-align: center;
        margin-bottom: 50px;
    }
    .section-titre h2 {
        font-size: 2.2rem;
        color: var(--bleu);
    }
    .section-titre h2 span { color: var(--rouge); }
    .section-titre p { color: #777; }

    /* ====== PRODUITS ====== */
    #produits { background: var(--gris-clair); }
    .grille {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(240px, 1fr));
        gap: 30px;
    }
    .carte {
        background: var(--blanc);
        border-radius: 12px;
        padding: 35px 25px;
        text-align: center;
        box-shadow: 0 4px 15px rgba(0,0,0,0.07);
        border-top: 4px solid var(--bleu);
        transition: transform 0.3s, box-shadow 0.3s;
    }
    .carte:hover { transform: translateY(-8px); box-shadow: 0 12px 25px rgba(0,0,0,0.15); }
    .carte .icone {
        width: 70px; height: 70px;
        margin: 0 auto 20px;
        background: var(--bleu);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        color: var(--blanc);
    }
    .carte:nth-child(even) .icone { background: var(--rouge); }
    .carte:nth-child(even) { border-top-color: var(--rouge); }
    .carte h3 { color: var(--gris); margin-bottom: 10px; }
    .carte p { font-size: 0.95rem; color: #666; }

    /* ====== SERVICES ====== */
    .service {
        display: flex;
        align-items: flex-start;
        gap: 20px;
        margin-bottom: 30px;
    }
    .service .num {
        min-width: 50px; height: 50px;
        background: var(--rouge);
        color: var(--blanc);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-weight: bold;
        font-size: 1.2rem;
    }
    .service h4 { color: var(--bleu); margin-bottom: 5px; }

    .deux-colonnes {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 50px;
        align-items: center;
    }
    .apropos-visuel {
        background: linear-gradient(135deg, var(--gris), var(--bleu-fonce));
        color: var(--blanc);
        border-radius: 15px;
        padding: 50px 30px;
        text-align: center;
    }
    .apropos-visuel .grand { font-size: 3rem; font-weight: 800; color: #ffd0c4; }

    /* ====== CONTACT ====== */
    #contact { background: var(--gris); color: var(--blanc); }
    #contact .section-titre h2 { color: var(--blanc); }
    #contact .section-titre h2 span { color: #ff8a70; }
    .contact-grille {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
        gap: 30px;
        text-align: center;
    }
    .contact-item {
        background: rgba(255,255,255,0.07);
        border: 1px solid rgba(255,255,255,0.15);
        border-radius: 12px;
        padding: 35px 20px;
    }
        /* ====== BOUTON CONNEXION ====== */
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
    .contact-item .rond {
        width: 60px; height: 60px;
        background: var(--rouge);
        border-radius: 50%;
        margin: 0 auto 15px;
        display: flex;
        align-items: center;
        justify-content: center;
    }
    .contact-item h4 { color: #ffd0c4; margin-bottom: 8px; }

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

    /* ====== RESPONSIVE ====== */
    @media (max-width: 800px) {
        .deux-colonnes { grid-template-columns: 1fr; }
        .hero h1 { font-size: 2rem; }
        nav { justify-content: center; }
    }



        /* ====== BOUTON DÉCONNEXION ====== */
    .form-logout { display: flex; }

    .btn-logout {
        display: inline-flex;
        align-items: center;
        gap: 6px;
        background: transparent;
        border: 2px solid var(--rouge);
        color: var(--rouge);
        padding: 8px 16px;
        border-radius: 50px;
        font-family: inherit;
        font-weight: 600;
        font-size: 0.9rem;
        cursor: pointer;
        white-space: nowrap;
        transition: background 0.3s, color 0.3s;
    }
    .btn-logout:hover {
        background: var(--rouge);
        color: var(--blanc);
    }




        /* ====== ICÔNE PANIER ====== */
    .nav-panier {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        position: relative;
        width: 42px;
        height: 42px;
        border-radius: 50%;
        color: var(--gris);
        transition: background 0.3s, color 0.3s;
    }
    .nav-panier:hover {
        background: var(--gris-clair);
        color: var(--bleu);
    }
    .badge-panier {
        position: absolute;
        top: -2px;
        right: -4px;
        min-width: 18px;
        height: 18px;
        background: var(--rouge);
        color: var(--blanc);
        font-size: 0.7rem;
        font-weight: bold;
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 0 4px;
        border-radius: 50px;
        border: 2px solid var(--blanc);   /* décolle la pastille du fond */
    }

    /* ====== BOUTON ESPACE CLIENT ====== */
    .btn-compte {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        background: var(--gris-clair);
        color: var(--gris) !important;
        padding: 9px 18px;
        border-radius: 50px;
        font-weight: 600;
        line-height: 1;
        border: 2px solid #dde3e8;
        transition: background 0.3s, border-color 0.3s, transform 0.3s;
    }
    .btn-compte:hover {
        background: var(--bleu);
        border-color: var(--bleu);
        color: var(--blanc) !important;
        transform: translateY(-2px);
    }
</style>
</head>
<body>

    <!-- Barre de contact -->
    <div class="topbar">
        <div class="container">
            <div>📞 <span class="rouge">+225 XX XX XX XX XX</span></div>
            <div>✉️ savtech@gmail.com</div>
        </div>
    </div>

    <!-- Navigation -->
    <header>
        <nav>
            <div class="logo">Sav<span>Tech</span></div>
            <div class="nav-links">
                <a href="{{ route('welcome') }}" class="{{ request()->routeIs('welcome') ? 'actif' : '' }}">Accueil</a>
                <a href="{{ auth()->check() ? route('client.produit.index') : route('login') }}">Produits</a>
                <a href="{{ route('client.service') }}">Services</a>
                <a href="{{ route('client.propos') }}">À propos</a>
                <a href="{{ route('client.contact') }}">Contact</a>
@if(auth()->check())
                {{-- ===== Icône Panier (avec compteur) ===== --}}
                <a href="{{ route('client.panier') }}" class="nav-panier" title="Mon panier">
                    <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <circle cx="9" cy="21" r="1"/>
                        <circle cx="20" cy="21" r="1"/>
                        <path d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6"/>
                    </svg>
                    @if(session('panier') && count(session('panier')) > 0)
                        <span class="badge-panier">{{ count(session('panier')) }}</span>
                    @endif
                </a>


    {{-- ===== Connecté : Espace client + Déconnexion ===== --}}
                <a href="{{ route('client.dashboard') }}" class="btn-compte" title="Mon espace client">
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"/>
                        <circle cx="12" cy="7" r="4"/>
                    </svg>
                    Mon espace
                </a>
                <form method="POST" action="{{ route('logout') }}" class="form-logout">
                    @csrf
                    <button type="submit" class="btn-logout">⏻ Deconnexion</button>
                </form>
@else
    {{-- ===== Visiteur : Connexion ===== --}}
                <a href="{{ route('login') }}" class="btn-connexion">
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"/>
                        <circle cx="12" cy="7" r="4"/>
                    </svg>
                    Connexion
                </a>
@endif
            </div>
        </nav>
    </header>

    <!-- Hero -->
    <section class="hero" id="accueil">
        <h1>Bienvenue chez <span>SavTech</span></h1>
        <p>Votre satisfaction, notre priorité. Vente d'ordinateurs portables, PC de bureau, imprimantes, accessoires et service de réparation professionnel.</p>
        <a href="{{ route('client.produit.index') }}" class="btn btn-rouge">Découvrir nos produits</a>
        <a href="{{ route('client.contact') }}" class="btn btn-blanc">Nous contacter</a>
    </section>

    <!-- Produits -->
    <section id="produits">
        <div class="container">
            <div class="section-titre">
                <h2>Nos <span>Produits</span></h2>
                <p>Des équipements de qualité pour tous vos besoins</p>
            </div>
            <div class="grille">
                <div class="carte">
                    <div class="icone">
                        <svg width="34" height="34" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="2" y="4" width="20" height="13" rx="2"/><line x1="8" y1="21" x2="16" y2="21"/><line x1="12" y1="17" x2="12" y2="21"/></svg>
                    </div>
                    <h3>Ordinateurs portables</h3>
                    <p>HP, Lenovo, Dell et plus. Neufs et occasion reconditionnés, garantis.</p>
                </div>
                <div class="carte">
                    <div class="icone">
                        <svg width="34" height="34" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="4" y="2" width="16" height="16" rx="2"/><rect x="2" y="18" width="20" height="4" rx="1"/></svg>
                    </div>
                    <h3>PC de bureau</h3>
                    <p>Unités centrales performantes pour la bureautique, le graphisme et plus.</p>
                </div>
                <div class="carte">
                    <div class="icone">
                        <svg width="34" height="34" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="6 9 6 2 18 2 18 9"/><path d="M6 18H4a2 2 0 0 1-2-2v-5a2 2 0 0 1 2-2h16a2 2 0 0 1 2 2v5a2 2 0 0 1-2 2h-2"/><rect x="6" y="14" width="12" height="8"/></svg>
                    </div>
                    <h3>Imprimantes</h3>
                    <p>Imprimantes jet d'encre et laser, avec consommables disponibles.</p>
                </div>
                <div class="carte">
                    <div class="icone">
                        <svg width="34" height="34" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="2" y="2" width="20" height="20" rx="2"/><circle cx="12" cy="12" r="4"/></svg>
                    </div>
                    <h3>Accessoires</h3>
                    <p>Souris, claviers, sacoches, chargeurs, chargeurs rapides et bien plus.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Services + À propos -->
    <section id="services">
        <div class="container">
            <div class="deux-colonnes">
                <div class="apropos-visuel" id="apropos">
                    <div class="grand">+5 ans</div>
                    <p>d'expérience à votre service</p>
                    <div class="grand">100%</div>
                    <p>clients satisfaits</p>
                </div>
                <div>
                    <div class="section-titre" style="text-align:left;">
                        <h2>Nos <span>Services</span></h2>
                    </div>
                    <div class="service">
                        <div class="num">1</div>
                        <div>
                            <h4>Vente d'ordinateurs</h4>
                            <p>Un large choix de portables et PC de bureau adaptés à votre budget.</p>
                        </div>
                    </div>
                    <div class="service">
                        <div class="num">2</div>
                        <div>
                            <h4>Réparation &amp; Maintenance</h4>
                            <p>Diagnostic, réparation matérielle et logicielle par des techniciens qualifiés.</p>
                        </div>
                    </div>
                    <div class="service">
                        <div class="num">3</div>
                        <div>
                            <h4>Installation de logiciels</h4>
                            <p>Windows, antivirus, bureautique et tous les logiciels dont vous avez besoin.</p>
                        </div>
                    </div>
                    <div class="service">
                        <div class="num">4</div>
                        <div>
                            <h4>Conseil personnalisé</h4>
                            <p>Notre équipe vous accompagne pour choisir l'équipement idéal.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Contact -->
    <section id="contact">
        <div class="container">
            <div class="section-titre">
                <h2>Contactez-<span>nous</span></h2>
                <p>Votre satisfaction, notre priorité</p>
            </div>
            <div class="contact-grille">
                <div class="contact-item">
                    <div class="rond">
                        <svg width="26" height="26" viewBox="0 0 24 24" fill="none" stroke="#fff" stroke-width="2"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72c.12.9.34 1.79.65 2.63a2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.45-1.22a2 2 0 0 1 2.11-.45c.84.31 1.73.53 2.63.65A2 2 0 0 1 22 16.92z"/></svg>
                    </div>
                    <h4>Téléphone / WhatsApp</h4>
                    <p>+225 XX XX XX XX XX<br>+225 XX XX XX XX XX</p>
                </div>
                <div class="contact-item">
                    <div class="rond">
                        <svg width="26" height="26" viewBox="0 0 24 24" fill="none" stroke="#fff" stroke-width="2"><rect x="2" y="4" width="20" height="16" rx="2"/><polyline points="22,6 12,13 2,6"/></svg>
                    </div>
                    <h4>Email</h4>
                    <p>savtech@gmail.com</p>
                </div>
                <div class="contact-item">
                    <div class="rond">
                        <svg width="26" height="26" viewBox="0 0 24 24" fill="none" stroke="#fff" stroke-width="2"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"/><circle cx="12" cy="10" r="3"/></svg>
                    </div>
                    <h4>Adresse</h4>
                    <p>Votre adresse ici, Abidjan</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer>
        <p>© 2025 <strong>Sav<span class="rouge">Tech</span></strong> — Votre satisfaction, notre priorité</p>
    </footer>

</body>
</html>