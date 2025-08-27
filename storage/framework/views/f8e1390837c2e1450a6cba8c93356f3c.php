<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

    <title><?php echo $__env->yieldContent('title', config('app.name', 'Technic & Plans')); ?></title>
    <meta name="description" content="<?php echo $__env->yieldContent('meta_description', 'Technic & Plans - Études & plans pour l\'habitat'); ?>">

    <!-- Normalize CSS & Fonts -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/3.0.3/normalize.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:400,300,600|Roboto+Condensed:400,300,700" type="text/css">

    <!-- Slick Carousel -->
    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/jquery.slick/1.5.9/slick.css"/>
    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/jquery.slick/1.5.9/slick-theme.css"/>

    <!-- Scripts compilés -->
    <?php echo app('Illuminate\Foundation\Vite')(['resources/css/app.css', 'resources/js/app.js']); ?>

    <!-- Ton style CSS principal -->
    <link rel="stylesheet" href="<?php echo e(asset('asset/css/style.css')); ?>">

    <?php echo \Livewire\Mechanisms\FrontendAssets\FrontendAssets::styles(); ?>

</head>
<body class="font-sans antialiased bg-white">

    
    <header class="header">
        <div class="content">
            <a href="<?php echo e(route('home')); ?>">
                <img src="<?php echo e(asset('asset/img/logo.png')); ?>"
                     alt="Technic & Plans - Conception de plans et permis de construire"
                     class="header-logo">
            </a>
            <nav class="header-menu">
                <a href="<?php echo e(route('home')); ?>"
                   class="header-menu-item<?php echo e(request()->routeIs('home') ? ' header-menu-item-active' : ''); ?>">
                    ACCUEIL
                </a>
                <a href="<?php echo e(route('notre-savoir-faire')); ?>"
                   class="header-menu-item<?php echo e(request()->routeIs('notre-savoir-faire') ? ' header-menu-item-active' : ''); ?>">
                    NOTRE SAVOIR FAIRE
                </a>
                <a href="<?php echo e(route('courtage-travaux')); ?>"
                   class="header-menu-item<?php echo e(request()->routeIs('courtage-travaux') ? ' header-menu-item-active' : ''); ?>">
                    COURTAGE TRAVAUX
                </a>
                <a href="<?php echo e(route('contact')); ?>"
                   class="header-menu-item<?php echo e(request()->routeIs('contact') ? ' header-menu-item-active' : ''); ?>">
                    CONTACT
                </a>
            </nav>
            <img src="<?php echo e(asset('asset/img/ombre.png')); ?>" alt="" class="header-shadow">
        </div>
    </header>

    
    <main>
        <?php echo e($slot ?? ''); ?>

        <?php echo $__env->yieldContent('content'); ?>
    </main>


<?php echo $__env->make('partials.footer', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>

    <?php echo $__env->yieldPushContent('modals'); ?>
    <?php echo \Livewire\Mechanisms\FrontendAssets\FrontendAssets::scripts(); ?>

</body>
</html>
<?php /**PATH E:\Liberu-v2\cms-laravel\resources\views/layouts/app.blade.php ENDPATH**/ ?>