

<?php $__env->startSection('content'); ?>
<div class="content" style="max-width: 900px; margin: 0 auto; padding: 40px 20px;">
    <h1 class="text-3xl font-bold mb-8">Nos articles</h1>

    <?php if($articles->count()): ?>
        <div class="articles-list">
            <?php $__currentLoopData = $articles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $article): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <article class="mb-10 border-b border-gray-300 pb-6">
                    <h2 class="text-2xl font-semibold text-gray-800 mb-2">
                        <a href="<?php echo e(route('articles.show', $article->slug)); ?>" class="hover:text-blue-600">
                            <?php echo e($article->title); ?>

                        </a>
                    </h2>

                    <p class="text-gray-500 text-sm mb-3">
                        Publié le <?php echo e($article->published_at->translatedFormat('d F Y')); ?>

                    </p>

                    <?php if($article->excerpt): ?>
                        <p class="text-gray-700 mb-4">
                            <?php echo e($article->excerpt); ?>

                        </p>
                    <?php endif; ?>

                    <a href="<?php echo e(route('articles.show', $article->slug)); ?>" 
                       class="text-blue-600 font-medium hover:underline">
                        Lire la suite →
                    </a>
                </article>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>

        <div class="mt-8">
            <?php echo e($articles->links()); ?>

        </div>
    <?php else: ?>
        <p>Aucun article disponible pour le moment.</p>
    <?php endif; ?>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH E:\Liberu-v2\cms-laravel\resources\views/articles/index.blade.php ENDPATH**/ ?>