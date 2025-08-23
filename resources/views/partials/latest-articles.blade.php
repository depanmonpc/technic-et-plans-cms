@if ($articles->count())
<div class="latest-articles" style="max-width: 900px; margin: 60px auto; padding: 0 20px;">
    <h2 class="text-2xl font-bold mb-6">Derniers articles</h2>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        @foreach ($articles as $article)
            <div class="border rounded-lg shadow hover:shadow-lg transition bg-white">
                @if ($article->featured_image)
                    <a href="{{ route('articles.show', $article->slug) }}">
                        <img src="{{ $article->featured_image }}"
                             alt="{{ $article->title }}"
                             class="rounded-t-lg w-full h-48 object-cover">
                    </a>
                @endif

                <div class="p-4">
                    <h3 class="text-lg font-semibold mb-2">
                        <a href="{{ route('articles.show', $article->slug) }}"
                           class="hover:text-blue-600">
                            {{ Str::limit($article->title, 60) }}
                        </a>
                    </h3>
                    <p class="text-sm text-gray-600 mb-3">
                        {{ $article->published_at->translatedFormat('d M Y') }}
                    </p>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endif
