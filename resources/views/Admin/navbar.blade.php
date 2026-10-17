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

        /* ====== GESTION DES PRODUITS ====== */
.btn-retour {
    background: var(--gris);
    color: var(--blanc);
    padding: 11px 20px;
    border-radius: 50px;
    font-weight: 600;
    font-size: 0.9rem;
    transition: background 0.3s;
}
.btn-retour:hover { background: var(--bleu); }

.details-ajout { margin-bottom: 25px; }
.details-ajout summary {
    background: var(--rouge);
    color: var(--blanc);
    padding: 13px 22px;
    border-radius: 50px;
    font-weight: bold;
    cursor: pointer;
    display: inline-block;
    list-style: none;
    transition: background 0.3s;
}
.details-ajout summary::-webkit-details-marker { display: none; }
.details-ajout summary:hover { background: var(--bleu); }
.details-ajout[open] summary { margin-bottom: 15px; }

.form-grille {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
    gap: 18px;
    margin-bottom: 22px;
}
.champ-admin label {
    display: block;
    font-weight: 600;
    font-size: 0.9rem;
    margin-bottom: 6px;
}
.champ-admin input,
.champ-admin select {
    width: 100%;
    padding: 11px 13px;
    border: 2px solid #dde3e8;
    border-radius: 9px;
    font-size: 0.95rem;
    font-family: inherit;
    color: var(--gris);
    background: var(--blanc);
    outline: none;
    transition: border-color 0.3s;
}
.champ-admin input:focus,
.champ-admin select:focus { border-color: var(--bleu); }
.champ-large { grid-column: 1 / -1; }

.btn-valider {
    background: var(--bleu);
    color: var(--blanc);
    border: none;
    padding: 12px 28px;
    border-radius: 50px;
    font-weight: bold;
    font-size: 0.95rem;
    cursor: pointer;
    transition: background 0.3s, transform 0.3s;
}
.btn-valider:hover { background: var(--rouge); transform: translateY(-2px); }

