@extends('layouts.app')

@section('title', 'Courtage travaux - Technic & Plans')
@section('description', "Découvrez notre service de courtage travaux : nous vous aidons à sélectionner les meilleurs artisans, obtenir les meilleurs devis et réaliser vos projets en toute sérénité.")

@section('content')
    <!-- Entête -->
    <div class="entete">
        <img src="{{ asset('asset/img/entete-courtage-travaux.jpg') }}" alt="Un projet maîtrisé c'est du temps de gagné">
    </div>

    <!-- Courtage travaux -->
    <div class="courtage">
        <div class="content content-courtage">
            <h1 class="courtage-title"><span>LE</span> COURTAGE<br>TRAVAUX</h1>
            
            <div class="courtage-text">
                <p>
                    Pour vos simplifier et organiser le bon déroulement de votre projet, 
                    nous avons mis en place un service de courtage de travaux. 
                    Nous recherchons ainsi pour vous les meilleurs entrepreneurs et les meilleurs tarifs, 
                    afin de vous offrir la meilleure prestation possible.
                </p>
            </div>

            <div class="courtage-text-alt">
                LE COURTAGE TRAVAUX,<br>COMMENT ÇA FONCTIONNE ?
            </div>

            <div class="courtage-container">
                <div class="courtage-container-item">
                    <img src="{{ asset('asset/img/icon-1.png') }}" alt="PREMIÈRE PHASE">
                    <div class="courtage-container-item-title">PREMIÈRE PHASE</div>
                    <p>Recueil d’informations concernant votre projet, discussion autour de vos souhaits et besoins</p>
                </div>

                <div class="courtage-container-item">
                    <img src="{{ asset('asset/img/icon-2.png') }}" alt="QUATRIÈME PHASE">
                    <div class="courtage-container-item-title">QUATRIÈME PHASE</div>
                    <p>Réception des différents comptes-rendus des devis proposés par les entreprises partenaires.</p>
                </div>

                <div class="courtage-container-item">
                    <img src="{{ asset('asset/img/icon-3.png') }}" alt="DEUXIÈME PHASE">
                    <div class="courtage-container-item-title">DEUXIÈME PHASE</div>
                    <p>Élaboration de la fiche technique des travaux à effectuer selon un descriptif détaillé lors de la première phase.</p>
                </div>

                <div class="courtage-container-item">
                    <img src="{{ asset('asset/img/icon-4.png') }}" alt="CINQUIÈME PHASE">
                    <div class="courtage-container-item-title">CINQUIÈME PHASE</div>
                    <p>Analyse des différents devis proposés par les entreprises partenaires.</p>
                </div>

                <div class="courtage-container-item">
                    <img src="{{ asset('asset/img/icon-5.png') }}" alt="TROISIÈME PHASE">
                    <div class="courtage-container-item-title">TROISIÈME PHASE</div>
                    <p>Consultation d’entreprises partenaires régionales (avis technique, devis ...)</p>
                </div>

                <div class="courtage-container-item">
                    <img src="{{ asset('asset/img/icon-6.png') }}" alt="SIXIÈME PHASE">
                    <div class="courtage-container-item-title">SIXIÈME PHASE</div>
                    <p>Mise en relation avec l’entreprise partenaire que vous avez sélectionnée pour la réalisation de vos travaux.</p>
                </div>

                <div class="clear"></div>
            </div>

            <a href="{{ route('contact') }}" class="courtage-btn">NOUS CONTACTER</a>
        </div>
    </div>

    <!-- Bloc final -->
    <div class="three-block three-block-2">
        <div class="three-block-content three-block-content-alt">
            <div class="three-block-item">
                <img src="{{ asset('asset/img/three-block-item-1.jpg') }}" alt="Réalisation de plans">
                <p>RÉALISATION DE <span>PLANS</span></p>
            </div>
            <div class="three-block-item">
                <img src="{{ asset('asset/img/three-block-item-2.jpg') }}" alt="Rendu 3 dimensions">
                <p>RENDU <span>3 DIMENSIONS</span></p>
            </div>
            <div class="three-block-item">
                <img src="{{ asset('asset/img/three-block-item-3.jpg') }}" alt="Courtage travaux">
                <p>COURTAGE <span>TRAVAUX</span></p>
            </div>
            <div class="clear"></div>
        </div>
    </div>
@endsection
