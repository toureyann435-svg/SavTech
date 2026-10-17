@extends('Admin.navbar')

@section('title', 'Créer un produit - SavTech Admin')

@section('content_admin')

<div class="container">

    <div class="entete">
        <div>
            <h1>Créer un <span>produit</span> ➕</h1>
            <p>Remplissez les informations du nouveau produit</p>
        </div>
        <a href="{{ route('admin.produit') }}" class="btn-retour">← Retour aux produits</a>
    </div>

    <div class="panneau" style="margin-bottom:40px;">
        <form action="{{ route('admin.produit.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="form-grille">
                <div class="champ-admin">
                    <label>Nom du produit *</label>
                    <input type="text" id="nom" placeholder="Ex : HP Pavilion 15" required name="nom">
                    @error('nom')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="champ-admin">
                    <label>Catégorie *</label>
                    <select id="categorie" name="categorie">
                        <option value="">Sélectionnez une catégorie</option>
                        <option value="Portable">Ordinateur portable</option>
                        <option value="Bureau">PC de bureau</option>
                        <option value="Imprimante">Imprimante</option>
                        <option value="Accessoire">Accessoire</option>
                    </select>
                    @error('categorie')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="champ-admin">
                    <label>Prix (FCFA) *</label>
                    <input type="number" id="prix" min="0" placeholder="Ex : 285000" required name="prix">
                    @error('prix')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="champ-admin">
                    <label>État *</label>
                    <select id="etat" name="etat">
                        <option value="">Sélectionnez un état</option>
                        <option value="Neuf">Neuf</option>
                        <option value="Occasion">Occasion</option>
                    </select>
                    @error('etat')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="champ-admin">
                    <label>Quantité en stock *</label>
                    <input type="number" id="quantite" value="1" min="0" required name="quantite">
                    @error('quantite')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="champ-admin champ-large">
                    <label>Caractéristiques</label>
                    <input type="text" id="specs" name="caracteristiques" placeholder="Ex : Core i5 — 8 Go RAM — SSD 512 Go">
                    @error('caracteristiques')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>

                {{-- ===== PHOTOS (3 MAXIMUM) ===== --}}
                <div class="champ-admin champ-large">
                    <label>Photos du produit (3 maximum)</label>
                    <div class="photos-grille">

                        {{-- Photo 1 --}}
                        <div class="photo-slot">
                            <img id="apercu-1" class="photo-apercu" alt="Aperçu photo 1">
                            <div class="photo-vide" id="vide-1" onclick="document.getElementById('photo-1').click()">
                                <span>📷</span><span>Photo 1</span>
                            </div>
                            <input type="file" id="photo-1" accept="image/*" hidden onchange="chargerPhoto(this, 1)" name="photo1" required>
                            @error('photo1')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- Photo 2 --}}
                        <div class="photo-slot">
                            <img id="apercu-2" class="photo-apercu" alt="Aperçu photo 2">
                            <div class="photo-vide" id="vide-2" onclick="document.getElementById('photo-2').click()">
                                <span>📷</span><span>Photo 2</span>
                            </div>
                            <input type="file" id="photo-2" accept="image/*" hidden onchange="chargerPhoto(this, 2)" name="photo2">
                            @error('photo2')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- Photo 3 --}}
                        <div class="photo-slot">
                            <img id="apercu-3" class="photo-apercu" alt="Aperçu photo 3">
                            <div class="photo-vide" id="vide-3" onclick="document.getElementById('photo-3').click()">
                                <span>📷</span><span>Photo 3</span>
                            </div>
                            <input type="file" id="photo-3" accept="image/*" hidden onchange="chargerPhoto(this, 3)" name="photo3">
                            @error('photo3')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>

                    </div>
                    <small class="photo-aide">Formats acceptés : JPG, PNG, WEBP — 3 photos maximum</small>
                </div>
            </div>

            <button type="submit" class="btn-valider">💾 Enregistrer le produit</button>
        </form>
    </div>

</div>

@endsection

@section('scripts')
<script>
    // Afficher l'aperçu de l'image choisie depuis l'ordinateur
    function chargerPhoto(input, numero) {
        const fichier = input.files[0];
        if (!fichier) return;

        const lecteur = new FileReader();
        lecteur.onload = function(e) {
            const apercu = document.getElementById('apercu-' + numero);
            apercu.src = e.target.result;
            apercu.style.display = 'block';
            document.getElementById('vide-' + numero).style.display = 'none';
        };
        lecteur.readAsDataURL(fichier);
    }
</script>
@endsection