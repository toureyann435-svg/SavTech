@extends('Admin.navbar')

@section('title', 'Gestion des Paramètres - SavTech Admin')

@section('content_admin')

<div class="container">

    {{-- En-tête --}}
    <div class="entete">
        <div>
            <h1>Gestion des <span>Paramètres</span> ⚙️</h1>
            <p>Configurez votre compte, la boutique et vos préférences</p>
        </div>
        <div class="entete-boutons">
            <a href="/admin/dashboard" class="btn-retour">← Dashboard</a>
        </div>
    </div>

    {{-- ==========================================================
         1. PROFIL DE L'ADMINISTRATEUR
         ========================================================== --}}
    <div class="panneau panneau-parametres">

        <h2><span class="param-titre-icone">👤</span> Profil de <span>l'administrateur</span></h2>
        @if(session('success'))
         <div class="alert alert-success">
            {{ session('success') }}
         </div>
        @else
         <div class="alert alert-danger">
            {{ session('erreur') }}
         </div>
        @endif 
        <div class="profil-bandeau">
            <div class="profil-avatar">A</div>
            <div>
                <strong>Admin</strong>
                <small>Administrateur principal — SavTech</small>
            </div>
            <span class="badge livree">Actif</span>
        </div>

        <form>
            <div class="form-grille">
                <div class="champ-admin">
                    <label>Nom complet</label>
                    <input type="text" value="{{ auth()->user()->nom }} {{ auth()->user()->prenom }}" name="nom_complet">
                </div>
                
                <div class="champ-admin">
                    <label>Email de connexion</label>
                    <input type="email" value="savtech@gmail.com">
                </div>
                <div class="champ-admin">
                    <label>Numéro de téléphone</label>
                    <input type="tel" value="{{ auth()->user()->numero_telephone }}" name="numero">
                </div>
            </div>
            <button type="button" class="btn-valider">💾 Enregistrer le profil</button>
        </form>
    </div>

    {{-- ==========================================================
         2. INFORMATIONS DE LA BOUTIQUE
         (affichées sur le site client : topbar, page contact...)
         ========================================================== --}}
<div class="panneau panneau-parametres">

    <h2><span class="param-titre-icone">🏪</span> Informations de <span>la boutique</span></h2>

    {{-- enctype OBLIGATOIRE pour envoyer des fichiers --}}
@if(session('success'))
    <div class="alert-success">
        ✅ {{ session('success') }}
    </div>
