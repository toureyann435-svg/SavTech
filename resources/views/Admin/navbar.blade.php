<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'SavTech Admin')</title>
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }

        :root {
            --blanc: #ffffff;
            --bleu: #1a6fb5;
            --bleu-fonce: #12507f;
            --rouge: #e8492a;
            --gris: #3a3f44;
            --gris-clair: #f4f6f8;
            --noir-admin: #24282c;
            --vert: #2e9e5b;
            --orange: #e8942a;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: var(--gris-clair);
            color: var(--gris);
            line-height: 1.6;
        }
        a { text-decoration: none; }
        .container { max-width: 1200px; margin: 0 auto; padding: 0 20px; }

        /* ====== NAVBAR ADMIN ====== */
        .admin-nav {
            background: var(--noir-admin);
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 0 25px;
            height: 65px;
            flex-wrap: wrap;
            position: sticky;
            top: 0;
            z-index: 200;
            box-shadow: 0 2px 10px rgba(0,0,0,0.3);
        }
        .nav-gauche { display: flex; align-items: center; gap: 15px; }
        .logo { font-size: 1.4rem; font-weight: 800; color: var(--bleu); white-space: nowrap; }
        .logo span { color: var(--rouge); }
        .logo em {
            font-style: normal; font-size: 0.75rem; background: var(--rouge);
            color: var(--blanc); padding: 3px 9px; border-radius: 50px;
            margin-left: 6px; vertical-align: middle; font-weight: 700; letter-spacing: 1px;
        }
        .burger { display: none; background: none; border: none; color: var(--blanc); font-size: 1.6rem; cursor: pointer; }
        .nav-liens { display: flex; list-style: none; gap: 5px; align-items: center; }
        .nav-liens a {
            display: block; color: #c9ced3; font-weight: 600; font-size: 0.95rem;
            padding: 10px 16px; border-radius: 8px; transition: background 0.3s, color 0.3s;
        }
        .nav-liens a:hover { background: rgba(255,255,255,0.08); color: var(--blanc); }
        .nav-liens a.actif { background: var(--bleu); color: var(--blanc); }
        .nav-droite { display: flex; align-items: center; gap: 18px; }
        .cloche { position: relative; background: none; border: none; font-size: 1.25rem; cursor: pointer; }
        .cloche .pastille {
            position: absolute; top: -6px; right: -8px; background: var(--rouge);
            color: var(--blanc); font-size: 0.65rem; font-weight: bold; padding: 2px 6px; border-radius: 50px;
        }
        .admin-profil {
            display: flex; align-items: center; gap: 10px; color: var(--blanc);
            cursor: pointer; padding: 6px 10px; border-radius: 50px; transition: background 0.3s;
        }
        .admin-profil:hover { background: rgba(255,255,255,0.08); }
        .avatar {
            width: 38px; height: 38px; background: var(--bleu); border: 2px solid var(--rouge);
            border-radius: 50%; display: flex; align-items: center; justify-content: center;
            font-weight: bold; font-size: 1rem;
        }
        .admin-profil strong { display: block; font-size: 0.9rem; line-height: 1.2; }
        .admin-profil small { color: #9aa0a6; font-size: 0.72rem; }

        /* ====== CONTENU DASHBOARD ====== */
        .entete {
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
            gap: 15px;
            padding: 35px 0 25px;
        }
        .entete h1 { font-size: 1.8rem; color: var(--gris); }
        .entete h1 span { color: var(--bleu); }
        .entete p { color: #888; font-size: 0.95rem; }
        .btn-rouge {
            background: var(--rouge);
            color: var(--blanc);
            padding: 12px 24px;
            border-radius: 50px;
            font-weight: bold;
            transition: background 0.3s, transform 0.3s;
        }
        .btn-rouge:hover { background: var(--bleu); transform: translateY(-2px); }

        .stats {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(230px, 1fr));
            gap: 22px;
            margin-bottom: 35px;
        }
        .stat-carte {
            background: var(--blanc);
            border-radius: 12px;
            padding: 25px;
            box-shadow: 0 4px 15px rgba(0,0,0,0.06);
            border-left: 5px solid var(--bleu);
            display: flex;
            align-items: center;
            gap: 18px;
            transition: transform 0.3s;
        }
        .stat-carte:hover { transform: translateY(-5px); }
        .stat-carte:nth-child(2) { border-left-color: var(--rouge); }
        .stat-carte:nth-child(3) { border-left-color: var(--orange); }
        .stat-carte:nth-child(4) { border-left-color: var(--vert); }
        .stat-icone {
            width: 55px; height: 55px;
            border-radius: 12px;
            background: var(--gris-clair);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.6rem;
        }
        .stat-carte h3 { font-size: 1.5rem; color: var(--gris); }
        .stat-carte p { color: #888; font-size: 0.85rem; }

        .deux-colonnes {
            display: grid;
            grid-template-columns: 2fr 1fr;
            gap: 25px;
            margin-bottom: 35px;
        }
        .panneau {
            background: var(--blanc);
            border-radius: 12px;
            padding: 25px;
            box-shadow: 0 4px 15px rgba(0,0,0,0.06);
        }
        .panneau h2 { font-size: 1.15rem; color: var(--gris); margin-bottom: 20px; }
        .panneau h2 span { color: var(--bleu); }

        .graphique {
            display: flex;
            align-items: flex-end;
            justify-content: space-around;
            height: 200px;
            padding-top: 10px;
        }
        .barre-groupe { display: flex; flex-direction: column; align-items: center; gap: 8px; height: 100%; justify-content: flex-end; }
        .barre {
            width: 38px;
            background: linear-gradient(180deg, var(--bleu), var(--bleu-fonce));
            border-radius: 8px 8px 0 0;
            transition: opacity 0.3s;
        }
        .barre:hover { opacity: 0.8; }
        .barre.rouge { background: linear-gradient(180deg, var(--rouge), #c23a20); }
        .barre-jour { font-size: 0.8rem; color: #999; font-weight: 600; }

        .actions { display: flex; flex-direction: column; gap: 12px; }
        .action {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 15px;
            border: 2px solid #e5eaee;
            border-radius: 10px;
            color: var(--gris);
            font-weight: 600;
            transition: border-color 0.3s, background 0.3s;
        }
        .action:hover { border-color: var(--bleu); background: var(--gris-clair); }
        .action .emo { font-size: 1.4rem; }

        .tableau-wrapper { overflow-x: auto; }
        table { width: 100%; border-collapse: collapse; font-size: 0.92rem; }
        th {
            text-align: left;
            padding: 13px 15px;
            background: var(--noir-admin);
            color: var(--blanc);
            font-size: 0.82rem;
            letter-spacing: 0.5px;
        }
        th:first-child { border-radius: 8px 0 0 0; }
        th:last-child { border-radius: 0 8px 0 0; }
        td { padding: 13px 15px; border-bottom: 1px solid #eef1f3; }
        tr:hover td { background: var(--gris-clair); }

        .badge {
            padding: 5px 14px;
            border-radius: 50px;
            font-size: 0.78rem;
            font-weight: bold;
            color: var(--blanc);
            white-space: nowrap;
        }
        .badge.livree { background: var(--vert); }
        .badge.encours { background: var(--orange); }
        .badge.attente { background: #8a9199; }

        footer {
            text-align: center;
            padding: 25px 20px;
            color: #999;
            font-size: 0.9rem;
        }
        footer a { color: var(--rouge); font-weight: 600; }
        footer a:hover { text-decoration: underline; }

        /* ====== RESPONSIVE ====== */
        @media (max-width: 900px) {
            .burger { display: block; }
            .admin-nav { padding: 12px 20px; height: auto; }
            .nav-liens { display: none; width: 100%; flex-direction: column; align-items: stretch; padding: 10px 0; }
            .nav-liens.ouvert { display: flex; }
            .admin-profil div { display: none; }
        }
        @media (max-width: 800px) {
            .deux-colonnes { grid-template-columns: 1fr; }
            .entete h1 { font-size: 1.4rem; }
        }
    </style>
</head>
<body>

    {{-- ===== NAVBAR ADMIN (partagée par toutes les pages admin) ===== --}}
    <nav class="admin-nav">
        <div class="nav-gauche">
            <button class="burger" onclick="document.querySelector('.nav-liens').classList.toggle('ouvert')">☰</button>
            <div class="logo">Sav<span>Tech</span><em>ADMIN</em></div>
        </div>

        <ul class="nav-liens">
            <li><a href="{{ route('admin.dashboard') }}" class="{{ request()->routeIs('admin.dashboard') ? 'actif' : '' }}">📊 Dashboard</a></li>
            <li><a href="#">💻 Produits</a></li>
            <li><a href="#">🛒 Commandes</a></li>
            <li><a href="#">👥 Clients</a></li>
        </ul>

        <div class="nav-droite">
            <button class="cloche" title="Notifications">🔔<span class="pastille">3</span></button>
            <div class="admin-profil">
                <div class="avatar">A</div>
                <div><strong>Admin</strong><small>SavTech</small></div>
            </div>
        </div>
    </nav>

    {{-- ===== CONTENU DE CHAQUE PAGE ADMIN ===== --}}
    @yield('content_admin')

    <footer>
        © 2025 SavTech Admin — <a href="{{ url('/') }}">← Retour au site</a>
    </footer>

    @yield('scripts')

</body>
</html>