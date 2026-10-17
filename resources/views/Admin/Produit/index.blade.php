@extends('Admin.navbar')

@section('title', 'Gestion des Produits - SavTech Admin')

@section('content_admin')

<div class="container">

    {{-- En-tête avec bouton Créer --}}
    <div class="entete">
        <div>
            <h1>Gestion des <span>Produits</span> 💻</h1>
            <p>Tous les produits de la boutique</p>
        </div>
        <div class="entete-boutons">
            <a href="{{ route('admin.produit.create') }}" class="btn-rouge">➕ Créer un produit</a>
            <a href="{{ route('admin.dashboard') }}" class="btn-retour">← Dashboard</a>
        </div>
    </div>

    {{-- Liste des produits --}}
    <div class="panneau" style="margin-bottom:40px;">
        <h2>Liste des <span>produits</span> (<span id="compteur">{{ count($produits) }}</span>)</h2>
        <div class="tableau-wrapper">
            @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
            <table>
                <thead>
                    <tr>
                        <th>Icône</th>
                        <th>Nom</th>
                        <th>Catégorie</th>
                        <th>État</th>
                        <th>Prix</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody id="corps-tableau">

                    @if($produits->isEmpty())
                        <tr>
                            <td colspan="6" style="text-align:center;">Aucun produit trouvé.</td>
                        </tr>
                    @else
                        @foreach($produits as $produit)
                    <tr>
                        <td class="td-emoji">
                            @if($produit->photo_1)
                               <img src="{{ asset('storage/' . $produit->photo_1) }}" class="td-photo" alt="{{ $produit->nom }}">
                            @else
                               {{ $produit->emoji }}
                            @endif
                        </td>
                        <td><strong>{{ $produit->nom_produit }}</strong><br><small class="td-specs">{{ $produit->caracteristiques }}</small></td>
                        <td>{{ $produit->categorie }}</td>
                        <td><span class="}">{{ $produit->etat }}</span></td>
                        <td class="td-prix">{{ number_format($produit->prix, 0, ',', ' ') }} FCFA</td>
                        <td>
                            <div class="actions-ligne">
                                <a href="{{ route('admin.produit.edit', $produit->id) }}" class="btn-mini btn-bleu" title="Modifier">✏️</a>
                                <form action="{{ route('admin.produit.delete', $produit->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn-mini btn-rouge" title="Supprimer">🗑️</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                    @endif
                </tbody>
            </table>
        </div>
    </div>

</div>

@endsection

@section('scripts')
<script>
    // Supprimer un produit (visuel)
    function supprimerProduit(bouton, nom) {
        if (confirm('Supprimer « ' + nom + ' » ?')) {
            bouton.closest('tr').remove();
            mettreAJourCompteur();
        }
    }

    // Mettre à jour le compteur
    function mettreAJourCompteur() {
        const total = document.querySelectorAll('#corps-tableau tr').length;
        document.getElementById('compteur').textContent = total;
    }
</script>
@endsection