@endif
    <form method="POST" action="{{ route('admin.store_boutique') }}" enctype="multipart/form-data">
        @csrf

        <div class="form-grille">
            <div class="champ-admin">
                <label>Nom de la boutique</label>
                <input type="text" value="{{ isset($boutique->nom_boutique) ? $boutique->nom_boutique : 'SavTech'}}" name="nom_boutique">
                @error('nom_boutique')
                 <div>{{ $message }}</div>
                @enderror
            </div>
            <div class="champ-admin">
                <label>Slogan</label>
                <input type="text" value="{{isset($boutique->slogan) ? $boutique->slogan : 'Votre satisfaction, notre priorité' }}" name="slogan">
                @error('slogan')
                 <div>{{ $message }}</div>
                @enderror
            </div>
            <div class="champ-admin">
                <label>Téléphone affiché sur le site</label>
                <input type="tel" value="{{ isset($boutique->numero_boutique) ? $boutique->numero_boutique : '+225 XX XX XX XX XX' }}" name="numero_telephone">
                @error('numero_telephone')
                 <div>{{ $message }}</div>
                @enderror
            </div>
            <div class="champ-admin">
                <label>Deuxième numéro (WhatsApp)</label>
                <input type="tel" value="{{ isset($boutique->numero_whatsapp) ? $boutique->numero_whatsapp : '+225 XX XX XX XX XX' }}" name="numero_whatsapp">
                @error('numero_whatsapp')
                 <div>{{ $message }}</div>
                @enderror
            </div>
            <div class="champ-admin">
                <label>Email affiché sur le site</label>
                <input type="email" value="{{ isset($boutique->email_boutique) ? $boutique->email_boutique : 'savtech@gmail.com' }}" name="email_site">
                @error('email_site')
                 <div>{{ $message }}</div>
                @enderror
            </div>
            <div class="champ-admin champ-large">
                <label>Adresse de la boutique</label>
                <input type="text" value="{{ isset($boutique->adresse_boutique) ? $boutique->adresse_boutique : 'Votre adresse ici, Abidjan' }}" name="adresse">
                @error('adresse')
                 <div>{{ $message }}</div>
                @enderror
            </div>
            <div class="champ-admin champ-large">
                <label>Horaires d'ouverture</label>
                <input type="text" value="{{ isset($boutique->heure_ouvetture) ? $boutique->heure_ouverture : 'Lundi — Samedi : 08h00 à 18h00' }}" name="horaire">
                @error('horaire')
                 <div>{{ $message }}</div>
                @enderror
            </div>

            {{-- ===== PHOTOS DE LA BOUTIQUE (3 MAXIMUM) ===== --}}
            <div class="champ-admin champ-large">
                <label>Photos de la boutique (3 maximum)</label>
                <div class="photos-grille">

                    {{-- Photo 1 --}}
                    <div class="photo-slot">
                        <img id="apercu-boutique-1" class="photo-apercu" alt="Aperçu photo 1" src={{ isset($boutique->photo_1_boutique) ? asset('storage/'.$boutique->photo_1_boutique) : '' }}>
                        <button type="button" class="photo-supprimer" id="suppr-boutique-1"
                                onclick="supprimerPhotoBoutique(1)" style="display:none;">✕</button>
                        <div class="photo-vide" id="vide-boutique-1"
                             onclick="document.getElementById('photo-boutique-1').click()">
                            <span>📷</span><span>Photo 1</span>
                        </div>
                        <input type="file" id="photo-boutique-1" accept="image/*" hidden
                               onchange="chargerPhotoBoutique(this, 1)" name="photo1">
                        @error('photo1')
                          <div>{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- Photo 2 --}}
                    <div class="photo-slot">
                        <img id="apercu-boutique-2" class="photo-apercu" alt="Aperçu photo 2" src={{ isset($boutique->photo_2_boutique) ? asset('storage/'.$boutique->photo_2_boutique) : '' }}>
                        <button type="button" class="photo-supprimer" id="suppr-boutique-2"
                                onclick="supprimerPhotoBoutique(2)" style="display:none;">✕</button>
                        <div class="photo-vide" id="vide-boutique-2"
                             onclick="document.getElementById('photo-boutique-2').click()">
                            <span>📷</span><span>Photo 2</span>
                        </div>
                        <input type="file" id="photo-boutique-2" accept="image/*" hidden
                               onchange="chargerPhotoBoutique(this, 2)" name="photo2">
                    </div>
                        @error('photo2')
                          <div>{{ $message }}</div>
                        @enderror
                    {{-- Photo 3 --}}
                    <div class="photo-slot">
                        <img id="apercu-boutique-3" class="photo-apercu" alt="Aperçu photo 3" src={{ isset($boutique->photo_3_boutique) ? asset('storage/'.$boutique->photo_3_boutique) : '' }}>
                        <button type="button" class="photo-supprimer" id="suppr-boutique-3"
                                onclick="supprimerPhotoBoutique(3)" style="display:none;">✕</button>
                        <div class="photo-vide" id="vide-boutique-3"
                             onclick="document.getElementById('photo-boutique-3').click()">
                            <span>📷</span><span>Photo 3</span>
                        </div>
                        <input type="file" id="photo-boutique-3" accept="image/*" hidden
                               onchange="chargerPhotoBoutique(this, 3)" name="photo3">
                    </div>
                        @error('photo3')
                          <div>{{ $message }}</div>
                        @enderror
                </div>
                <small class="photo-aide">Formats acceptés : JPG, PNG, WEBP — 3 photos maximum</small>
            </div>
        </div>

        <button type="submit" class="btn-valider">
            @if($boutique)
             💾 Modifier les informations
            @else
             💾 Enregistrer les informations
            @endif
        </button>
    </form>
