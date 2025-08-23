<footer class="footer">
    <div class="content footer-content<?php echo e(($pageName ?? '') == 'index' ? ' footer-content-alt' : ''); ?>">
        <a href="<?php echo e(url('index.php')); ?>">
            <img src="<?php echo e(asset('asset/img/logo-white.png')); ?>" alt="Logo Technic & Plans" class="footer-logo">
        </a>

        <div class="footer-menu">
            <a href="<?php echo e(url('index.php')); ?>" class="footer-menu-item<?php echo e(($pageName ?? '') == 'index' ? ' footer-menu-item-alt' : ''); ?>">Accueil</a>
            <a href="<?php echo e(url('notre-savoir-faire.php')); ?>" class="footer-menu-item<?php echo e(($pageName ?? '') == 'notre-savoir-faire' ? ' footer-menu-item-alt' : ''); ?>">Notre savoir-faire</a>
            <a href="<?php echo e(url('courtage-travaux.php')); ?>" class="footer-menu-item<?php echo e(($pageName ?? '') == 'courtage-travaux' ? ' footer-menu-item-alt' : ''); ?>">Courtage travaux</a>
            <a href="<?php echo e(url('contact.php')); ?>" class="footer-menu-item<?php echo e(($pageName ?? '') == 'contact' ? ' footer-menu-item-alt' : ''); ?>">Contact</a>
            <a href="<?php echo e(url('mentions-legales.php')); ?>" class="footer-menu-item<?php echo e(($pageName ?? '') == 'mentions-legales' ? ' footer-menu-item-alt' : ''); ?>">Mentions légales</a>
            <a href="<?php echo e(url('rgpd.php')); ?>" class="footer-menu-item<?php echo e(($pageName ?? '') == 'rgpd' ? ' footer-menu-item-alt' : ''); ?>">RGPD</a>
        </div>
    </div>
</footer>
<?php /**PATH E:\Liberu-v2\cms-laravel\resources\views/partials/footer.blade.php ENDPATH**/ ?>