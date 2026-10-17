@extends('Admin.navbar')

@section('title', 'Modifier un produit - SavTech Admin')

@section('content_admin')

<div class="container">

    <div class="entete">
        <div>
            <h1>Modifier : <span>{{ $produit->nom_produit }}</span> ✏️</h1>
            <p>Modifiez les informations puis enregistrez</p>
        </div>
        <a href="{{ route('admin.produit') }}" class="btn-retour">← Retour aux produits</a>
    </div>

    <div class="panneau" style="margin-bottom:40px;">
        <form method="POST" enctype="multipart/form-data" action="{{ route('admin.produit.update', $produit->id) }}">
            @csrf
            @method('PUT')
            <div class="form-grille">
                <div class="champ-admin">
                    <label>Nom du produit *</label>
                    <input type="text" value="{{ $produit->nom_produit }}" name="nom_produit">
                    @error('nom_produit')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="champ-admin">
                    <label>Catégorie *</label>
                    <select name="categorie">
                        <option value="">Sélectionnez une catégorie</option>
                        <option {{ $produit->categorie == "Portable" ? 'selected' : '' }}>Portable</option>
                        <option {{ $produit->categorie == "Bureau" ? 'selected' : '' }}>Bureau</option>
                        <option {{ $produit->categorie == "Imprimante" ? 'selected' : '' }}>Imprimante</option>
                        <option {{ $produit->categorie == "Accessoire" ? 'selected' : '' }}>Accessoire</option>
                    </select>
                    @error('categorie')
                        <div class="alert alert-danger">{{ $message }}</div>   
                    @enderror
                </div>
                <div class="champ-admin">
                    <label>Prix (FCFA) *</label>
                    <input type="number" value="{{ $produit->prix }}" min="0" name="prix">
                    @error('prix')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="champ-admin">
                    <label>État *</label>
                    <select name="etat">
                        <option value="">Sélectionnez un état</option>
                        <option {{ $produit->etat == "Neuf" ? 'selected' : '' }}>Neuf</option>
                        <option {{ $produit->etat == "Occasion" ? 'selected' : '' }}>Occasion</option>
                    </select>
                    @error('etat')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="champ-admin">
                    <label>Icône</label>
                    <select name="emoji">
                        <option selected>💻</option>
                        <option>🖥️</option>
                        <option>🖨️</option>
                        <option>🖱️</option>
                        <option>⌨️</option>
                        <option>🎒</option>
                        <option>🔌</option>
                    </select>
                </div>
                <div class="champ-admin champ-large">
                    <label>Caractéristiques</label>
                    <input type="text" value="{{ $produit->caracteristiques }}" name="caracteristiques">
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
                            <img id="apercu-1" class="photo-apercu" alt="Photo 1"
                                 @if($produit->photo_1) src="{{ asset('storage/' . $produit->photo_1) }}" style="display:block;" @endif>
                            <div class="photo-vide" id="vide-1" onclick="document.getElementById('photo-1').click()"
                                 @if($produit->photo_1) style="display:none;" @endif>
                                <span>📷</span><span>Photo 1</span>
                            </div>
                            <input type="file" id="photo-1" accept="image/*" hidden onchange="chargerPhoto(this, 1)" name="photo1">
                            @error('photo1')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- Photo 2 --}}
                        <div class="photo-slot">
                            <img id="apercu-2" class="photo-apercu" alt="Photo 2"
                                 @if($produit->photo_2) src="{{ asset('storage/' . $produit->photo_2) }}" style="display:block;" @endif>
                            <div class="photo-vide" id="vide-2" onclick="document.getElementById('photo-2').click()"
                                 @if($produit->photo_2) style="display:none;" @endif>
                                <span>📷</span><span>Photo 2</span>
                            </div>
                            <input type="file" id="photo-2" accept="image/*" hidden onchange="chargerPhoto(this, 2)" name="photo2">
                            @error('photo2')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- Photo 3 --}}
                        <div class="photo-slot">
                            <img id="apercu-3" class="photo-apercu" alt="Photo 3"
                                 @if($produit->photo_3) src="{{ asset('storage/' . $produit->photo_3) }}" style="display:block;" @endif>
                            <div class="photo-vide" id="vide-3" onclick="document.getElementById('photo-3').click()"
                                 @if($produit->photo_3) style="display:none;" @endif>
                                <span>📷</span><span>Photo 3</span>
                            </div>
                            <input type="file" id="photo-3" accept="image/*" hidden onchange="chargerPhoto(this, 3)" name="photo3">
                            @error('photo3')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>

                    </div>
                    <small class="photo-aide">Cliquez sur une photo pour la remplacer — 3 photos maximum</small>
                </div>
            </div>
            <button type="submit" class="btn-valider">💾 Enregistrer les modifications</button>
        </form>
    </div>

</div>

@endsection

@section('scripts')
<script>
    // Afficher l'aperçu de la nouvelle image choisie depuis l'ordinateur
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