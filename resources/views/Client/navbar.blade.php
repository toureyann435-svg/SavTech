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
    grid-template-columns: repeat(auto-fill, minmax(320px, 1fr));  /* ← 250px devient 320px */
    gap: 24px;                                                     /* ← 30px devient 24px */
}

/* Très petits téléphones : 1 colonne (empêche tout débordement) */
@media (max-width: 400px) {
    .grille { grid-template-columns: 1fr; }
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
        height: 230px;
        padding: 10px;          /* ← espace entre la photo et les bords */
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

    .infos { padding: 16px; flex: 1; display: flex; flex-direction: column; }
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

/* ====== ACTIONS PRODUIT : COMMANDER + PANIER ====== */
.actions-produit {
    display: flex;
    flex-wrap: wrap;     /* ← si l'espace manque, le panier passe dessous au lieu de déborder */
    gap: 8px;
    align-items: stretch;
}


.btn-commander {
    flex: 0 0 auto;          /* largeur selon son texte (il est court) */
    display: flex;
    align-items: center;
    justify-content: center;
    height: 42px;            /* hauteur fixe = alignement garanti */
    padding: 0 18px;
    background: var(--bleu);
    color: var(--blanc);
    border-radius: 50px;
    font-weight: 600;
    font-size: 0.88rem;
    white-space: nowrap;     /* le texte ne passe jamais à la ligne */
    transition: background 0.3s;
}
.btn-commander:hover { background: var(--rouge); }

.btn-panier {
    flex: 1;                 /* prend tout l'espace restant */
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 6px;
    height: 42px;            /* même hauteur que Commander */
    padding: 0 14px;
    background: var(--rouge);
    color: var(--blanc);
    border: none;
    border-radius: 50px;
    font-weight: 600;
    font-size: 0.88rem;
    font-family: inherit;
    cursor: pointer;
    white-space: nowrap;
    transition: background 0.3s, transform 0.3s;
    min-width: 160px;
}
.btn-panier:hover  { background: var(--bleu); transform: translateY(-2px); }
.btn-panier.ajoute { background: #2e9e5b; }

/* État indisponible (rupture de stock) */
.btn-panier:disabled,
.btn-commander.desactive {
    opacity: 0.45;
    cursor: not-allowed;
    pointer-events: none;
}

/* Très petits écrans : on resserre au lieu de casser la ligne */
@media (max-width: 380px) {
    .btn-commander { padding: 0 12px; font-size: 0.8rem; }
    .btn-panier    { padding: 0 8px;  font-size: 0.8rem; }
}

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


    /* ====== PHOTO DU PRODUIT (côté client) ====== */
    .photo-produit-client {
        width: 100%;
        height: 100%;
        object-fit: cover;
        display: block;
        border-radius: 8px;     /* la photo a ses propres coins arrondis */
    }



/* ====== INDICATEUR DE STOCK (côté client) ====== */
.stock-produit {
    font-size: 0.85rem;
    font-weight: 600;
    margin-bottom: 10px;
    padding: 6px 12px;
    border-radius: 50px;
    display: inline-block;
}

/* En stock : vert */
.stock-produit.enstock {
    background: #e6f7ed;
    color: #1d6b3c;
}

/* Stock faible : orange */
.stock-produit.faible {
    background: #fdf3e3;
    color: #a3621a;
}

/* Rupture : rouge */
.stock-produit.rupture {
    background: #fdeae6;
    color: #8f2a17;
}

/* Boutons désactivés en rupture de stock */
.btn-panier:disabled,
.btn-commander.desactive {
    opacity: 0.45;
    cursor: not-allowed;
    pointer-events: none;   /* le lien « Commander » ne clique plus */
}





/* ====== ÉTAT VIDE DU CATALOGUE ====== */
.vide-catalogue {
    grid-column: 1 / -1;          /* occupe toute la largeur de la grille */
    text-align: center;
    background: var(--blanc);
    border: 2px dashed #d7dee5;
    border-radius: 16px;
    padding: 60px 25px;
    margin: 10px auto;
    max-width: 560px;
    width: 100%;
}
.vide-icone {
    display: inline-block;
    font-size: 3.5rem;
    margin-bottom: 15px;
    animation: flotte 2.5s ease-in-out infinite;
}
@keyframes flotte {
    0%, 100% { transform: translateY(0); }
    50%      { transform: translateY(-8px); }
}
.vide-catalogue h3 {
    color: var(--gris);
    font-size: 1.4rem;
    margin-bottom: 8px;
}
.vide-catalogue p {
    color: #777;
    font-size: 0.95rem;
}
.vide-conseil {
    margin-top: 8px;
    font-style: italic;
}
.btn-vide {
    display: inline-block;
    margin-top: 20px;
    background: var(--bleu);
    color: var(--blanc);
    padding: 12px 28px;
    border-radius: 50px;
    font-weight: 600;
    transition: background 0.3s, transform 0.3s;
}
.btn-vide:hover {
    background: var(--rouge);
    transform: translateY(-2px);
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




        /* ====== DASHBOARD CLIENT ====== */
    .espace-zone {
        flex: 1;
        padding: 40px 20px;
        background: linear-gradient(135deg, var(--bleu) 0%, var(--bleu-fonce) 60%, var(--gris) 100%);
    }
    .espace-carte {
        background: var(--blanc);
        width: 100%;
        max-width: 720px;
        margin: 0 auto;
        border-radius: 15px;
        padding: 35px;
        box-shadow: 0 15px 40px rgba(0,0,0,0.3);
    }

    /* Bandeau profil */
    .profil-bandeau {
        display: flex;
        align-items: center;
        gap: 15px;
        padding: 18px 20px;
        background: var(--gris-clair);
        border-radius: 12px;
        margin-bottom: 25px;
        flex-wrap: wrap;
    }
    .profil-avatar {
        width: 60px; height: 60px;
        background: var(--bleu);
        border: 3px solid var(--rouge);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        color: var(--blanc);
        font-weight: 800;
        font-size: 1.4rem;
        flex-shrink: 0;
    }
    .profil-infos { flex: 1; min-width: 150px; }
    .profil-infos h1 {
        color: var(--gris);
        font-size: 1.3rem;
        line-height: 1.3;
    }
    .profil-infos p { color: #888; font-size: 0.85rem; }
    .badge-client {
        background: var(--bleu);
        color: var(--blanc);
        padding: 4px 14px;
        border-radius: 50px;
        font-size: 0.75rem;
        font-weight: bold;
        white-space: nowrap;
    }

    /* Statistiques */
    .stats-client {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 12px;
        margin-bottom: 25px;
    }
    .stat-client {
        background: var(--gris-clair);
        border-radius: 12px;
        padding: 14px 10px;
        display: flex;
        align-items: center;
        gap: 10px;
        justify-content: center;
    }
    .stat-client .stat-icone { font-size: 1.4rem; }
    .stat-client strong {
        display: block;
        font-size: 1.2rem;
        color: var(--gris);
        line-height: 1.2;
    }
    .stat-client small { color: #888; font-size: 0.75rem; }

    /* Actions rapides */
    .actions-client {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(180px, 1fr));
        gap: 10px;
        margin-bottom: 30px;
    }
    .action-client {
        display: flex;
        align-items: center;
        gap: 10px;
        padding: 12px 16px;
        border: 2px solid #e5eaee;
        border-radius: 10px;
        color: var(--gris);
        font-weight: 600;
        font-size: 0.9rem;
        transition: border-color 0.3s, background 0.3s;
    }
    .action-client:hover { border-color: var(--bleu); background: var(--gris-clair); }

    /* Titre de section */
    .titre-section {
        color: var(--gris);
        font-size: 1.25rem;
        margin-bottom: 15px;
    }
    .titre-section span { color: var(--bleu); }

    /* Commandes */
    .commandes-liste { display: flex; flex-direction: column; gap: 12px; }
    .commande-item {
        border: 2px solid #e5eaee;
        border-radius: 12px;
        padding: 15px 18px;
        transition: border-color 0.3s, box-shadow 0.3s;
    }
    .commande-item:hover {
        border-color: var(--bleu);
        box-shadow: 0 4px 12px rgba(0,0,0,0.06);
    }
    .commande-entete {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 8px;
        flex-wrap: wrap;
        gap: 8px;
    }
    .commande-num {
        font-weight: 800;
        color: var(--bleu);
    }
    .commande-produits {
        margin: 0 0 10px;
        padding: 0 0 0 5px;
        list-style: none;
        font-size: 0.88rem;
        color: #777;
    }
    .commande-produits li { padding: 2px 0; }
    .commande-pied {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding-top: 10px;
        border-top: 1px dashed #d7dee5;
        flex-wrap: wrap;
        gap: 8px;
    }
    .commande-date { color: #999; font-size: 0.82rem; }
    .commande-montant {
        font-weight: 800;
        color: var(--rouge);
        font-size: 1rem;
    }

    /* Badges de statut */
    .badge-attente {
        background: #8a9199;
        color: var(--blanc);
        padding: 4px 14px;
        border-radius: 50px;
        font-size: 0.75rem;
        font-weight: bold;
        white-space: nowrap;
    }
    .badge-encours {
        background: #e8942a;
        color: var(--blanc);
        padding: 4px 14px;
        border-radius: 50px;
        font-size: 0.75rem;
        font-weight: bold;
        white-space: nowrap;
    }
    .badge-livree {
        background: #2e9e5b;
        color: var(--blanc);
        padding: 4px 14px;
        border-radius: 50px;
        font-size: 0.75rem;
        font-weight: bold;
        white-space: nowrap;
    }

    /* État vide */
    .commandes-vide {
        text-align: center;
        padding: 35px 15px;
        border: 2px dashed #d7dee5;
        border-radius: 12px;
    }
    .commandes-vide span { font-size: 3rem; display: block; margin-bottom: 10px; }
    .commandes-vide h3 { color: var(--gris); margin-bottom: 5px; }
    .commandes-vide p { color: #777; font-size: 0.9rem; margin-bottom: 15px; }
    .commandes-vide a {
        color: var(--bleu);
        font-weight: 600;
    }
    .commandes-vide a:hover { color: var(--rouge); }

    /* Responsive */
    @media (max-width: 560px) {
        .espace-carte { padding: 25px 18px; }
        .stats-client { grid-template-columns: 1fr 1fr 1fr; gap: 8px; }
        .stat-client { flex-direction: column; text-align: center; gap: 4px; }
        .profil-bandeau { text-align: center; }
        .profil-bandeau .badge-client { margin: 0 auto; }
    }




        /* ====== BULLE PANIER (dashboard) ====== */
    .action-panier {
        position: relative;
        font-size: 1.2rem;
        line-height: 1;
    }
    .bulle-panier {
        position: absolute;
        top: -9px;
        right: -11px;
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
        border: 2px solid var(--blanc);   /* décolle la bulle du fond */
    }





        /* ====== BANNIÈRE CHOIX PAIEMENT ====== */
    .banniere-paiement {
        background: #f0f7fd;
        border: 2px dashed var(--bleu);
        border-radius: 12px;
        padding: 15px;
        margin-bottom: 12px;
    }
    .paiement-titre {
        font-weight: 700;
        color: var(--gris);
        font-size: 0.92rem;
        margin-bottom: 12px;
        line-height: 1.4;
    }

    /* Les deux options */
    .paiement-choix {
        display: flex;
        gap: 10px;
        flex-wrap: wrap;
        margin-bottom: 12px;
    }
    .paiement-option { flex: 1; min-width: 180px; }
    .paiement-option input { display: none; }   /* le radio natif est caché, la carte le remplace */

    .paiement-carte {
        display: flex;
        flex-direction: column;
        gap: 3px;
        padding: 12px 14px;
        background: var(--blanc);
        border: 2px solid #dde3e8;
        border-radius: 10px;
        cursor: pointer;
        font-size: 0.9rem;
        transition: border-color 0.3s, background 0.3s, transform 0.3s;
    }
    .paiement-carte strong { color: var(--gris); }
    .paiement-carte small  { color: #999; font-size: 0.78rem; }
    .paiement-carte:hover {
        border-color: var(--bleu);
        transform: translateY(-2px);
    }

    /* Option sélectionnée : bleu plein */
    .paiement-option input:checked + .paiement-carte {
        border-color: var(--bleu);
        background: #f0f7fd;
        box-shadow: 0 0 0 3px rgba(26, 111, 181, 0.15);
    }
    .paiement-option input:checked + .paiement-carte strong { color: var(--bleu); }

    /* Bouton valider */
    .paiement-valider {
        width: 100%;
        padding: 11px;
        background: var(--rouge);
        color: var(--blanc);
        border: none;
        border-radius: 50px;
        font-family: inherit;
        font-weight: bold;
        font-size: 0.9rem;
        cursor: pointer;
        transition: background 0.3s, transform 0.3s;
    }
    .paiement-valider:hover {
        background: var(--bleu);
        transform: translateY(-2px);
    }



        /* ====== BANNIÈRE PAIEMENT EFFECTUÉ ====== */
    .banniere-paye {
        background: #e6f7ed;
        border: 2px solid var(--vert);
        border-radius: 12px;
        padding: 15px;
        margin-bottom: 12px;
    }

    /* En-tête : coche + titre */
    .paye-entete {
        display: flex;
        align-items: center;
        gap: 12px;
        margin-bottom: 12px;
    }
    .paye-coche {
        width: 40px;
        height: 40px;
        background: var(--vert);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.2rem;
        flex-shrink: 0;
    }
    .paye-entete strong {
        display: block;
        color: #1d6b3c;
        font-size: 0.98rem;
        line-height: 1.3;
    }
    .paye-entete small {
        color: #4a8560;
        font-size: 0.8rem;
    }

    /* Détails du paiement */
    .paye-details {
        background: var(--blanc);
        border-radius: 10px;
        padding: 10px 14px;
    }
    .paye-ligne {
        display: flex;
        justify-content: space-between;
        align-items: center;
        gap: 10px;
        padding: 7px 0;
        font-size: 0.88rem;
        color: #777;
        border-bottom: 1px solid #f0f2f4;
        flex-wrap: wrap;
    }
    .paye-ligne:last-child { border-bottom: none; }
    .paye-ligne strong {
        color: var(--gris);
        font-weight: 700;
        text-align: right;
    }
    .paye-reference {
        font-family: 'Courier New', monospace;
        background: var(--gris-clair);
        padding: 3px 10px;
        border-radius: 6px;
        font-size: 0.82rem;
        letter-spacing: 1px;
    }

    .paye-note {
        margin-top: 10px;
        font-size: 0.8rem;
        color: #4a8560;
        text-align: center;
    }




        /* ====== CODE DE RETRAIT DANS LA BANNIÈRE ====== */
    .paye-code-retrait {
        text-align: center;
        background: var(--gris-clair);
        border: 2px dashed var(--bleu);
        border-radius: 10px;
        padding: 12px;
        margin-top: 10px;
    }
    .paye-code-retrait small {
        color: #888;
        font-size: 0.78rem;
        font-weight: 600;
    }
    .paye-code-retrait .code {
        font-size: 1.6rem;
        font-weight: 800;
        letter-spacing: 4px;
        color: var(--bleu);
        font-family: 'Courier New', monospace;
        margin-top: 4px;
    }





        /* ====== PAGES SERVICES / À PROPOS / CONTACT ====== */

    /* Étapes du processus */
    .etapes-service {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
        gap: 20px;
        margin-top: 30px;
    }
    .etape-service {
        text-align: center;
        padding: 25px 18px;
        background: var(--gris-clair);
        border-radius: 12px;
    }
    .etape-service .num {
        width: 45px; height: 45px;
        background: var(--rouge);
        color: var(--blanc);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-weight: 800;
        font-size: 1.2rem;
        margin: 0 auto 12px;
    }
    .etape-service h4 { color: var(--bleu); margin-bottom: 6px; }
    .etape-service p { font-size: 0.85rem; color: #777; }

    /* Bandeau CTA (appel à l'action) */
    .cta-bandeau {
        background: linear-gradient(135deg, var(--bleu) 0%, var(--bleu-fonce) 60%, var(--gris) 100%);
        color: var(--blanc);
        text-align: center;
        padding: 50px 20px;
    }
    .cta-bandeau h2 { font-size: 1.8rem; margin-bottom: 10px; }
    .cta-bandeau h2 span { color: #ffd0c4; }
    .cta-bandeau p { opacity: 0.95; margin-bottom: 22px; }
    .btn-cta {
        display: inline-block;
        background: var(--rouge);
        color: var(--blanc);
        padding: 14px 35px;
        border-radius: 50px;
        font-weight: bold;
        transition: transform 0.3s, box-shadow 0.3s;
    }
    .btn-cta:hover { transform: translateY(-3px); box-shadow: 0 8px 20px rgba(0,0,0,0.3); }

    /* Histoire / mission */
    .histoire {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 40px;
        align-items: center;
    }
    .histoire-texte h3 {
        color: var(--bleu);
        font-size: 1.5rem;
        margin-bottom: 15px;
    }
    .histoire-texte p { color: #666; margin-bottom: 12px; }
    .histoire-visuel {
        background: linear-gradient(135deg, var(--bleu), var(--bleu-fonce));
        border-radius: 15px;
        padding: 40px 25px;
        text-align: center;
        color: var(--blanc);
    }
    .histoire-visuel .grand { font-size: 2.5rem; font-weight: 800; color: #ffd0c4; }
    .histoire-visuel p { font-size: 0.9rem; opacity: 0.9; margin-bottom: 15px; }

    /* Valeurs */
    .valeur {
        text-align: center;
        padding: 30px 20px;
        background: var(--blanc);
        border-radius: 12px;
        box-shadow: 0 4px 15px rgba(0,0,0,0.07);
        border-top: 4px solid var(--bleu);
    }
    .valeur:nth-child(even) { border-top-color: var(--rouge); }
    .valeur .emo { font-size: 2.2rem; display: block; margin-bottom: 12px; }
    .valeur h4 { color: var(--gris); margin-bottom: 8px; }
    .valeur p { font-size: 0.88rem; color: #777; }

    /* Formulaire de contact */
    .contact-page { display: grid; grid-template-columns: 1fr 1.3fr; gap: 35px; align-items: start; }
    .formulaire-contact {
        background: var(--blanc);
        border-radius: 12px;
        padding: 30px;
        box-shadow: 0 4px 15px rgba(0,0,0,0.07);
    }
    .formulaire-contact .groupe { margin-bottom: 16px; }
    .formulaire-contact label {
        display: block;
        font-weight: 600;
        margin-bottom: 6px;
        font-size: 0.9rem;
        color: var(--gris);
    }
    .formulaire-contact input,
    .formulaire-contact select,
    .formulaire-contact textarea {
        width: 100%;
        padding: 12px 14px;
        border: 2px solid #dde3e8;
        border-radius: 10px;
        font-family: inherit;
        font-size: 0.95rem;
        color: var(--gris);
        outline: none;
        transition: border-color 0.3s, box-shadow 0.3s;
    }
    .formulaire-contact textarea { resize: vertical; min-height: 110px; }
    .formulaire-contact input:focus,
    .formulaire-contact select:focus,
    .formulaire-contact textarea:focus {
        border-color: var(--bleu);
        box-shadow: 0 0 0 3px rgba(26, 111, 181, 0.12);
    }
    .info-carte {
        background: var(--gris-clair);
        border-radius: 12px;
        padding: 22px;
        margin-bottom: 15px;
        display: flex;
        gap: 15px;
        align-items: flex-start;
    }
    .info-carte .rond {
        width: 48px; height: 48px;
        background: var(--rouge);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.3rem;
        flex-shrink: 0;
    }
    .info-carte:nth-child(even) .rond { background: var(--bleu); }
    .info-carte h4 { color: var(--gris); margin-bottom: 3px; }
    .info-carte p { font-size: 0.88rem; color: #777; }

    /* Responsive */
    @media (max-width: 800px) {
        .histoire { grid-template-columns: 1fr; }
        .contact-page { grid-template-columns: 1fr; }
    }









    /* ====== BANNIÈRE CONFIRMATION DE RÉCEPTION ====== */
    .banniere-reception {
        background: #f0f7fd;
        border: 2px solid var(--bleu);
        border-radius: 12px;
        padding: 15px;
        margin-bottom: 12px;
    }
    .reception-contenu {
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 15px;
        flex-wrap: wrap;
    }
    .reception-texte strong {
        display: block;
        color: var(--gris);
        font-size: 0.95rem;
        line-height: 1.3;
    }
    .reception-texte small {
        color: #888;
        font-size: 0.82rem;
    }
    .btn-reception {
        background: #2fc069;
        color: var(--blanc);
        border: none;
        padding: 11px 20px;
        border-radius: 50px;
        font-family: inherit;
        font-weight: bold;
        font-size: 0.88rem;
        cursor: pointer;
        white-space: nowrap;
        transition: background 0.3s, transform 0.3s, box-shadow 0.3s;
    }
    .btn-reception:hover {
        background: #25824a;
        transform: translateY(-2px);
        box-shadow: 0 6px 15px rgba(46, 158, 91, 0.35);
    }


    /* ====== CONFIRMATION DE RÉCEPTION (dans la bannière verte) ====== */
    .reception-bloc {
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 15px;
        flex-wrap: wrap;
        background: var(--blanc);
        border: 2px solid var(--vert);
        border-radius: 10px;
        padding: 12px 15px;
        margin-top: 12px;
    }

    /* Variante déjà confirmée : pas de bouton, teinte plus douce */
    .reception-bloc.recu {
        border-style: dashed;
        border-color: #a8d8b8;
        justify-content: center;
    }

    .reception-texte strong {
        display: block;
        color: var(--gris);
        font-size: 0.92rem;
        line-height: 1.3;
    }
    .reception-texte small {
        color: #888;
        font-size: 0.8rem;
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
                <a href="{{ route('welcome') }}" class="{{ request()->routeIs('welcome') ? 'actif' : '' }}">Accueil</a>
                <a href="{{ route('client.produit.index') }}" class="{{ request()->routeIs('client.produit.index') ? 'actif' : '' }}">Produits</a>
                <a href="{{ route('client.service') }}" class="{{ request()->routeIs('client.service') ? 'actif' : '' }}">Services</a>
                <a href="{{ route('client.propos') }}" class="{{ request()->routeIs('client.propos') ? 'actif' : '' }}">À propos</a>
                <a href="{{ route('client.contact') }}" class="{{ request()->routeIs('client.contact') ? 'actif' : '' }}">Contact</a>

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

    @yield('content_client')
</body> 