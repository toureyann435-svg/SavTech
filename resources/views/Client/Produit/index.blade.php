@extends('Client.navbar')
@section('content_client')

    <div class="banniere">
        <h1>Nos <span>Produits</span></h1>
        <p>Des équipements de qualité pour tous vos besoins</p>
    </div>

    <div class="filtres">
        <button class="filtre actif" onclick="filtrer('tous', this)">Tous</button>
        <button class="filtre" onclick="filtrer('portable', this)">Ordinateurs portables</button>
        <button class="filtre" onclick="filtrer('bureau', this)">PC de bureau</button>
        <button class="filtre" onclick="filtrer('imprimante', this)">Imprimantes</button>
        <button class="filtre" onclick="filtrer('accessoire', this)">Accessoires</button>
    </div>

    <section id="catalogue">
        <div class="container">
            <div class="grille" id="grille">

                <!-- Produit 1 -->
                <div class="produit" data-categorie="portable">
                    <div class="image-produit">💻<span class="badge neuf">Neuf</span></div>
                    <div class="infos">
                        <h3>HP Pavilion 15</h3>
                        <p class="specs">Core i5 — 8 Go RAM — SSD 512 Go — Windows 11</p>
                        <div class="prix">285 000 FCFA</div>
                        <div class="actions-produit">
                            <a href="#" class="btn-commander">Commander</a>
                            <button type="button" class="btn-panier" onclick="ajouterPanier(this)">🛒 <span>Ajouter au panier</span></button>
                        </div>
                    </div>
                </div>

                <!-- Produit 2 -->
                <div class="produit" data-categorie="portable">
                    <div class="image-produit">💻<span class="badge occasion">Occasion</span></div>
                    <div class="infos">
                        <h3>Lenovo ThinkPad T14</h3>
                        <p class="specs">Core i5 — 8 Go RAM — SSD 256 Go</p>
                        <div class="prix">210 000 FCFA</div>
                        <div class="actions-produit">
                            <a href="#" class="btn-commander">Commander</a>
                            <button type="button" class="btn-panier" onclick="ajouterPanier(this)">🛒 <span>Ajouter au panier</span></button>
                        </div>
                    </div>
                </div>

                <!-- Produit 3 -->
                <div class="produit" data-categorie="portable">
                    <div class="image-produit">💻<span class="badge occasion">Occasion</span></div>
                    <div class="infos">
                        <h3>Dell Latitude 7490</h3>
                        <p class="specs">Core i7 — 16 Go RAM — SSD 512 Go</p>
                        <div class="prix">265 000 FCFA</div>
                        <div class="actions-produit">
                            <a href="#" class="btn-commander">Commander</a>
                            <button type="button" class="btn-panier" onclick="ajouterPanier(this)">🛒 <span>Ajouter au panier</span></button>
                        </div>
                    </div>
                </div>

                <!-- Produit 4 -->
                <div class="produit" data-categorie="portable">
                    <div class="image-produit">💻<span class="badge occasion">Occasion</span></div>
                    <div class="infos">
                        <h3>HP EliteBook 840 G5</h3>
                        <p class="specs">Core i5 — 8 Go RAM — SSD 256 Go — Écran tactile</p>
                        <div class="prix">245 000 FCFA</div>
                        <div class="actions-produit">
                            <a href="#" class="btn-commander">Commander</a>
                            <button type="button" class="btn-panier" onclick="ajouterPanier(this)">🛒 <span>Ajouter au panier</span></button>
                        </div>
                    </div>
                </div>

                <!-- Produit 5 -->
                <div class="produit" data-categorie="bureau">
                    <div class="image-produit">🖥️<span class="badge occasion">Occasion</span></div>
                    <div class="infos">
                        <h3>Unité centrale Core i3</h3>
                        <p class="specs">4 Go RAM — 500 Go HDD — Idéal bureautique</p>
                        <div class="prix">150 000 FCFA</div>
                        <div class="actions-produit">
                            <a href="#" class="btn-commander">Commander</a>
                            <button type="button" class="btn-panier" onclick="ajouterPanier(this)">🛒 <span>Ajouter au panier</span></button>
                        </div>
                    </div>
                </div>

                <!-- Produit 6 -->
                <div class="produit" data-categorie="bureau">
                    <div class="image-produit">🖥️<span class="badge occasion">Occasion</span></div>
                    <div class="infos">
                        <h3>Unité centrale Core i5</h3>
                        <p class="specs">8 Go RAM — SSD 256 Go — Écran 22&quot; inclus</p>
                        <div class="prix">295 000 FCFA</div>
                        <div class="actions-produit">
                            <a href="#" class="btn-commander">Commander</a>
                            <button type="button" class="btn-panier" onclick="ajouterPanier(this)">🛒 <span>Ajouter au panier</span></button>
                        </div>
                    </div>
                </div>

                <!-- Produit 7 -->
                <div class="produit" data-categorie="imprimante">
                    <div class="image-produit">🖨️<span class="badge neuf">Neuf</span></div>
                    <div class="infos">
                        <h3>Canon Pixma</h3>
                        <p class="specs">Jet d'encre — Couleur — Scan &amp; Copie</p>
                        <div class="prix">75 000 FCFA</div>
                        <div class="actions-produit">
                            <a href="#" class="btn-commander">Commander</a>
                            <button type="button" class="btn-panier" onclick="ajouterPanier(this)">🛒 <span>Ajouter au panier</span></button>
                        </div>
                    </div>
                </div>

                <!-- Produit 8 -->
                <div class="produit" data-categorie="imprimante">
                    <div class="image-produit">🖨️<span class="badge neuf">Neuf</span></div>
                    <div class="infos">
                        <h3>HP LaserJet Pro</h3>
                        <p class="specs">Laser — Noir &amp; Blanc — WiFi</p>
                        <div class="prix">120 000 FCFA</div>
                        <div class="actions-produit">
                            <a href="#" class="btn-commander">Commander</a>
                            <button type="button" class="btn-panier" onclick="ajouterPanier(this)">🛒 <span>Ajouter au panier</span></button>
                        </div>
                    </div>
                </div>

                <!-- Produit 9 -->
                <div class="produit" data-categorie="accessoire">
                    <div class="image-produit">🖱️<span class="badge neuf">Neuf</span></div>
                    <div class="infos">
                        <h3>Souris sans fil</h3>
                        <p class="specs">USB — Pile incluse</p>
                        <div class="prix">5 000 FCFA</div>
                        <div class="actions-produit">
                            <a href="#" class="btn-commander">Commander</a>
                            <button type="button" class="btn-panier" onclick="ajouterPanier(this)">🛒 <span>Ajouter au panier</span></button>
                        </div>
                    </div>
                </div>

                <!-- Produit 10 -->
                <div class="produit" data-categorie="accessoire">
                    <div class="image-produit">🎒<span class="badge neuf">Neuf</span></div>
                    <div class="infos">
                        <h3>Sac à dos pour ordinateur</h3>
                        <p class="specs">Imperméable — Jusqu'à 15.6&quot;</p>
                        <div class="prix">15 000 FCFA</div>
                        <div class="actions-produit">
                            <a href="#" class="btn-commander">Commander</a>
                            <button type="button" class="btn-panier" onclick="ajouterPanier(this)">🛒 <span>Ajouter au panier</span></button>
                        </div>
                    </div>
                </div>

                <!-- Produit 11 -->
                <div class="produit" data-categorie="accessoire">
                    <div class="image-produit">🔌<span class="badge neuf">Neuf</span></div>
                    <div class="infos">
                        <h3>Chargeur rapide</h3>
                        <p class="specs">Compatible téléphones — Plusieurs modèles</p>
                        <div class="prix">8 000 FCFA</div>
                        <div class="actions-produit">
                            <a href="#" class="btn-commander">Commander</a>
                            <button type="button" class="btn-panier" onclick="ajouterPanier(this)">🛒 <span>Ajouter au panier</span></button>
                        </div>
                    </div>
                </div>

                <!-- Produit 12 -->
                <div class="produit" data-categorie="accessoire">
                    <div class="image-produit">⌨️<span class="badge neuf">Neuf</span></div>
                    <div class="infos">
                        <h3>Clavier USB</h3>
                        <p class="specs">AZERTY — Filaire</p>
                        <div class="prix">7 000 FCFA</div>
                        <div class="actions-produit">
                            <a href="#" class="btn-commander">Commander</a>
                            <button type="button" class="btn-panier" onclick="ajouterPanier(this)">🛒 <span>Ajouter au panier</span></button>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <footer>
        <p>© 2025 <strong>Sav<span class="rouge">Tech</span></strong> — Votre satisfaction, notre priorité</p>
    </footer>

<script>
    // Filtre par catégorie
    function filtrer(categorie, bouton) {
        const produits = document.querySelectorAll('.produit');
        produits.forEach(p => {
            p.style.display = (categorie === 'tous' || p.dataset.categorie === categorie) ? 'flex' : 'none';
        });
        document.querySelectorAll('.filtre').forEach(f => f.classList.remove('actif'));
        bouton.classList.add('actif');
    }

    // Ajouter au panier (démo visuelle)
    function ajouterPanier(bouton) {
        bouton.classList.add('ajoute');
        const texte = bouton.querySelector('span');
        texte.textContent = 'Ajouté ! ✓';
        setTimeout(() => {
            bouton.classList.remove('ajoute');
            texte.textContent = 'Ajouter au panier';
        }, 1500);
    }
</script>
@endsection