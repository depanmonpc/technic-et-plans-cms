<header class="header">
    <div class="content">
        <a href="<?php echo e(route('home')); ?>">
            <img src="<?php echo e(asset('asset/img/logo.png')); ?>" alt="Technic & Plans - Conception de plans et permis de construire en Hauts-de-France" class="header-logo">
        </a>

        <div class="header-menu">
            <a href="<?php echo e(route('home')); ?>"
               class="header-menu-item <?php echo e(request()->routeIs('home') ? 'header-menu-item-active' : ''); ?>">
                ACCUEIL
            </a>

            <a href="<?php echo e(route('notre-savoir-faire')); ?>"
               class="header-menu-item <?php echo e(request()->routeIs('notre-savoir-faire') ? 'header-menu-item-active' : ''); ?>">
                NOTRE SAVOIR FAIRE
            </a>

            <a href="<?php echo e(route('courtage-travaux')); ?>"
               class="header-menu-item <?php echo e(request()->routeIs('courtage-travaux') ? 'header-menu-item-active' : ''); ?>">
                COURTAGE TRAVAUX
            </a>

            <a href="<?php echo e(route('contact')); ?>"
               class="header-menu-item <?php echo e(request()->routeIs('contact') ? 'header-menu-item-active' : ''); ?>">
                CONTACT
            </a>
        </div>

        <img src="<?php echo e(asset('asset/img/ombre.png')); ?>" alt="" class="header-shadow">
    </div>
</header>
<?php /**PATH E:\Liberu-v2\cms-laravel\resources\views/partials/header.blade.php ENDPATH**/ ?>