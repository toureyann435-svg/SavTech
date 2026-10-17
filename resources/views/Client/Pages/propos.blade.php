@extends('Client.navbar')

@section('title', "À propos - SavTech")

@section('content_client')

    <div class="banniere">
        <h1>À propos de <span>SavTech</span></h1>
        <p>Votre satisfaction, notre priorité</p>
    </div>

    <section id="catalogue">
        <div class="container">

            {{-- ===== NOTRE HISTOIRE ===== --}}
            <div class="histoire" style="padding-top:50px;">
                <div class="histoire-texte">
                    <h3>Qui sommes-nous ?</h3>
                    <p><strong>SavTech</strong> est une entreprise ivoirienne spécialisée dans la vente, la réparation et la maintenance d'ordinateurs. Née d'une passion pour la technologie et d'un constat simple : trouver un service informatique fiable, honnête et abordable à Abidjan n'est pas toujours facile.</p>
                    <p>Depuis notre ouverture, nous accompagnons étudiants, entrepreneurs, entreprises et particuliers dans leurs projets informatiques : achat d'équipement, dépannage, installation et formation.</p>
                    <p>Notre force : une équipe de techniciens qualifiés, des produits testés et garantis, et un service client qui vous écoute vraiment.</p>
                </div>
                <div class="histoire-visuel">
                    <div class="grand">+5 ans</div>
                    <p>d'expérience à votre service</p>
                    <div class="grand">100%</div>
                    <p>de clients satisfaits</p>
                    <div class="grand">500+</div>
                    <p>ordinateurs vendus et réparés</p>
                </div>
            </div>

            {{-- ===== NOS VALEURS ===== --}}
            <div class="section-titre" style="padding-top:60px;">
                <h2>Nos <span>valeurs</span></h2>
                <p>Ce qui guide notre travail chaque jour</p>
            </div>

            <div class="grille">
                <div class="valeur">
                    <span class="emo">🤝</span>
                    <h4>Proximité</h4>
                    <p>Nous écoutons chaque client et adaptons nos solutions à son budget réel.</p>
                </div>
                <div class="valeur">
                    <span class="emo">✅</span>
                    <h4>Qualité</h4>
                    <p>Produits testés, réparations soignées et garanties sur nos interventions.</p>
                </div>
                <div class="valeur">
                    <span class="emo">💎</span>
                    <h4>Transparence</h4>
                    <p>Devis clairs avant toute réparation. Pas de frais cachés, jamais.</p>
                </div>
                <div class="valeur">
                    <span class="emo">⚡</span>
                    <h4>Rapidité</h4>
                    <p>Un problème informatique vous bloque ? Nous intervenons dans les meilleurs délais.</p>
                </div>
            </div>

            {{-- ===== NOTRE MISSION ===== --}}
            <div class="section-titre" style="padding-top:60px;">
                <h2>Notre <span>mission</span></h2>
            </div>

            <div class="panneau-contact" style="background: var(--gris-clair); border-radius: 15px; padding: 35px; text-align: center; margin-bottom: 50px;">
                <p style="font-size: 1.15rem; color: var(--gris); max-width: 700px; margin: 0 auto;">
                    « Rendre la technologie <strong>accessible</strong>, <strong>fiable</strong> et <strong>abordable</strong>
                    pour tous les Ivoiriens, en offrant un service client digne de ce nom —
                    parce que votre satisfaction est véritablement notre priorité. »
                </p>
            </div>

        </div>
    </section>

    {{-- ===== CTA ===== --}}
    <div class="cta-bandeau">
        <h2>Venez nous <span>rencontrer</span> !</h2>
        <p>Notre équipe vous accueille en boutique du lundi au samedi.</p>
        <a href="/contact" class="btn-cta">📍 Voir nos coordonnées</a>
    </div>

@endsection