</div>

    {{-- ==========================================================
         3. PRÉFÉRENCES (interrupteurs — CSS pur, sans JS)
         ========================================================== --}}
    <div class="panneau panneau-parametres">

        <h2><span class="param-titre-icone">🔔</span> <span>Préférences</span></h2>

        <div class="liste-preferences">

            <div class="preference">
                <div>
                    <strong>Nouvelle commande</strong>
                    <small>Recevoir une notification à chaque commande client</small>
                </div>
                <label class="switch">
                    <input type="checkbox">
                    <span class="interrupteur"></span>
                </label>
            </div>

            <div class="preference">
                <div>
                    <strong>Alerte stock faible</strong>
                    <small>Être prévenu quand un produit descend à 5 exemplaires ou moins</small>
                </div>
                <label class="switch">
                    <input type="checkbox" name="alerte_faible" value="1">
                    <span class="interrupteur"></span>
                </label>
            </div>

            <div class="preference">
                <div>
                    <strong>Alerte rupture de stock</strong>
                    <small>Être prévenu dès qu'un produit atteint 0 en quantité</small>
                </div>
                <label class="switch">
                    <input type="checkbox" name="alerte_rupture" value="1">
                    <span class="interrupteur"></span>
                </label>
            </div>

            <div class="preference">
                <div>
                    <strong>Emails hebdomadaires</strong>
                    <small>Recevoir un résumé des ventes chaque lundi matin</small>
                </div>
                <label class="switch">
                    <input type="checkbox" name="email_hebdomadaire" value="1">
                    <span class="interrupteur"></span>
                </label>
            </div>

            <div class="preference">
                <div>
                    <strong>Afficher les produits en rupture</strong>
                    <small>Montrer les produits à 0 sur le site client avec la mention « Rupture »</small>
                </div>
                <label class="switch">
                    <input type="checkbox" name="produits_rupture" value="1">
                    <span class="interrupteur"></span>
                </label>
            </div>

        </div>
    </div>
    {{-- ==========================================================
         5. ASSISTANTS
         ========================================================== --}}
    <div class="panneau panneau-parametres">

        <h2><span class="param-titre-icone">🧑‍💼</span> Gestion des <span>assistants</span></h2>

        @if(session('success'))
            <div class="alert-success">✅ {{ session('success') }}</div>
        @endif

        {{-- ===== FORMULAIRE D'AJOUT ===== --}}
        <form method="POST" action="">
            @csrf
            <div class="form-grille">

                <div class="champ-admin">
                    <label>Nom *</label>
                    <input type="text" name="nom" value="{{ old('nom') }}" placeholder="Ex : Konan" required>
                    @error('nom')
                        <div class="texte-erreur-admin">{{ $message }}</div>
                    @enderror
                </div>

                <div class="champ-admin">
                    <label>Prénom *</label>
                    <input type="text" name="prenom" value="{{ old('prenom') }}" placeholder="Ex : Serge" required>
                    @error('prenom')
                        <div class="texte-erreur-admin">{{ $message }}</div>
                    @enderror
                </div>

                <div class="champ-admin">
                    <label>Email de connexion *</label>
                    <input type="email" name="email" value="{{ old('email') }}" placeholder="assistant@savtech.com" required>
                    @error('email')
                        <div class="texte-erreur-admin">{{ $message }}</div>
                    @enderror
                </div>

                <div class="champ-admin">
                    <label>Numéro de téléphone *</label>
                    <input type="tel" name="numero_telephone" value="{{ old('numero_telephone') }}" placeholder="+225 XX XX XX XX XX" required>
                    @error('numero_telephone')
                        <div class="texte-erreur-admin">{{ $message }}</div>
                    @enderror
                </div>

                <div class="champ-admin champ-large">
                    <label>Mot de passe initial *</label>
                    <input type="text" name="password" placeholder="Minimum 8 caractères — l'assistant pourra le changer" required>
                    @error('password')
                        <div class="texte-erreur-admin">{{ $message }}</div>
                    @enderror
                    <small class="photo-aide">Communiquez ce mot de passe à l'assistant — il pourra le modifier dans ses paramètres.</small>
                </div>
            </div>

            <button type="submit" class="btn-valider">➕ Ajouter l'assistant</button>
        </form>

        {{-- ===== LISTE DES ASSISTANTS ===== --}}
        <h3 class="sous-titre-panneau">Assistants actuels (0)</h3>

        <div class="liste-assistants">
            @if(!empty($assistants))
            @foreach($assistants as $assistant)
                <div class="assistant-item">
                    <div class="cmd-client">
                        <span class="avatar-client">{{ strtoupper(substr($assistant->nom, 0, 1)) }}{{ strtoupper(substr($assistant->prenom ?? '', 0, 1)) }}</span>
                        <div>
                            <strong>{{ $assistant->nom }} {{ $assistant->prenom }}</strong><br>
                            <small>{{ $assistant->email }}</small>
                        </div>
                    </div>
                    <div class="assistant-fin">
                        <span class="badge encours">Assistant</span>
                        <form method="POST" action=""
                              onsubmit="return confirm('Supprimer l\'assistant « {{ $assistant->nom }} {{ $assistant->prenom }} » ? Cette action est définitive.');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn-mini btn-rouge" title="Supprimer">🗑️</button>
                        </form>
                    </div>
                </div>
            @endforeach
            @else
                <div class="assistant-vide">
                    <span>🧑‍💼</span>
                    <p>Aucun assistant pour le moment.<br>Ajoutez votre premier assistant avec le formulaire ci-dessus.</p>
                </div>
            @endif

        </div>
    </div>
    {{-- ==========================================================
         4. SÉCURITÉ
         ========================================================== --}}
    <div class="panneau panneau-parametres" style="margin-bottom:40px;">

        <h2><span class="param-titre-icone">🔒</span> <span>Sécurité</span></h2>

<form method="POST" action="{{ route('admin.parametre.reset_password') }}">
    @csrf
    <div class="form-grille">

        <div class="champ-admin">
            <label>Mot de passe actuel</label>
            <div class="champ-mdp">
                <input type="password" id="mdp-actuel" placeholder="••••••••" name="old_password">
                <button type="button" class="btn-oeil" onclick="basculerMdp('mdp-actuel', this)" title="Afficher / masquer">👁️</button>
            </div>
            @error('old_password')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="champ-admin">
            <label>Nouveau mot de passe</label>
            <div class="champ-mdp">
                <input type="password" id="mdp-nouveau" placeholder="Minimum 8 caractères" name="password">
                <button type="button" class="btn-oeil" onclick="basculerMdp('mdp-nouveau', this)" title="Afficher / masquer">👁️</button>
            </div>
            @error('password')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="champ-admin">
            <label>Confirmer le nouveau mot de passe</label>
            <div class="champ-mdp">
                <input type="password" id="mdp-confirmer" placeholder="Retapez le mot de passe" name="password_confirmation">
                <button type="button" class="btn-oeil" onclick="basculerMdp('mdp-confirmer', this)" title="Afficher / masquer">👁️</button>
            </div>
            @error('password_confirmation')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

    </div>
    <button type="submit" class="btn-valider">🔑 Changer le mot de passe</button>
</form>

        <div class="zone-danger">
            <div>
                <strong>Se déconnecter de tous les appareils</strong>
                <small>Déconnecte toutes les sessions ouvertes de ce compte</small>
            </div>
            <button type="button" class="btn-danger">Se déconnecter partout</button>
        </div>
    </div>

</div>
<script>
    // Afficher ou masquer le contenu d'un champ mot de passe
    function basculerMdp(id, bouton) {
        const champ = document.getElementById(id);
        if (champ.type === 'password') {
            champ.type = 'text';
            bouton.textContent = '🙈';   // texte visible
        } else {
            champ.type = 'password';
            bouton.textContent = '👁️';  // texte masqué
        }
    }

    // Afficher l'aperçu quand une photo est choisie
    function chargerPhotoBoutique(input, numero) {
        const fichier = input.files[0];
        if (!fichier) return;

        // Vérifier que c'est bien une image
        if (!fichier.type.startsWith('image/')) {
            alert('⚠️ Veuillez choisir une image (JPG, PNG, WEBP, JPEG).');
            supprimerPhotoBoutique(numero);
            return;
        }

        const lecteur = new FileReader();
        lecteur.onload = function(e) {
            const apercu = document.getElementById('apercu-boutique-' + numero);
            apercu.src = e.target.result;
            apercu.style.display = 'block';
            document.getElementById('vide-boutique-' + numero).style.display = 'none';
            document.getElementById('suppr-boutique-' + numero).style.display = 'flex';
        };
        lecteur.readAsDataURL(fichier);
    }

    // Retirer une photo (le slot redevient vide)
    function supprimerPhotoBoutique(numero) {
        document.getElementById('photo-boutique-' + numero).value = '';
        document.getElementById('apercu-boutique-' + numero).style.display = 'none';
        document.getElementById('vide-boutique-' + numero).style.display = 'flex';
        document.getElementById('suppr-boutique-' + numero).style.display = 'none';
    }
</script>

@endsection