@extends('Client.navbar')

@section('title', "Nos Services - SavTech")

@section('content_client')

    <div class="banniere">
        <h1>Nos <span>Services</span></h1>
        <p>Tout ce dont votre ordinateur a besoin, au même endroit</p>
    </div>

    <section id="catalogue">
        <div class="container">
            <div class="section-titre" style="padding-top:40px;">
                <h2>Ce que nous <span>proposons</span></h2>
                <p>Des solutions complètes pour particuliers et entreprises</p>
            </div>

            <div class="grille">

                <div class="carte">
                    <div class="icone">💻</div>
                    <h3>Vente d'ordinateurs</h3>
                    <p>Ordinateurs portables et PC de bureau neufs et d'occasion reconditionnés, garantis. Toutes les grandes marques : HP, Lenovo, Dell...</p>
                </div>

                <div class="carte">
                    <div class="icone">🔧</div>
                    <h3>Réparation & Maintenance</h3>
                    <p>Diagnostic gratuit, réparation matérielle et logicielle par des techniciens qualifiés. Remplacement d'écran, clavier, batterie...</p>
                </div>

                <div class="carte">
                    <div class="icone">💿</div>
                    <h3>Installation de logiciels</h3>
                    <p>Windows, antivirus, suites bureautiques et tous les logiciels professionnels dont vous avez besoin.</p>
                </div>

                <div class="carte">
                    <div class="icone">🗄️</div>
                    <h3>Récupération de données</h3>
                    <p>Vos fichiers perdus à cause d'une panne ? Nous récupérons vos documents, photos et données importantes.</p>
                </div>

                <div class="carte">
                    <div class="icone">🎓</div>
                    <h3>Formation & Conseils</h3>
                    <p>Initiation à l'informatique, prise en main d'outils bureautiques et conseils personnalisés pour bien choisir votre équipement.</p>
                </div>

                <div class="carte">
                    <div class="icone">🖨️</div>
                    <h3>Accessoires & Imprimantes</h3>
                    <p>Imprimantes, consommables, souris, claviers, sacoches et chargeurs de qualité.</p>
                </div>

            </div>

            {{-- ===== COMMENT ÇA MARCHE ===== --}}
            <div class="section-titre" style="padding-top:50px;">
                <h2>Comment <span>ça marche</span> ?</h2>
                <p>Simple, rapide et transparent</p>
            </div>

            <div class="etapes-service">
                <div class="etape-service">
                    <div class="num">1</div>
                    <h4>Vous nous contactez</h4>
                    <p>Par téléphone, WhatsApp ou en boutique pour décrire votre besoin.</p>
                </div>
                <div class="etape-service">
                    <div class="num">2</div>
                    <h4>Nous diagnostiquons</h4>
                    <p>Diagnostic gratuit et devis clair avant toute intervention.</p>
                </div>
                <div class="etape-service">
                    <div class="num">3</div>
                    <h4>Nous intervenons</h4>
                    <p>Réparation ou livraison dans les meilleurs délais.</p>
                </div>
                <div class="etape-service">
                    <div class="num">4</div>
                    <h4>Vous êtes satisfait</h4>
                    <p>Garantie sur nos interventions — votre satisfaction, notre priorité !</p>
                </div>
            </div>
        </div>
    </section>

    {{-- ===== CTA ===== --}}
    <div class="cta-bandeau">
        <h2>Un besoin ? Une <span>question</span> ?</h2>
        <p>Notre équipe vous répond rapidement, 6 jours sur 7.</p>
        <a href="/contact" class="btn-cta">📞 Nous contacter</a>
    </div>

@endsection