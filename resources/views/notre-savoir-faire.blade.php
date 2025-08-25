@extends('layouts.app')

@section('title', 'Notre savoir-faire')

@section('content')
    @php
        // Récup paramètre p pour surligner le lien actif
        $p = request('p');
        // Helpers de liens : si tu as une route nommée 'notre-savoir-faire'
        $nsf = fn ($val) => route('notre-savoir-faire', ['p' => $val]);
        // Sinon commente la ligne au-dessus et décommente ci-dessous :
        // $nsf = fn ($val) => url('notre-savoir-faire') . '?p=' . $val;
    @endphp

    <div class="index-four">
        <div class="content">
            <h1 class="index-four-title"><span>NOTRE</span> SAVOIR FAIRE</h1>

            <div class="index-four-links">
                <a href="{{ $nsf('etude') }}"
                   class="index-four-link {{ $p==='etude' ? 'is-active' : '' }}"
                   id="index-four-link-1">ÉTUDE D’AVANT PROJET</a>

                <a href="{{ $nsf('permis') }}"
                   class="index-four-link {{ $p==='permis' ? 'is-active' : '' }}"
                   id="index-four-link-2">PERMIS DE CONSTRUIRE</a>

                <a href="{{ $nsf('projet') }}"
                   class="index-four-link {{ $p==='projet' ? 'is-active' : '' }}"
                   id="index-four-link-3">PROJET D’EXTENSION OU D’AMÉNAGEMENT</a>

                <a href="{{ $nsf('perspective') }}"
                   class="index-four-link {{ $p==='perspective' ? 'is-active' : '' }}"
                   id="index-four-link-4">PERSPECTIVE & VUE INTÉRIEURE</a>
            </div>

            <div class="index-four-thumbs">
                <div class="index-four-thumb">
                    <img src="{{ asset('asset/img/thumb-1.jpg') }}" alt=""><span></span>
                </div>
                <div class="index-four-thumb">
                    <img src="{{ asset('asset/img/thumb-2.jpg') }}" alt=""><span></span>
                </div>
                <div class="index-four-thumb">
                    <img src="{{ asset('asset/img/thumb-3.jpg') }}" alt=""><span></span>
                </div>
                <div class="clear"></div>
            </div>
        </div>
    </div>

    <div class="competences" id="competences-1">
        <div class="content">
            <div class="competences-title">ÉTUDE D’AVANT PROJET</div>
            <div class="competences-subtitle">CE QUE NOUS VOUS PROPOSONS : </div>

            <div class="competences-text">
                <p>Nous avons la tâche de regrouper avec vous <strong>l’ensemble des informations administratives nécessaires au montage du dossier</strong>, et qui concernent l’ensemble des points sur lesquels nous allons dévelloper le projet en question, à savoir : Le plan de situation, le réglement PLU...</p>
                <p>Afin de bien visualiser votre projet, nous discuterons ensemble, pour obtenir un maximum d’informations sur vos souhaits, sur <strong>le type de construction que vous désirez</strong> (contemporaine, traditionnelle), ainsi que le <strong>choix des matériaux, des surfaces</strong>, pour que ce projet soit avant tout le votre, et <strong>qu’il vous corresponde</strong>.</p>
                <p>Suite a cet entretien et aux informations obtenues, nous réalisons cet avant projet, selon vos attentes et notre créativité, le tout dans le respect des régles administratives et techniques en vigueur.</p>
                <p>Soucieux de vous offrir la meilleure prestation possible, la mise en place de l’étude vous est proposée dans un délai maximum de 7 jours ouvrés.</p>
                <p class="alt">Après votre accord, mise en place du dossier de permis de construire en nombre d’exemplaires nécessaires aux services administratifs.</p>
            </div>

            <a href="{{ route('contact') }}"
               class="competences-btn competences-btn-1">CONTACTEZ TECHNIC ET PLANS</a>

            <div class="competences-text-vertical">EXEMPLES DE RÉALISATIONS</div>

            <a href="{{ asset('asset/img/exemple-big-9.jpg') }}" class="manific-image">
                <img src="{{ asset('asset/img/exemple-9.jpg') }}" alt="" class="competences-img competences-img-1">
            </a>
            <a href="{{ asset('asset/img/exemple-big-10.jpg') }}" class="manific-image">
                <img src="{{ asset('asset/img/exemple-10.jpg') }}" alt="" class="competences-img competences-img-2">
            </a>
            <a href="{{ asset('asset/img/exemple-big-11.jpg') }}" class="manific-image">
                <img src="{{ asset('asset/img/exemple-11.jpg') }}" alt="" class="competences-img competences-img-3">
            </a>
            <a href="{{ asset('asset/img/exemple-big-12.jpg') }}" class="manific-image">
                <img src="{{ asset('asset/img/exemple-12.jpg') }}" alt="" class="competences-img competences-img-4">
            </a>

            <img src="{{ asset('asset/img/show-image.jpg') }}" alt="Cliquez pour agrandir la photo" class="competences-extend">
        </div>
    </div>

    <div class="competences" id="competences-2" style="height:1200px;">
        <div class="demarches">
            <div class="content">
                <h1 class="demarches-title"><span>LES DÉMARCHES</span><br>ADMINISTRATIVES</h1>
                <div class="demarches-text">
                    <p>Pour vos démarches administratives, nous vous aidons à mettre en conformité vos projets vis-à-vis des autorités locales, administratives et législatives. Ainsi, nous sommes à même d'élaborer votre projet et de constituer votre dossier complet de demande de permis de construire et/ou déclaration préalable que vous soyez particuliers ou professionnels.</p>
                </div>
                <img src="{{ asset('asset/img/etapes.jpg') }}" alt="Mise en conformité de votre projet..." class="demarches-image">

                <div class="grid-diapo">
                    @for ($i = 1; $i <= 8; $i++)
                        <a href="{{ asset("asset/img/0$i.jpg") }}" class="manific-image">
                            <img src="{{ asset("asset/img/0$i.jpg") }}" alt="">
                        </a>
                    @endfor
                    <div class="clear"></div>
                </div>
            </div>
        </div>

        <div class="demarches-two">
            <div class="content">
                <div class="demarches-two-title"><span>ÉTUDE PERMIS</span><br>DE CONSTRUIRE</div>
                <div class="demarches-two-text">CE QUE NOUS VOUS PROPOSONS :</div>

                <div class="demarches-two-list">
                    <div class="demarches-two-list-item">
                        <div class="demarches-two-list-item-num">1.</div>
                        <div class="demarches-two-list-item-content">Recueil des informations administratives nécessaires au montage du dossier (plan de situation, réglement PLU...)</div>
                    </div>
                    <div class="demarches-two-list-item">
                        <div class="demarches-two-list-item-num">4.</div>
                        <div class="demarches-two-list-item-content"><strong>DÉLAI MAXIMAL DE 7 JOURS OUVRÉS</strong> pour la réalisation de l'étude</div>
                    </div>
                    <div class="demarches-two-list-item">
                        <div class="demarches-two-list-item-num">2.</div>
                        <div class="demarches-two-list-item-content">Recueil de vos souhaits, type de construction (contemporaire, traditionnelle...) choix des matériaux, surfaces, esquisse...</div>
                    </div>
                    <div class="demarches-two-list-item">
                        <div class="demarches-two-list-item-num">5.</div>
                        <div class="demarches-two-list-item-content">Après votre accord, <strong>mise en place du dossier de permis de construire</strong> en nombres d'exemplaires nécessaires aux services administratifs.</div>
                    </div>
                    <div class="demarches-two-list-item">
                        <div class="demarches-two-list-item-num">3.</div>
                        <div class="demarches-two-list-item-content">Mise en place de votre avant-projet selon vos attentes, notre créativité, respect des régles administratives et techniques en vigueur.</div>
                    </div>
                    <div class="clear"></div>
                </div>

                <a href="{{ route('contact') }}" class="demarches-two-btn">CONTACTER TECHNIC & PLANS</a>
                <img src="{{ asset('asset/img/home.png') }}" alt="Maison" class="demarches-two-image">
            </div>
        </div>
    </div>

    <div class="competences" id="competences-3">
        <div class="content">
            <div class="competences-title">PROJET D’EXTENSION<br>OU D’AMÉNAGEMENT</div>
            <div class="competences-text">
                <p>Recueil des informations administratives nécessaires au montage du dossier (plan de situtation, POS, PLU ...)</p>
                <p>Relevé de l’état existant du bâtiment et de ses abords, repérage photographique des lieux ainsi qu’un relevé des points de niveaux du terrain.</p>
                <p>Mise en place d’ébauches de votre futur projet.</p>
                <p>Après votre accord, mise en place du dossier de permis de construire et/ou déclaration préalable en nombre d’exemplaires nécessaires aux services administratifs.</p>
            </div>

            <a href="{{ route('contact') }}" class="competences-btn competences-btn-3">CONTACTEZ TECHNIC ET PLANS</a>

            <div class="competences-text-vertical">EXEMPLES DE RÉALISATIONS</div>

            <a href="{{ asset('asset/img/exemple-big-5.jpg') }}" class="manific-image">
                <img src="{{ asset('asset/img/exemple-5.jpg') }}" alt="" class="competences-img competences-img-1">
            </a>
            <a href="{{ asset('asset/img/exemple-big-6.jpg') }}" class="manific-image">
                <img src="{{ asset('asset/img/exemple-6.jpg') }}" alt="" class="competences-img competences-img-2">
            </a>
            <a href="{{ asset('asset/img/exemple-big-7.jpg') }}" class="manific-image">
                <img src="{{ asset('asset/img/exemple-7.jpg') }}" alt="" class="competences-img competences-img-3">
            </a>
            <a href="{{ asset('asset/img/exemple-big-8.jpg') }}" class="manific-image">
                <img src="{{ asset('asset/img/exemple-8.jpg') }}" alt="" class="competences-img competences-img-4">
            </a>

            <img src="{{ asset('asset/img/show-image.jpg') }}" alt="Cliquez pour agrandir la photo" class="competences-extend">
        </div>
    </div>

    <div class="competences" id="competences-4">
        <div class="content">
            <div class="competences-title">PERSPECTIVE<br>& VUE INTÉRIEURE</div>
            <div class="competences-text">
                <p>Que ce soit pour un projet  de construction, d’extension et/ou d’aménagement d’un bâtiment existant nous pouvons vos proposer un apercu des perspectives et des vues 3D de l’intérieur.</p>
            </div>

            <a href="{{ route('contact') }}" class="competences-btn competences-btn-4">CONTACTEZ TECHNIC ET PLANS</a>

            <div class="competences-text-vertical">EXEMPLES DE RÉALISATIONS</div>

            <a href="{{ asset('asset/img/exemple-big-1.jpg') }}" class="manific-image">
                <img src="{{ asset('asset/img/exemple-1.jpg') }}" alt="" class="competences-img competences-img-1">
            </a>
            <a href="{{ asset('asset/img/exemple-big-2.jpg') }}" class="manific-image">
                <img src="{{ asset('asset/img/exemple-2.jpg') }}" alt="" class="competences-img competences-img-2">
            </a>
            <a href="{{ asset('asset/img/exemple-big-3.jpg') }}" class="manific-image">
                <img src="{{ asset('asset/img/exemple-3.jpg') }}" alt="" class="competences-img competences-img-3">
            </a>
            <a href="{{ asset('asset/img/exemple-big-4.jpg') }}" class="manific-image">
                <img src="{{ asset('asset/img/exemple-4.jpg') }}" alt="" class="competences-img competences-img-4">
            </a>

            <img src="{{ asset('asset/img/show-image.jpg') }}" alt="Cliquez pour agrandir la photo" class="competences-extend">
        </div>
    </div>

    <div class="demarches-three" id="demarches-three">
        <div class="content">
            <div class="demarches-three-title"><span>LES PARTENAIRES<br>DE</span> TECHNIC & PLANS</div>
            <div class="demarches-three-text">
                <p>Nous avons établi plusieurs partenariats avec diffèrents corps de métiers :</p>
                <p>Cabinet d'architecture permettant de traiter tous types de dossiers dont la surface est > 170m² de surface plancher et/ou emprise au sol (pavillon individuel, ERP, SCI...)</p>
                <p>Bureau d'étude thermique afin de fournir une étude personnalisée au dépôt du permis de construire de l'étude de faisabilité d'approvisionnement en énergies et de la prise en compte de la réglementation thermique RT2012 (décret du 18/05/11)</p>
            </div>
            <img src="{{ asset('asset/img/cabinet-et-bureau.jpg') }}" alt="Cabinet d'architecture et Bureau d'étude thermique" class="demarches-three-image">
        </div>
    </div>

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
