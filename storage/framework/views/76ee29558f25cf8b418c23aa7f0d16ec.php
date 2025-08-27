

<?php
    use Illuminate\Support\Str;
    $plain = Str::of(strip_tags($article->content))->toString();
    $readingMinutes = max(1, (int) ceil(str_word_count($plain) / 200)); // ~200 wpm
?>

<?php $__env->startSection('title', $article->title); ?>
<?php $__env->startSection('meta_description', Str::limit($plain, 150)); ?>

<?php $__env->startSection('content'); ?>
<?php echo app('Illuminate\Foundation\Vite')('resources/css/article-wow.css'); ?>

<div class="aw-progress" id="awProgress"></div>

<article class="aw-article">
    
    <section class="aw-hero"
        <?php if($article->featured_image_url): ?>
            style="--hero:url('<?php echo e($article->featured_image_url); ?>')"
        <?php endif; ?>
    >
        <div class="aw-hero__overlay"></div>
        <div class="aw-hero__content aw-container">
            <p class="aw-breadcrumb">
                <a href="<?php echo e(route('home')); ?>">Accueil</a> <span>›</span>
                <a href="<?php echo e(route('articles.index')); ?>">Articles</a> <span>›</span>
                <span><?php echo e($article->title); ?></span>
            </p>
            <h1 class="aw-title"><?php echo e($article->title); ?></h1>
            <p class="aw-meta">
                Publié le <?php echo e(optional($article->published_at)->translatedFormat('d F Y')); ?>

                <span aria-hidden="true">•</span> <?php echo e($readingMinutes); ?> min de lecture
            </p>
        </div>
    </section>

    
    <div class="aw-container aw-layout">
        <div class="aw-content prose" id="awContent">
            <?php echo $article->content_html; ?>

        </div>

        <aside class="aw-aside">
            <div class="aw-card">
                <div class="aw-card__title">Partager</div>
                <?php $url = url()->current(); ?>
                <a class="aw-share" target="_blank" rel="noopener"
                   href="https://www.linkedin.com/sharing/share-offsite/?url=<?php echo e(urlencode($url)); ?>">LinkedIn</a>
                <a class="aw-share" target="_blank" rel="noopener"
                   href="https://twitter.com/intent/tweet?url=<?php echo e(urlencode($url)); ?>&text=<?php echo e(urlencode($article->title)); ?>">X</a>
                <a class="aw-share" target="_blank" rel="noopener"
                   href="https://www.facebook.com/sharer/sharer.php?u=<?php echo e(urlencode($url)); ?>">Facebook</a>
                <button class="aw-share" type="button"
                        onclick="navigator.clipboard.writeText('<?php echo e($url); ?>')">Copier le lien</button>
            </div>
        </aside>
    </div>

    
    <section class="aw-container aw-nextprev">
        <?php ($prev = $article->previous()); ?>
        <?php if($prev): ?>
            <a class="aw-nextprev__card" href="<?php echo e(route('articles.show', $prev->slug)); ?>">
                <small>Article précédent</small>
                <span><?php echo e($prev->title); ?></span>
            </a>
        <?php endif; ?>

        <?php ($next = $article->next()); ?>
        <?php if($next): ?>
            <a class="aw-nextprev__card aw-next" href="<?php echo e(route('articles.show', $next->slug)); ?>">
                <small>Article suivant</small>
                <span><?php echo e($next->title); ?></span>
            </a>
        <?php endif; ?>
    </section>

    <footer class="aw-container aw-back">
        <a href="<?php echo e(route('articles.index')); ?>">← Retour aux articles</a>
    </footer>
</article>


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
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH E:\Liberu-v2\cms-laravel\resources\views/articles/show.blade.php ENDPATH**/ ?>