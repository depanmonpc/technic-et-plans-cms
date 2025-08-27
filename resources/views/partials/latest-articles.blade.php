@if ($articles->count())
@php
    $featured = $articles->first();
    $rest = $articles->slice(1, 2); // affiche 2 suivants
@endphp

<section class="wa">
    <div class="wa__head">
        <h2>Derniers articles</h2>
        @if (Route::has('articles.index'))
            <a class="wa__cta" href="{{ route('articles.index') }}">Voir tous les articles</a>
        @endif
    </div>

    <div class="wa__grid">
        {{-- HERO FEATURED --}}
        <article class="wa__card wa__card--hero">
            <a class="wa__link" href="{{ route('articles.show', $featured->slug) }}">
                <figure class="wa__media">
                    @if ($featured->thumbnail)
                        <img src="{{ Storage::disk('public')->url($featured->thumbnail) }}"
                             alt="{{ $featured->title }}" loading="lazy">
                    @else
                        <div class="wa__ph" aria-hidden="true">T&amp;P</div>
                    @endif
                    <div class="wa__overlay"></div>
                    <figcaption class="wa__date">
                        <span>{{ optional($featured->published_at)->translatedFormat('d') }}</span>
                        <small>{{ optional($featured->published_at)->translatedFormat('M Y') }}</small>
                    </figcaption>
                    @if(optional($featured->published_at)->gt(now()->subDays(7)))
                        <div class="wa__ribbon">Nouveau</div>
                    @endif
                </figure>

                <div class="wa__content">
                    <h3 class="wa__title wa__title--hero">
                        {{ \Illuminate\Support\Str::limit($featured->title, 110) }}
                    </h3>
                    @php
                        $fx = $featured->excerpt ?? \Illuminate\Support\Str::limit(strip_tags($featured->content ?? ''), 220);
                    @endphp
                    @if($fx)
                        <p class="wa__excerpt wa__excerpt--hero">
                            {{ \Illuminate\Support\Str::limit(strip_tags($fx), 180) }}
                        </p>
                    @endif
                    <span class="wa__more">Lire l’article →</span>
                </div>
            </a>
        </article>

        {{-- TWO SECONDARY CARDS --}}
        @foreach ($rest as $article)
        <article class="wa__card wa__card--small">
            <a class="wa__link" href="{{ route('articles.show', $article->slug) }}">
                <figure class="wa__media">
                    @if ($article->thumbnail)
                        <img src="{{ Storage::disk('public')->url($article->thumbnail) }}"
                             alt="{{ $article->title }}" loading="lazy">
                    @else
                        <div class="wa__ph" aria-hidden="true">T&amp;P</div>
                    @endif
                    <div class="wa__overlay"></div>
                    <figcaption class="wa__date">
                        <span>{{ optional($article->published_at)->translatedFormat('d') }}</span>
                        <small>{{ optional($article->published_at)->translatedFormat('M Y') }}</small>
                    </figcaption>
                    @if(optional($article->published_at)->gt(now()->subDays(7)))
                        <div class="wa__ribbon">Nouveau</div>
                    @endif
                </figure>

                <div class="wa__content">
                    <h3 class="wa__title">{{ \Illuminate\Support\Str::limit($article->title, 85) }}</h3>
                    @php
                        $ex = $article->excerpt ?? \Illuminate\Support\Str::limit(strip_tags($article->content ?? ''), 160);
                    @endphp
                    @if($ex)
                        <p class="wa__excerpt">{{ \Illuminate\Support\Str::limit(strip_tags($ex), 110) }}</p>
                    @endif
                    <span class="wa__more">Lire →</span>
                </div>
            </a>
        </article>
        @endforeach
    </div>
</section>
@endif