.td-emoji { font-size: 1.5rem; text-align: center; }
.td-specs { color: #999; font-size: 0.8rem; }
.td-prix { font-weight: bold; color: var(--rouge); white-space: nowrap; }

.actions-ligne { display: flex; gap: 8px; }
.btn-mini {
    width: 36px; height: 36px;
    border: none;
    border-radius: 9px;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 1rem;
    cursor: pointer;
    text-decoration: none;
    transition: transform 0.3s;
}
.btn-mini:hover { transform: translateY(-2px); }
.btn-bleu { background: var(--bleu); }
.btn-rouge { background: var(--rouge); }

/* ====== PHOTOS PRODUIT (3 max) ====== */
.photos-grille {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 15px;
    max-width: 450px;
}
.photo-slot {
    position: relative;
    aspect-ratio: 1 / 1;
    border: 2px dashed #c8d0d8;
    border-radius: 12px;
    background: var(--gris-clair);
    overflow: hidden;
    display: flex;
    align-items: center;
    justify-content: center;
    transition: border-color 0.3s, background 0.3s;
}
.photo-slot:hover { border-color: var(--bleu); background: #eef3f7; }

.photo-vide {
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    gap: 4px;
    width: 100%;
    height: 100%;
    cursor: pointer;
    color: #9aa0a6;
    font-weight: 600;
    font-size: 0.85rem;
}
.photo-vide span:first-child { font-size: 1.8rem; }

.photo-apercu {
    position: absolute;
    inset: 0;
    width: 100%;
    height: 100%;
    object-fit: cover;
    display: none;
}

.photo-supprimer {
    position: absolute;
    top: 8px;
    right: 8px;
    width: 28px;
    height: 28px;
    border: none;
    border-radius: 50%;
    background: var(--rouge);
    color: var(--blanc);
    font-weight: bold;
    font-size: 0.85rem;
    cursor: pointer;
    display: none;
    align-items: center;
    justify-content: center;
    z-index: 2;
    transition: transform 0.2s;
}
.photo-supprimer:hover { transform: scale(1.15); }

.photo-aide {
    display: block;
    margin-top: 8px;
    color: #999;
    font-size: 0.8rem;
}

/* ====== QUANTITÉ ====== */
.quantite-bloc {
    display: flex;
    align-items: center;
}
.qte-btn {
    width: 42px;
    height: 46px;
    background: var(--gris-clair);
    border: 2px solid #dde3e8;
    font-size: 1.3rem;
    font-weight: bold;
    color: var(--gris);
    cursor: pointer;
    transition: background 0.3s, color 0.3s, border-color 0.3s;
}
.qte-btn:first-child { border-radius: 9px 0 0 9px; }
.qte-btn:last-child  { border-radius: 0 9px 9px 0; }
.qte-btn:hover {
    background: var(--bleu);
    color: var(--blanc);
    border-color: var(--bleu);
}
.quantite-bloc input {
    width: 85px;
    height: 46px;
    text-align: center;
    border: 2px solid #dde3e8;
    border-left: none;
    border-right: none;
    font-size: 1rem;
    font-family: inherit;
    color: var(--gris);
    outline: none;
    transition: border-color 0.3s;
}
.quantite-bloc input:focus { border-color: var(--bleu); }

/* Masque les petites flèches natives du champ number (on a déjà nos boutons) */
.quantite-bloc input::-webkit-outer-spin-button,
.quantite-bloc input::-webkit-inner-spin-button { -webkit-appearance: none; }
.quantite-bloc input { -moz-appearance: textfield; appearance: textfield; }

.statut-stock {
    display: inline-block;
    margin-top: 8px;
    font-size: 0.82rem;
    font-weight: 700;
}

/* ====== PHOTO DANS LE TABLEAU ====== */
.td-photo {
    width: 50px;
    height: 50px;
    object-fit: cover;      /* recadre l'image sans la déformer */
    border-radius: 10px;
    box-shadow: 0 2px 6px rgba(0,0,0,0.15);
}
.td-fallback {
    display: none;          /* caché par défaut, montré si l'image échoue */
    font-size: 1.5rem;
}

.alert-success{
    background: var(--vert);
    color: var(--blanc);
    padding: 12px 20px;
    border-radius: 8px;
    margin-bottom: 20px;
}
/* ====== GESTION DES STOCKS ====== */

/* Barre : filtres + recherche */
.barre-stock {
    display: flex;
    flex-wrap: wrap;
    align-items: center;
    justify-content: space-between;
    gap: 12px;
    margin-bottom: 20px;
}

/* Groupe de filtres */
.filtres-stock {
    display: flex;
    flex-wrap: wrap;
    gap: 5px;
    background: #eef1f4;
    border: 1px solid #e0e6ec;
    border-radius: 16px;
    padding: 6px;
    max-width: 100%;
}
.fstock {
    display: inline-flex;
    align-items: center;
    gap: 7px;
    padding: 9px 14px;
    border-radius: 12px;
    border: none;
    background: transparent;
    font-family: inherit;
    font-weight: 600;
    font-size: 0.88rem;
    color: #5b636b;
    cursor: pointer;
    white-space: nowrap;
    transition: background 0.25s, color 0.25s, box-shadow 0.25s, transform 0.25s;
}
.fstock:hover {
    background: var(--blanc);
    color: var(--bleu);
    box-shadow: 0 2px 6px rgba(0,0,0,0.06);
}
.fstock-icone { font-size: 1rem; line-height: 1; }
.fstock-compte {
    min-width: 24px;
    height: 22px;
    display: inline-flex;
    align-items: center;
    justify-content: center;
    padding: 0 7px;
    background: #dde3e9;
    color: #5b636b;
    border-radius: 50px;
    font-size: 0.75rem;
    font-weight: 700;
    transition: background 0.25s, color 0.25s;
}

/* Filtre actif : classe .actif ajoutée par Blade */
.fstock.actif {
    background: var(--blanc);
    color: var(--gris);
    box-shadow: 0 3px 8px rgba(0,0,0,0.10);
    transform: translateY(-1px);
}
.fstock.actif .fstock-compte { background: var(--bleu); color: var(--blanc); }

/* Recherche */
.form-recherche {
    display: flex;
    align-items: center;
    gap: 8px;
    flex: 1;
    max-width: 340px;
}
.recherche-stock {
    flex: 1;
    min-width: 0;
    padding: 10px 16px;
    border: 2px solid #dde3e8;
    border-radius: 50px;
    font-family: inherit;
    font-size: 0.92rem;
    color: var(--gris);
    outline: none;
    transition: border-color 0.3s;
}
.recherche-stock:focus { border-color: var(--bleu); }

/* Lignes du tableau */
.produit-cellule { display: flex; align-items: center; gap: 12px; }
.stock-form { display: flex; align-items: center; gap: 8px; }
.td-valeur { font-weight: bold; color: var(--gris); white-space: nowrap; }

/* Total */
.total-stock {
    margin-top: 20px;
    padding: 15px 20px;
    background: var(--gris-clair);
    border-left: 5px solid var(--bleu);
    border-radius: 8px;
    text-align: right;
    font-size: 1.05rem;
}
.total-stock strong { color: var(--bleu); font-size: 1.2rem; }

/* Responsive */
@media (max-width: 900px) {
    .form-recherche { flex-basis: 100%; max-width: none; }
}
@media (max-width: 560px) {
    .filtres-stock { width: 100%; display: grid; grid-template-columns: 1fr 1fr; }
    .fstock { justify-content: center; padding: 10px 8px; }
    .fstock-compte { margin-left: auto; }
}
/* Responsive : photos empilées sur petit écran */
@media (max-width: 500px) {
    .photos-grille { grid-template-columns: repeat(2, 1fr); }
}

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




/* ====== CHAMP QUANTITÉ (tableau des stocks) ====== */
.champ-quantite {
    width: 70px;
    height: 38px;
    text-align: center;
    padding: 0 8px;
    border: 2px solid #dde3e8;
    border-radius: 9px;
    font-family: inherit;
    font-size: 0.95rem;
    font-weight: 600;
    color: var(--gris);
    background: var(--blanc);
    outline: none;
    transition: border-color 0.3s, box-shadow 0.3s, background 0.3s;
}

/* Au survol : bordure un peu plus foncée */
.champ-quantite:hover { border-color: #b9c3cc; }

/* Quand on clique dedans : bordure bleue + halo doux */
.champ-quantite:focus {
    border-color: var(--bleu);
    box-shadow: 0 0 0 3px rgba(26, 111, 181, 0.15);
    background: #f8fbfe;
}

/* Masque les petites flèches natives du champ number */
.champ-quantite::-webkit-outer-spin-button,
.champ-quantite::-webkit-inner-spin-button { -webkit-appearance: none; }
.champ-quantite { -moz-appearance: textfield; appearance: textfield; }

/* Variante rupture : fond rosé quand la quantité est à 0 */
.champ-quantite.rupture {
    background: #fdeae6;
    border-color: #f0b9ac;
    color: var(--rouge);
}





/* ====== GESTION DES COMMANDES ====== */
.cmd-num { font-weight: 800; color: var(--bleu); white-space: nowrap; }

.cmd-client { display: flex; align-items: center; gap: 10px; }
.avatar-client {
    width: 36px; height: 36px;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    font-weight: 700;
    font-size: 0.78rem;
    color: var(--blanc);
    background: var(--bleu);
    flex-shrink: 0;
}
.avatar-client.vert   { background: var(--vert); }
.avatar-client.rouge  { background: var(--rouge); }
.avatar-client.orange { background: var(--orange); }
.avatar-client.gris   { background: #8a9199; }
.cmd-client strong { display: block; line-height: 1.2; }
.cmd-client small  { color: #999; font-size: 0.78rem; }

.cmd-produits { margin: 0; padding: 0; font-size: 0.85rem; color: #666; }

.cmd-actions { display: flex; align-items: center; gap: 8px; }
.cmd-statut-form { display: flex; align-items: center; gap: 8px; }

.select-statut {
    padding: 8px 10px;
    border: 2px solid #dde3e8;
    border-radius: 9px;
    font-family: inherit;
    font-size: 0.85rem;
    color: var(--gris);
    background: var(--blanc);
    outline: none;
    cursor: pointer;
    transition: border-color 0.3s;
}
.select-statut:hover  { border-color: #b9c3cc; }
.select-statut:focus  { border-color: var(--bleu); box-shadow: 0 0 0 3px rgba(26, 111, 181, 0.15); }

.recap-commandes {
    margin-top: 20px;
    padding: 15px 20px;
    background: var(--gris-clair);
    border-left: 5px solid var(--rouge);
    border-radius: 8px;
    text-align: right;
    font-size: 1.05rem;
}
.recap-commandes strong { color: var(--rouge); font-size: 1.2rem; }



/* ====== GESTION DES PARAMÈTRES ====== */
.panneau-parametres { margin-bottom: 25px; }

.param-titre-icone {
    margin-right: 6px;
}

/* Bandeau profil en haut du premier panneau */
.profil-bandeau {
    display: flex;
    align-items: center;
    gap: 15px;
    padding: 18px 20px;
    background: var(--gris-clair);
    border-radius: 12px;
    margin-bottom: 22px;
    flex-wrap: wrap;
}
.profil-avatar {
    width: 55px; height: 55px;
    background: var(--bleu);
    border: 3px solid var(--rouge);
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    color: var(--blanc);
    font-weight: 800;
    font-size: 1.4rem;
}
.profil-bandeau strong { display: block; line-height: 1.3; }
.profil-bandeau small  { color: #888; font-size: 0.82rem; }
.profil-bandeau .badge { margin-left: auto; }

/* Liste des préférences */
.liste-preferences { display: flex; flex-direction: column; }
.preference {
    display: flex;
    align-items: center;
    justify-content: space-between;
    gap: 20px;
    padding: 16px 0;
    border-bottom: 1px solid #eef1f3;
    flex-wrap: wrap;
}
.preference:last-child { border-bottom: none; }
.preference strong { display: block; line-height: 1.3; }
.preference small  { color: #999; font-size: 0.82rem; }

/* Interrupteur (CSS pur, aucune logique JS) */
.switch { position: relative; display: inline-block; flex-shrink: 0; }
.switch input { position: absolute; opacity: 0; width: 0; height: 0; }
.interrupteur {
    display: block;
    width: 48px;
    height: 26px;
    background: #ccd4db;
    border-radius: 50px;
    cursor: pointer;
    transition: background 0.3s;
}
.interrupteur::after {
    content: '';
    position: absolute;
    top: 3px;
    left: 3px;
    width: 20px;
    height: 20px;
    background: var(--blanc);
    border-radius: 50%;
    box-shadow: 0 2px 5px rgba(0,0,0,0.2);
    transition: left 0.3s;
}
.switch input:checked + .interrupteur { background: var(--vert); }
.switch input:checked + .interrupteur::after { left: 25px; }

/* Zone danger (actions sensibles) */
.zone-danger {
    display: flex;
    align-items: center;
    justify-content: space-between;
    gap: 15px;
    flex-wrap: wrap;
    margin-top: 25px;
    padding: 16px 20px;
    background: #fdeae6;
    border-left: 5px solid var(--rouge);
    border-radius: 8px;
}
.zone-danger strong { display: block; }
.zone-danger small  { color: #8f4a3c; font-size: 0.82rem; }
.btn-danger {
    background: var(--rouge);
    color: var(--blanc);
    border: none;
    padding: 11px 22px;
    border-radius: 50px;
    font-weight: bold;
    font-size: 0.9rem;
    cursor: pointer;
    transition: background 0.3s;
    white-space: nowrap;
}
.btn-danger:hover { background: #c23a20; }

/* ====== CHAMP MOT DE PASSE AVEC ŒIL ====== */
.champ-mdp { position: relative; }

/* Réserve la place du bouton à droite */
.champ-mdp input {
    width: 100%;
    padding-right: 44px;
}

/* Le bouton œil, centré verticalement dans le champ */
.btn-oeil {
    position: absolute;
    right: 10px;
    top: 50%;
    transform: translateY(-50%);
    background: none;
    border: none;
    cursor: pointer;
    font-size: 1.15rem;
    padding: 4px;
    line-height: 1;
    opacity: 0.65;
    transition: opacity 0.2s;
}
.btn-oeil:hover { opacity: 1; }




/* ====== BOUTON DÉCONNEXION ====== */
.form-logout { display: flex; }

.btn-logout {
    display: inline-flex;
    align-items: center;
    gap: 6px;
    background: transparent;
    border: 2px solid var(--rouge);
    color: #ff8a70;
    padding: 8px 16px;
    border-radius: 50px;
    font-family: inherit;
    font-weight: 600;
    font-size: 0.85rem;
    cursor: pointer;
    white-space: nowrap;
    transition: background 0.3s, color 0.3s, transform 0.3s;
}
.btn-logout:hover {
    background: var(--rouge);
    color: var(--blanc);
    transform: translateY(-2px);
}





/* La checkbox native, stylée dans le filtre */
.fstock input[type="checkbox"] {
    width: 15px;
    height: 15px;
    accent-color: var(--rouge);   /* cochée = rouge, votre couleur d'action */
    cursor: pointer;
    flex-shrink: 0;
}

/* Filtre coché : le label s'illumine (fonctionne sans JS) */
.fstock:has(input:checked) {
    background: var(--blanc);
    color: var(--gris);
    box-shadow: 0 3px 8px rgba(0,0,0,0.10);
    transform: translateY(-1px);
}
.fstock:has(input:checked) .fstock-compte { background: var(--rouge); color: var(--blanc); }




/* ====== GESTION DES ASSISTANTS ====== */
.sous-titre-panneau {
    margin-top: 30px;
    padding-top: 20px;
    border-top: 1px solid #eef1f3;
    font-size: 1.05rem;
    color: var(--gris);
}

.liste-assistants { display: flex; flex-direction: column; gap: 10px; }

.assistant-item {
    display: flex;
    align-items: center;
    justify-content: space-between;
    gap: 15px;
    flex-wrap: wrap;
    padding: 14px 16px;
    background: var(--gris-clair);
    border-radius: 10px;
    transition: border-color 0.3s, background 0.3s;
}
.assistant-item:hover {
    border-left: 4px solid var(--bleu);
    background: #eef3f7;
}

.assistant-fin {
    display: flex;
    align-items: center;
    gap: 12px;
}

.assistant-vide {
    text-align: center;
    padding: 30px 15px;
    border: 2px dashed #d7dee5;
    border-radius: 10px;
    color: #999;
    font-size: 0.9rem;
}
.assistant-vide span { font-size: 2rem; display: block; margin-bottom: 8px; }

/* Petits messages d'erreur sous les champs */
.texte-erreur-admin {
    color: var(--rouge);
    font-size: 0.8rem;
    margin-top: 4px;
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
            <li><a href="{{ route('admin.produit') }}" class="{{ request()->routeIs('admin.produit') ? 'actif' : '' }}">💻 Produits</a></li>
            <li><a href="{{ route('admin.commande') }}" class="{{ request()->routeIs('admin.commande') ? 'actif' : '' }}">🛒 Commandes</a></li>
            <li><a href="{{ route('admin.paiement') }}" class="{{ request()->routeIs('admin.paiement') ? 'actif' : '' }}">💳 Paiements</a></li>
            <li><a href="{{ route('admin.client') }}" class="{{ request()->routeIs('admin.client') ? 'actif' : '' }}">👥 Clients</a></li>
        </ul>

        <div class="nav-droite">
            <button class="cloche" title="Notifications">🔔<span class="pastille">3</span></button>
            <div class="admin-profil">
                <div class="avatar">A</div>
                <div><strong>Admin</strong><small>SavTech</small></div>
            </div>

            {{-- ===== Bouton déconnexion ===== --}}
            <form method="POST" action="{{ route('logout') }}" class="form-logout">
                @csrf
                <button type="submit" class="btn-logout" title="Se déconnecter">⏻ Déconnexion</button>
            </form>
        </div>
    </nav>

    {{-- ===== CONTENU DE CHAQUE PAGE ADMIN ===== --}}
    @yield('content_admin')

    <footer>
        © 2025 SavTech Admin — <a href="{{ route('admin.dashboard') }}">← Retour au site</a>
    </footer>

    @yield('scripts')

</body>
</html>