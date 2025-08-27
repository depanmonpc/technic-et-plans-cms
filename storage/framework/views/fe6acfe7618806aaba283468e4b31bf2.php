

<?php $__env->startSection('content'); ?>
<div class="tw-bg-gray-50 tw-py-16">
    <div class="tw-max-w-7xl tw-mx-auto tw-px-4 sm:tw-px-6 lg:tw-px-8">

        
        <?php if($articles->count()): ?>
            <?php
                $featured = $articles->first();
                $others = $articles->slice(1);
            ?>

            <div class="tw-relative tw-mb-16 tw-rounded-3xl tw-overflow-hidden tw-shadow-xl group">
                <a href="<?php echo e(route('articles.show', $featured->slug)); ?>">
                    
                    <?php if($featured->thumbnail): ?>
                        <img src="<?php echo e(Storage::disk('public')->url($featured->thumbnail)); ?>"
                             alt="<?php echo e($featured->title); ?>"
                             class="tw-w-full tw-h-[420px] tw-object-cover tw-transform group-hover:tw-scale-105 tw-transition tw-duration-700">
                    <?php else: ?>
                        <div class="tw-w-full tw-h-[420px] tw-bg-gray-300 tw-flex tw-items-center tw-justify-center tw-text-gray-600">
                            Pas d'image
                        </div>
                    <?php endif; ?>

                    
                    <div class="tw-absolute tw-inset-0 tw-bg-gradient-to-t tw-from-black/80 tw-via-black/40 tw-to-transparent"></div>

                    
                    <div class="tw-absolute tw-bottom-0 tw-left-0 tw-p-10 tw-text-white tw-max-w-2xl">
                        <p class="tw-text-sm tw-text-gray-200 tw-mb-2">
                            Publié le <?php echo e(optional($featured->published_at)->translatedFormat('d F Y')); ?>

                        </p>
                        <h2 class="tw-text-4xl tw-font-extrabold tw-leading-tight tw-mb-4 group-hover:tw-text-[#D4A84E] tw-transition">
                            <?php echo e($featured->title); ?>

                        </h2>
                        <p class="tw-mb-6 tw-text-gray-200">
                            <?php echo e($featured->excerpt ?? Str::limit(strip_tags($featured->content), 160)); ?>

                        </p>
                        <span class="tw-inline-flex tw-items-center tw-px-6 tw-py-3 tw-rounded-full tw-bg-[#D4A84E] tw-text-white tw-font-semibold tw-shadow-md tw-transform tw-transition tw-duration-300 hover:tw-bg-[#b68a3e] hover:tw-scale-105">
                            Lire la suite →
                        </span>
                    </div>
                </a>
            </div>

            
            <div class="tw-grid tw-gap-10 md:tw-grid-cols-2 lg:tw-grid-cols-3">
                <?php $__currentLoopData = $others; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $article): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <article class="tw-relative group tw-bg-white tw-rounded-2xl tw-overflow-hidden tw-shadow-md hover:tw-shadow-2xl tw-transition tw-duration-500 tw-transform hover:-tw-translate-y-2">
                        
                        
                        <div class="tw-relative tw-h-56 tw-overflow-hidden">
                            <?php if($article->thumbnail): ?>
                                <img src="<?php echo e(Storage::disk('public')->url($article->thumbnail)); ?>"
                                     alt="<?php echo e($article->title); ?>"
                                     class="tw-absolute tw-inset-0 tw-w-full tw-h-full tw-object-cover tw-transform group-hover:tw-scale-110 tw-transition tw-duration-500">
                            <?php else: ?>
                                <div class="tw-absolute tw-inset-0 tw-flex tw-items-center tw-justify-center tw-bg-gray-200 tw-text-gray-500">
                                    <span class="tw-italic">Pas d'image</span>
                                </div>
                            <?php endif; ?>
                            <div class="tw-absolute tw-inset-0 tw-bg-black/10 group-hover:tw-bg-black/30 tw-transition"></div>
                        </div>

                        
                        <div class="tw-p-6">
                            <h2 class="tw-text-2xl tw-font-semibold tw-text-gray-900 tw-mb-3 group-hover:tw-text-[#D4A84E] tw-transition">
                                <a href="<?php echo e(route('articles.show', $article->slug)); ?>">
                                    <?php echo e($article->title); ?>

                                </a>
                            </h2>

                            <p class="tw-text-sm tw-text-gray-400 tw-mb-4">
                                Publié le <?php echo e(optional($article->published_at)->translatedFormat('d F Y')); ?>

                            </p>

                            <p class="tw-text-gray-600 tw-mb-6 tw-line-clamp-3">
                                <?php echo e($article->excerpt ?? Str::limit(strip_tags($article->content), 120)); ?>

                            </p>

                            <a href="<?php echo e(route('articles.show', $article->slug)); ?>" 
                               class="tw-inline-flex tw-items-center tw-px-5 tw-py-2 tw-rounded-full tw-bg-[#D4A84E] tw-text-white tw-font-semibold tw-shadow-md tw-transform tw-transition tw-duration-300 hover:tw-bg-[#b68a3e] hover:tw-scale-105">
                                Lire la suite →
                            </a>
                        </div>
                    </article>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>

            
            <div class="tw-mt-16">
                <?php echo e($articles->links()); ?>

            </div>
        <?php else: ?>
            <p class="tw-text-center tw-text-gray-500 tw-text-lg">Aucun article disponible pour le moment.</p>
        <?php endif; ?>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH E:\Liberu-v2\cms-laravel\resources\views/articles/index.blade.php ENDPATH**/ ?>