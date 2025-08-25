<footer class="footer">
    <div class="content footer-content<?php echo e(request()->routeIs('home') ? ' footer-content-alt' : ''); ?>">
        <a href="<?php echo e(route('home')); ?>">
            <img src="<?php echo e(asset('asset/img/logo-white.png')); ?>" alt="Logo Technic & Plans" class="footer-logo">
        </a>

        <div class="footer-menu">
            <a href="<?php echo e(route('home')); ?>" class="footer-menu-item<?php echo e(request()->routeIs('home') ? ' footer-menu-item-alt' : ''); ?>">
                Accueil
            </a>

            <a href="<?php echo e(route('notre-savoir-faire')); ?>" class="footer-menu-item<?php echo e(request()->routeIs('notre-savoir-faire') ? ' footer-menu-item-alt' : ''); ?>">
                Notre savoir-faire
            </a>

            <a href="<?php echo e(route('courtage-travaux')); ?>" class="footer-menu-item<?php echo e(request()->routeIs('courtage-travaux') ? ' footer-menu-item-alt' : ''); ?>">
                Courtage travaux
            </a>

            <a href="<?php echo e(route('contact')); ?>" class="footer-menu-item<?php echo e(request()->routeIs('contact') ? ' footer-menu-item-alt' : ''); ?>">
                Contact
            </a>

            <a href="<?php echo e(route('mentions-legales')); ?>"
   class="footer-menu-item<?php echo e(request()->routeIs('mentions-legales') ? ' footer-menu-item-alt' : ''); ?>">
    Mentions légales
</a>

            <a href="<?php echo e(route('rgpd')); ?>" class="footer-menu-item<?php echo e(request()->routeIs('rgpd') ? ' footer-menu-item-alt' : ''); ?>">
                RGPD
            </a>
        </div>
    </div>
</footer>
<?php /**PATH E:\Liberu-v2\cms-laravel\resources\views/partials/footer.blade.php ENDPATH**/ ?>