<style>
/* ===== WOW Articles (scopé) ===== */
.wa{
  --wa-max:1200px;--wa-gap:22px;
  --wa-primary:#f3a216;--wa-dark:#2f2c2a;--wa-ink:#1a1a1a;--wa-muted:#6b6b6b;
  --wa-br:18px;
  position:relative;isolation:isolate;margin:72px auto;max-width:var(--wa-max);padding:0 22px 10px;
}
.wa::before{
  content:"";position:absolute;inset:-40px 0 auto 0;height:220px;z-index:-1;
  background:
    linear-gradient(135deg, rgba(243,162,22,.12), rgba(243,162,22,0) 60%),
    repeating-linear-gradient(135deg,#eae8e6 0 12px,#e4e2e0 12px 24px);
  mask: linear-gradient(to bottom,#000 65%,transparent 100%);
  border-radius:0 0 40px 40px;
}
.wa__head{display:flex;align-items:center;justify-content:space-between;margin:0 0 16px}
.wa__head h2{margin:0;color:var(--wa-dark);font-size:clamp(1.35rem,2.5vw,1.8rem);font-weight:800;letter-spacing:.2px}
.wa__cta{
  border:1px solid var(--wa-dark);border-radius:999px;padding:.6rem .95rem;font-size:.95rem;
  text-decoration:none;color:var(--wa-dark);transition:.25s;background:#fff
}
.wa__cta:hover{background:var(--wa-dark);color:#fff;transform:translateY(-1px)}

.wa__grid{display:grid;gap:var(--wa-gap);grid-template-columns:1fr}
@media (min-width:860px){.wa__grid{grid-template-columns:2fr 1fr}}
@media (min-width:1120px){.wa__grid{grid-template-columns:2.2fr 1fr}}

.wa__card{
  background:#fff;border:1px solid #eceae8;border-radius:var(--wa-br);overflow:hidden;
  box-shadow:0 10px 30px rgba(0,0,0,.06);
  transform:translateZ(0);transition:box-shadow .25s ease, transform .25s ease;
}
.wa__card:hover{box-shadow:0 24px 60px rgba(0,0,0,.14);transform:translateY(-4px)}
.wa__card--hero{grid-column:1/-1}
@media (min-width:860px){.wa__card--hero{grid-column:1/2}}
.wa__card--small{display:flex;flex-direction:column}

.wa__link{display:block;color:inherit;text-decoration:none;height:100%}

.wa__media{position:relative;aspect-ratio:16/9;overflow:hidden}
.wa__media img{width:100%;height:100%;object-fit:cover;transition:transform .6s ease}
.wa__card:hover .wa__media img{transform:scale(1.05)}
.wa__ph{width:100%;height:100%;display:flex;align-items:center;justify-content:center;
  font-weight:800;font-size:2.4rem;color:#bfbfbf;
  background:repeating-linear-gradient(45deg,#f5f5f5 0 14px,#efefef 14px 28px)
}
.wa__overlay{position:absolute;inset:0;
  background:linear-gradient(to top, rgba(0,0,0,.45) 0%, rgba(0,0,0,0) 55%);
  opacity:.85;mix-blend:multiply;pointer-events:none
}
.wa__date{
  position:absolute;left:14px;bottom:14px;background:rgba(47,44,42,.95);color:#fff;
  border-radius:12px;padding:.42rem .6rem;line-height:1;text-align:center;
  box-shadow:0 6px 18px rgba(0,0,0,.25)
}
.wa__date span{display:block;font:700 1.05rem/1 var(--font,inherit)}
.wa__date small{display:block;font-size:.72rem;opacity:.9;letter-spacing:.02em}

.wa__ribbon{
  position:absolute;top:12px;left:-8px;background:linear-gradient(135deg,var(--wa-primary),#ffc45a);
  color:#2f2c2a;font-weight:800;font-size:.78rem;padding:.35rem .65rem;border-radius:8px;
  box-shadow:0 6px 16px rgba(243,162,22,.35)
}

.wa__content{padding:16px 18px 20px}
.wa__title{margin:0 0 .35rem;font-weight:800;font-size:1.05rem;line-height:1.3;color:var(--wa-ink)}
.wa__title--hero{font-size:clamp(1.2rem,2.4vw,1.6rem)}
.wa__excerpt{margin:0;color:var(--wa-muted);font-size:.96rem;line-height:1.5;
  display:-webkit-box;-webkit-box-orient:vertical;-webkit-line-clamp:2;overflow:hidden}
.wa__excerpt--hero{-webkit-line-clamp:3}
.wa__more{
  display:inline-block;margin-top:10px;font-weight:700;letter-spacing:.2px;
  color:var(--wa-primary);border-bottom:2px solid transparent;transition:.25s
}
.wa__card:hover .wa__more{border-bottom-color:var(--wa-primary);transform:translateX(2px)}
</style>
