<!--[if BLOCK]><![endif]--><?php if($articles->count()): ?>
<div class="latest-articles" style="max-width: 900px; margin: 60px auto; padding: 0 20px;">
    <h2 class="text-2xl font-bold mb-6">Derniers articles</h2>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        <!--[if BLOCK]><![endif]--><?php $__currentLoopData = $articles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $article): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="border rounded-lg shadow hover:shadow-lg transition bg-white">
                <!--[if BLOCK]><![endif]--><?php if($article->featured_image): ?>
                    <a href="<?php echo e(route('articles.show', $article->slug)); ?>">
                        <img src="<?php echo e($article->featured_image); ?>"
                             alt="<?php echo e($article->title); ?>"
                             class="rounded-t-lg w-full h-48 object-cover">
                    </a>
                <?php endif; ?><!--[if ENDBLOCK]><![endif]-->

                <div class="p-4">
                    <h3 class="text-lg font-semibold mb-2">
                        <a href="<?php echo e(route('articles.show', $article->slug)); ?>"
                           class="hover:text-blue-600">
                            <?php echo e(Str::limit($article->title, 60)); ?>

                        </a>
                    </h3>
                    <p class="text-sm text-gray-600 mb-3">
                        <?php echo e($article->published_at->translatedFormat('d M Y')); ?>

                    </p>
                </div>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><!--[if ENDBLOCK]><![endif]-->
    </div>
</div>
<?php endif; ?><!--[if ENDBLOCK]><![endif]-->
<?php /**PATH E:\Liberu-v2\cms-laravel\resources\views/partials/latest-articles.blade.php ENDPATH**/ ?>