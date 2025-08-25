<div>
    {{-- Header global --}}
    @include('partials.header')

    {{-- Meta SEO --}}
    <h1 style="position:absolute;left:-9999px;top:auto;width:1px;height:1px;overflow:hidden;">
        Plans techniques, architecturaux et permis de construire – Technic & Plans, experts en conception sur mesure
    </h1>

    {{-- Slider --}}
    @include('partials.home.slider')

    {{-- Bloc 3 colonnes --}}
    @include('partials.home.three-block')

    {{-- Bloc présentation --}}
    @include('partials.home.index-one')

    {{-- Bloc démarches administratives --}}
    @include('partials.home.index-two')

    {{-- Bloc avantages --}}
    @include('partials.home.index-three')

    {{-- Bloc réalisations --}}
    @include('partials.home.index-four')

    {{-- Bloc des 3 derniers articles dynamiques --}}
    @if (isset($articles) && $articles->count() > 0)
        @include('partials.latest-articles', ['articles' => $articles])
    @endif

    {{-- Footer global --}}
    @include('partials.footer')
</div>

