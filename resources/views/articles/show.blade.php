@extends('layouts.app')

@section('content')
<div class="content" style="max-width: 900px; margin: 0 auto; padding: 40px 20px;">
    <article>
        <h1 class="text-3xl font-bold mb-4">{{ $article->title }}</h1>

        <p class="text-gray-500 text-sm mb-6">
            Publié le {{ $article->published_at->translatedFormat('d F Y') }}
        </p>

        @if ($article->featured_image)
            <img src="{{ $article->featured_image }}" 
                 alt="{{ $article->title }}"
                 class="rounded-lg shadow-md mb-6 w-full">
        @endif

        <div class="prose max-w-none text-gray-800 leading-relaxed">
            {!! nl2br(e($article->content)) !!}
        </div>
    </article>

    <div class="mt-10">
        <a href="{{ route('articles.index') }}" class="text-blue-600 hover:underline">
            ← Retour aux articles
        </a>
    </div>
</div>
@endsection
