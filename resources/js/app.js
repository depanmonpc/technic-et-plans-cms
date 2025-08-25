import $ from 'jquery';
window.$ = window.jQuery = $;

import '../css/app.css';
import 'slick-carousel';
import 'slick-carousel/slick/slick.css';
import 'slick-carousel/slick/slick-theme.css';
import 'preline/dist/preline.js';

function initSlick() {
    const slider = $('#slider');

    if (slider.length && !slider.hasClass('slick-initialized')) {
        slider.slick({
            dots: true,
            arrows: true,
            infinite: true,
            speed: 500,
            slidesToShow: 1,
            slidesToScroll: 1,
            autoplay: true,
            autoplaySpeed: 3000,
            adaptiveHeight: true,
        });
    }
}

// Initialisation lors du premier chargement
document.addEventListener('DOMContentLoaded', initSlick);

// Initialisation après chaque navigation Laravel/Vite (pages dynamiques)
document.addEventListener('turbo:load', initSlick);
document.addEventListener('livewire:navigated', initSlick);
