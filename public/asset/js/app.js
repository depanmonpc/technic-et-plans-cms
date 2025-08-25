//@prepros-prepend magnific-popup/jquery.magnific-popup.min.js

(function($){

    $('#slider').slick({
        infinite: true,
        slidesToShow: 1,
        slidesToScroll: 1,
        arrows: false,
        autoplay: true,
        speed: 600,
        autoplaySpeed: 3000,
        easing: 'easeInOutCubic'
    });

    $('.manific-image').magnificPopup({
        type: 'image',
        tClose: 'Fermer (Esc)',
        tLoading: 'Chargement en cours...',
        gallery: {
            tPrev: 'Précédent (flèche de gauche)',
            tNext: 'Suivant (flèche de droite)',
            tCounter: '%curr% sur %total%',
            enabled:true
        }
    });

    // Formulaire
    $('#form-contact').submit(function() {
        var firstname = $('#firstname').val();
        var email     = $('#email').val();
        var lastname  = $('#lastname').val();
        var phone     = $('#phone').val();
        var subject   = $('#subject').val();
        var content   = $('#content').val();

        if (
            firstname === '' ||
            email     === '' ||
            lastname  === '' ||
            subject   === '' ||
            content   === ''
        ) {
            alert("Votre message n'a pas été envoyer,\nvous devez remplir tous les champs avec un astérisque (*)");
        } else {
            $.post('send-mail.php', {firstname:firstname,email:email,lastname:lastname,phone:phone,subject:subject,content:content}, function(data) {
                if (data == 'OK') {
                    alert("Votre email a été envoyé.");
                    $('#firstname').val('');
                    $('#email').val('');
                    $('#lastname').val('');
                    $('#phone').val('');
                    $('#subject').val('');
                    $('#content').val('');
                } else {
                    alert("Votre email n'a pas pu être envoyé, veuillez réessayer ultérieurement.");
                }
            });
        }
        return false;
    });

    // NOTRE SAVOIR FAIRE
    var URLGET = window.location.search;
    if (URLGET == '?p=permis') {
        $('#demarches-three').show();
        $('#competences-1, #competences-3, #competences-4').hide();
        $('#index-four-link-2').addClass('index-four-link-active');
    } else if(URLGET == '?p=projet') {
        $('#demarches-three').show();
        $('#competences-1, #competences-2, #competences-4').hide();
        $('#index-four-link-3').addClass('index-four-link-active');
    } else if(URLGET == '?p=perspective') {
        $('#demarches-three').hide();
        $('#competences-1, #competences-2, #competences-3').hide();
        $('#index-four-link-4').addClass('index-four-link-active');
    } else {
        $('#demarches-three').hide();
        $('#competences-2, #competences-3, #competences-4').hide();
        $('#index-four-link-1').addClass('index-four-link-active');
    }

    $('#index-four-link-1, #index-four-link-2, #index-four-link-3, #index-four-link-4').click(function() {
        $('.index-four-link-active').removeClass('index-four-link-active');
        var number = $(this).attr('id').replace('index-four-link-','');
        $('.competences').slideUp();
        $('#competences-' + number).slideDown();
        if (number == 2 || number == 3) {
            $('#demarches-three').show();
        } else {
            $('#demarches-three').hide();
        }
        $(this).addClass('index-four-link-active');
        return false;
    });

})(jQuery);