@extends('Client.navbar')

@section('title', "Contact - SavTech")

@section('content_client')
<style>
    .btn-valider .emo {
        display: inline-block;
        transition: transform 0.3s
    }

    .btn-valider{
       padding : 10px;
       border-radius : 5px;
       border :  1px;
       box-shadow : 0 0 5px 0px;
       font-weight : bolder;
       background-color : #1a6fb5;
       color : white;
    }

    .btn-valider:hover{
        background-color : #e8492a;
        transform : translateY(-2px);
        cursor : pointer;
    }
    .btn-valider:hover .emo {
        transform: translateX(6px);   /* l'enveloppe part vers la droite */
    }
</style>
    <div class="banniere">
        <h1>Contactez-<span>nous</span></h1>
        <p>Nous répondons à toutes vos questions</p>
    </div>

    <section id="catalogue">
        <div class="container" style="padding-top:50px;">

            @if(session('success'))
                <div class="alert-success">✅ {{ session('success') }}</div>
            @endif

            <div class="contact-page">

                {{-- ===== COORDONNÉES ===== --}}
                <div>
                    <div class="info-carte">
                        <div class="rond">📞</div>
                        <div>
                            <h4>Téléphone / WhatsApp</h4>
                            <p>+225 XX XX XX XX XX<br>+225 XX XX XX XX XX</p>
                        </div>
                    </div>

                    <div class="info-carte">
                        <div class="rond">✉️</div>
                        <div>
                            <h4>Email</h4>
                            <p>savtech@gmail.com</p>
                        </div>
                    </div>

                    <div class="info-carte">
                        <div class="rond">📍</div>
                        <div>
                            <h4>Adresse</h4>
                            <p>Votre adresse ici, Abidjan</p>
                        </div>
                    </div>

                    <div class="info-carte">
                        <div class="rond">🕒</div>
                        <div>
                            <h4>Horaires d'ouverture</h4>
                            <p>Lundi — Samedi : 08h00 à 18h00<br>Dimanche : fermé</p>
                        </div>
                    </div>
                </div>

                {{-- ===== FORMULAIRE ===== --}}
                <div class="formulaire-contact">
                    <h3 style="color: var(--bleu); margin-bottom: 20px;">Envoyez-nous un message 📩</h3>

                    <form method="POST" action="">
                        @csrf

                        <div class="groupe">
                            <label for="nom">Votre nom complet *</label>
                            <input type="text" id="nom" name="nom" placeholder="Ex : Kouassi Jean"
                                   value="{{ old('nom') }}" required>
                            @error('nom')
                                <span class="texte-erreur">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="groupe">
                            <label for="telephone">Téléphone ou email *</label>
                            <input type="text" id="telephone" name="telephone" placeholder="Pour vous répondre"
                                   value="{{ old('telephone') }}" required>
                            @error('telephone')
                                <span class="texte-erreur">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="groupe">
                            <label for="sujet">Sujet *</label>
                            <select id="sujet" name="sujet" required>
                                <option value="" disabled selected>— Choisissez un sujet —</option>
                                <option value="achat" {{ old('sujet') == 'achat' ? 'selected' : '' }}>Achat d'un ordinateur</option>
                                <option value="reparation" {{ old('sujet') == 'reparation' ? 'selected' : '' }}>Réparation / dépannage</option>
                                <option value="logiciel" {{ old('sujet') == 'logiciel' ? 'selected' : '' }}>Installation de logiciels</option>
                                <option value="donnees" {{ old('sujet') == 'donnees' ? 'selected' : '' }}>Récupération de données</option>
                                <option value="autre" {{ old('sujet') == 'autre' ? 'selected' : '' }}>Autre demande</option>
                            </select>
                            @error('sujet')
                                <span class="texte-erreur">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="groupe">
                            <label for="message">Votre message *</label>
                            <textarea id="message" name="message"
                                      placeholder="Décrivez votre besoin : modèle souhaité, panne constatée, question..."
                                      required>{{ old('message') }}</textarea>
                            @error('message')
                                <span class="texte-erreur">{{ $message }}</span>
                            @enderror
                        </div>

                        <button type="submit" class="btn-valider">📨 Envoyer mon message</button>
                    </form>
                </div>

            </div>
        </div>
    </section>

@endsection