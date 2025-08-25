

<?php $__env->startSection('title', 'Contact - Technic & Plans'); ?>
<?php $__env->startSection('description', "Contactez Technic & Plans pour vos projets : avant-projets, permis de construire, extensions, aménagements et modélisations 3D dans le secteur Béthune, Arras et Lens."); ?>

<?php $__env->startSection('content'); ?>
    <!-- Entête -->
    <div class="entete">
        <img src="<?php echo e(asset('asset/img/entete-contact.jpg')); ?>" alt="Contacter Technic et Plans">
    </div>

    <!-- Section Contact -->
    <div class="contact">
        <div class="content">
            <img src="<?php echo e(asset('asset/img/shadow-1.png')); ?>" alt="" class="contact-shadow-1">
            <img src="<?php echo e(asset('asset/img/shadow-2.png')); ?>" alt="" class="contact-shadow-2">
            <img src="<?php echo e(asset('asset/img/shadow-3.png')); ?>" alt="" class="contact-shadow-3">

            <!-- Formulaire de contact -->
            <div class="contact-form">
                <p>Ou remplissez directement le formulaire de contact ci-dessous</p>

                <form action="<?php echo e(route('contact.send')); ?>" method="POST" id="form-contact">
                    <?php echo csrf_field(); ?>

                    <div class="f6">
                        <label for="firstname">Nom*</label>
                        <input type="text" name="firstname" id="firstname" value="<?php echo e(old('firstname')); ?>" required>
                    </div>

                    <div class="f6">
                        <label for="lastname">Prénom*</label>
                        <input type="text" name="lastname" id="lastname" value="<?php echo e(old('lastname')); ?>" required>
                    </div>

                    <div class="f6">
                        <label for="email">Mail*</label>
                        <input type="email" name="email" id="email" value="<?php echo e(old('email')); ?>" required>
                    </div>

                    <div class="f6">
                        <label for="phone">Téléphone</label>
                        <input type="text" name="phone" id="phone" value="<?php echo e(old('phone')); ?>">
                    </div>

                    <div class="f12">
                        <label for="subject">Objet de votre demande*</label>
                        <input type="text" name="subject" id="subject" value="<?php echo e(old('subject')); ?>" required>
                    </div>

                    <div class="clear"></div>

                    <label for="content">Expliquez-nous votre besoin*</label>
                    <textarea name="content" id="content" placeholder="Votre message ici..." required><?php echo e(old('content')); ?></textarea>

                    <!-- Champ honeypot anti-spam -->
                    <input type="text" name="honeypot" id="honeypot" style="display:none;">

                    <input type="submit" value="ENVOYER LE MESSAGE">
                </form>
            </div>

            <!-- Carte Google Maps -->
            <div class="contact-map">
                <iframe 
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2540.760172008669!2d2.6898733160555177!3d50.445567679474735!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47dd3c819b5e45ab%3A0x752620b1f6122f7a!2s260+Av.+Fran%C3%A7ois+Mitterrand%2C+62114+Sains-en-Gohelle!5e0!3m2!1sfr!2sfr!4v1545136940753" 
                    width="385" 
                    height="384" 
                    frameborder="0" 
                    style="border:0" 
                    allowfullscreen>
                </iframe>
            </div>

            <!-- Adresse -->
            <div class="contact-adresse">
                Notre société, idéalement située dans le triangle<br>
                <strong>BÉTHUNE / ARRAS / LENS</strong><br>
                est spécialisée dans la réalisation de plans pour vous permettre d’obtenir : <br>
                AVANTS-PROJETS,<br>
                DÉCLARATIONS PRÉALABLES,<br>
                ET PERMIS DE CONSTRUIRE.
            </div>

            <!-- Images supplémentaires -->
            <img src="<?php echo e(asset('asset/img/une-question.jpg')); ?>" alt="Une question sur votre projet ? 07 61 19 31 03" class="contact-image">
            <img src="<?php echo e(asset('asset/img/carte.png')); ?>" class="contact-carte" alt="Carte Technic et Plans">
        </div>
    </div>

    <!-- Bloc final -->
    <div class="three-block three-block-2">
        <div class="three-block-content three-block-content-alt">
            <div class="three-block-item">
                <img src="<?php echo e(asset('asset/img/three-block-item-1.jpg')); ?>" alt="Réalisation de plans">
                <p>RÉALISATION DE <span>PLANS</span></p>
            </div>

            <div class="three-block-item">
                <img src="<?php echo e(asset('asset/img/three-block-item-2.jpg')); ?>" alt="Rendu 3 dimensions">
                <p>RENDU <span>3 DIMENSIONS</span></p>
            </div>

            <div class="three-block-item">
                <img src="<?php echo e(asset('asset/img/three-block-item-3.jpg')); ?>" alt="Courtage travaux">
                <p>COURTAGE <span>TRAVAUX</span></p>
            </div>
            <div class="clear"></div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH E:\Liberu-v2\cms-laravel\resources\views/contact.blade.php ENDPATH**/ ?>