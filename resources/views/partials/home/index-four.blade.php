<div class="index-four">
    <div class="content">
        {{-- Titre principal --}}
        <div class="index-four-title">
            RÉALISATIONS
        </div>

        {{-- Liens internes vers les réalisations --}}
        <div class="index-four-links">
            <a href="{{ url('notre-savoir-faire?p=etude') }}" class="index-four-link">
                ÉTUDE D’AVANT PROJET
            </a>
            <a href="{{ url('notre-savoir-faire?p=permis') }}" class="index-four-link">
                PERMIS DE CONSTRUIRE
            </a>
            <a href="{{ url('notre-savoir-faire?p=projet') }}" class="index-four-link">
                PROJET D’EXTENSION OU D’AMÉNAGEMENT
            </a>
            <a href="{{ url('notre-savoir-faire?p=perspective') }}" class="index-four-link">
                PERSPECTIVE & VUE INTÉRIEURE
            </a>
        </div>

        {{-- Miniatures des réalisations --}}
        <div class="index-four-thumbs">
            <div class="index-four-thumb">
                <img src="{{ asset('asset/img/thumb-1.jpg') }}" alt="Exemple d'étude d'avant-projet réalisée par Technic & Plans" title="Exemple d'étude d'avant-projet">
                <span></span>
            </div>
            <div class="index-four-thumb">
                <img src="{{ asset('asset/img/thumb-2.jpg') }}" alt="Exemple de permis de construire préparé par Technic & Plans" title="Exemple de permis de construire">
                <span></span>
            </div>
            <div class="index-four-thumb">
                <img src="{{ asset('asset/img/thumb-3.jpg') }}" alt="Projet d'extension et d'aménagement conçu par Technic & Plans" title="Projet d'extension et d'aménagement">
                <span></span>
            </div>
            <div class="clear"></div>
        </div>

        {{-- Lien vers la page globale des savoir-faire --}}
        <a href="{{ url('notre-savoir-faire') }}" class="index-four-btn">
            NOTRE SAVOIR-FAIRE
        </a>
    </div>
</div>
