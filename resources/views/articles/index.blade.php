@extends('layouts.app')

@section('content')
<div class="content" style="max-width: 900px; margin: 0 auto; padding: 40px 20px;">
    <h1 class="text-3xl font-bold mb-8">Nos articles</h1>

    @if ($articles->count())
        <div class="articles-list">
            @foreach ($articles as $article)
                <article class="mb-10 border-b border-gray-300 pb-6">
                    <h2 class="text-2xl font-semibold text-gray-800 mb-2">
                        <a href="{{ route('articles.show', $article->slug) }}" class="hover:text-blue-600">
                            {{ $article->title }}
                        </a>
                    </h2>

                    <p class="text-gray-500 text-sm mb-3">
                        Publié le {{ $article->published_at->translatedFormat('d F Y') }}
                    </p>

                    @if ($article->excerpt)
                        <p class="text-gray-700 mb-4">
                            {{ $article->excerpt }}
                        </p>
                    @endif

                    <a href="{{ route('articles.show', $article->slug) }}" 
                       class="text-blue-600 font-medium hover:underline">
                        Lire la suite →
                    </a>
                </article>
            @endforeach
        </div>

        <div class="mt-8">
            {{ $articles->links() }}
        </div>
    @else
        <p>Aucun article disponible pour le moment.</p>
    @endif
</div>
@endsection
