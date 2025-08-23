<div>
    {{-- Inclusion du header --}}
    @include('partials.header')

    {{-- Modules dynamiques --}}
    @foreach ($contents as $content)
        {!! $content['content'] !!}
    @endforeach

    {{-- Bloc des 3 derniers articles --}}
    @if (!empty($articles) && $articles->count() > 0)
        @include('partials.latest-articles', ['articles' => $articles])
    @endif

    {{-- Footer --}}
    @include('partials.footer')
</div>
