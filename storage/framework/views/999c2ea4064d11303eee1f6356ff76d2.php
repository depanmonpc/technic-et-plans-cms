

<?php $__env->startSection('title', 'Mentions légales - Technic & Plans'); ?>
<?php $__env->startSection('meta_description', "Page de test pour vérifier le chargement du CSS sur la page Mentions légales."); ?>

<?php $__env->startSection('content'); ?>
    <div class="mentions-legales" style="padding: 30px; text-align: center;">
        <h1>TEST CSS MENTIONS LÉGALES</h1>
        <p>
            Si le CSS est bien chargé, ce texte devrait être **rouge**.
        </p>
        <div class="test-css">Ceci est un test de style.</div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('styles'); ?>
    <style>
        .test-css {
            color: red;
            font-size: 24px;
            font-weight: bold;
            padding: 15px;
            border: 2px solid red;
        }
    </style>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH E:\Liberu-v2\cms-laravel\resources\views/mentions-legales.blade.php ENDPATH**/ ?>