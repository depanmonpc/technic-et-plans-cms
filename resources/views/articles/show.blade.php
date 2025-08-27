@extends('layouts.app')

@php
    use Illuminate\Support\Str;
    $plain = Str::of(strip_tags($article->content))->toString();
    $readingMinutes = max(1, (int) ceil(str_word_count($plain) / 200)); // ~200 wpm
@endphp

@section('title', $article->title)
@section('meta_description', Str::limit($plain, 150))

@section('content')
@vite('resources/css/article-wow.css')

<div class="aw-progress" id="awProgress"></div>

<article class="aw-article">
    {{-- HERO --}}
    <section class="aw-hero"
        @if($article->featured_image_url)
            style="--hero:url('{{ $article->featured_image_url }}')"
        @endif
    >
        <div class="aw-hero__overlay"></div>
        <div class="aw-hero__content aw-container">
            <p class="aw-breadcrumb">
                <a href="{{ route('home') }}">Accueil</a> <span>›</span>
                <a href="{{ route('articles.index') }}">Articles</a> <span>›</span>
                <span>{{ $article->title }}</span>
            </p>
            <h1 class="aw-title">{{ $article->title }}</h1>
            <p class="aw-meta">
                Publié le {{ optional($article->published_at)->translatedFormat('d F Y') }}
                <span aria-hidden="true">•</span> {{ $readingMinutes }} min de lecture
            </p>
        </div>
    </section>

    {{-- CONTENU --}}
    <div class="aw-container aw-layout">
        <div class="aw-content prose" id="awContent">
            {!! $article->content_html !!}
        </div>

        <aside class="aw-aside">
            <div class="aw-card">
                <div class="aw-card__title">Partager</div>
                @php $url = url()->current(); @endphp
                <a class="aw-share" target="_blank" rel="noopener"
                   href="https://www.linkedin.com/sharing/share-offsite/?url={{ urlencode($url) }}">LinkedIn</a>
                <a class="aw-share" target="_blank" rel="noopener"
                   href="https://twitter.com/intent/tweet?url={{ urlencode($url) }}&text={{ urlencode($article->title) }}">X</a>
                <a class="aw-share" target="_blank" rel="noopener"
                   href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode($url) }}">Facebook</a>
                <button class="aw-share" type="button"
                        onclick="navigator.clipboard.writeText('{{ $url }}')">Copier le lien</button>
            </div>
        </aside>
    </div>

    {{-- NAVIGATION --}}
    <section class="aw-container aw-nextprev">
        @php($prev = $article->previous())
        @if($prev)
            <a class="aw-nextprev__card" href="{{ route('articles.show', $prev->slug) }}">
                <small>Article précédent</small>
                <span>{{ $prev->title }}</span>
            </a>
        @endif

        @php($next = $article->next())
        @if($next)
            <a class="aw-nextprev__card aw-next" href="{{ route('articles.show', $next->slug) }}">
                <small>Article suivant</small>
                <span>{{ $next->title }}</span>
            </a>
        @endif
    </section>

    <footer class="aw-container aw-back">
        <a href="{{ route('articles.index') }}">← Retour aux articles</a>
    </footer>
</article>

{{-- JS mini: barre de progression --}}
<script>
document.addEventListener('DOMContentLoaded', () => {
  const progress = document.getElementById('awProgress');
  const onScroll = () => {
    const total = document.documentElement.scrollHeight - window.innerHeight;
    const p = Math.min(100, Math.max(0, (window.scrollY / total) * 100));
    progress.style.setProperty('--p', p + '%');
  };
  onScroll();
  document.addEventListener('scroll', onScroll, { passive: true });
});
</script>
@endsection
