

<?php $__env->startSection('content'); ?>
<div class="content" style="max-width: 900px; margin: 0 auto; padding: 40px 20px;">
    <article>
        <h1 class="text-3xl font-bold mb-4"><?php echo e($article->title); ?></h1>

        <p class="text-gray-500 text-sm mb-6">
            Publié le <?php echo e($article->published_at->translatedFormat('d F Y')); ?>

        </p>

        <?php if($article->featured_image): ?>
            <img src="<?php echo e($article->featured_image); ?>" 
                 alt="<?php echo e($article->title); ?>"
                 class="rounded-lg shadow-md mb-6 w-full">
        <?php endif; ?>

        <div class="prose max-w-none text-gray-800 leading-relaxed">
            <?php echo nl2br(e($article->content)); ?>

        </div>
    </article>

    <div class="mt-10">
        <a href="<?php echo e(route('articles.index')); ?>" class="text-blue-600 hover:underline">
            ← Retour aux articles
        </a>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH E:\Liberu-v2\cms-laravel\resources\views/articles/show.blade.php ENDPATH**/ ?>