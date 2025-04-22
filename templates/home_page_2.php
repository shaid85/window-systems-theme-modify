<?php

/**
 * Template Name: HomePage Template
 *
 */

get_header();
?>

<?php
echo do_shortcode('[flexlayout name=page_section]');
?>



<script>
    document.addEventListener("DOMContentLoaded", () => {
        const swiper = new Swiper('.mySwiper', {
            loop: true,
            autoplay: {
                delay: 5000,
                disableOnInteraction: false,
            },
            navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev',
            },
            pagination: {
                el: '.swiper-pagination',
                clickable: true,
                type: 'bullets',
            },
            speed: 800,
            effect: 'fade',
            fadeEffect: {
                crossFade: true,
            },
        });
    });

    document.querySelectorAll('.faq-toggle').forEach(button => {
        button.addEventListener('click', () => {
            const content = document.getElementById(button.getAttribute('aria-controls'));
            content.classList.toggle('hidden');

            button.querySelector('.plus').classList.toggle('hidden');
            button.querySelector('.minus').classList.toggle('hidden');

            button.setAttribute('aria-expanded', content.classList.contains('hidden') ? 'false' : 'true');
        });
    });
</script>

<style>
    body {
        background-color: black;
        color: white;
    }

    .swiper-button-prev::after,
    .swiper-button-next::after {
        content: "";
    }

    /* Style the previous button with your custom arrow image */
    .swiper-button-prev {
        width: 40px;
        height: 40px;
        background: url('<?php echo LANGU_THEME_URI . '/assets/icons/arrow-left.png'; ?>') no-repeat center center;
        background-size: 20px 20px;
        border-radius: 50%;
        background-color: white;
        z-index: 5;
        left: -20px;
    }

    .swiper-button-next {
        width: 40px;
        height: 40px;
        background: url('<?php echo LANGU_THEME_URI . '/assets/icons/arrow-right.png'; ?>') no-repeat center center;
        background-size: 20px 20px;
        border-radius: 50%;
        background-color: white;
        z-index: 5;
        right: -20px;
    }

    .swiper {
        overflow: initial;
    }

    .swiper-pagination-bullet {
        width: 30px;
        height: 3px;
        background-color: #555;
        opacity: 0.6;
        border-radius: 2px;
        transition: all 0.3s ease;
    }

    .swiper-pagination-bullet-active {
        background-color: #fff;
        width: 40px;
        height: 3px;
        opacity: 1;
    }

    .swiper-pagination-bullet:only-child {
        display: block !important;
    }

    .swiper-pagination {
        display: flex;
        gap: 8px;
        bottom: 20px !important;
        justify-content: start;
        bottom: 20px !important;
        padding-left: 80px;
    }

    .bg-yellow {
        background-color: #FFCC32;
    }

    .text-yellow {
        color: #FFCC32;
    }

    .main-text {
        /* style="font-family: Erbaum; */
        font-weight: 400;
        font-size: 32px;
        line-height: 40px;
        letter-spacing: 0%;
        text-align: center;
        vertical-align: middle;
    }


    @media (max-width: 450px) {

        .swiper-button-next,
        .swiper-button-prev {
            display: none;
        }

        .swiper-pagination {
            display: flex;
            justify-content: center;
            margin: 0 auto;
            padding-left: 0;
        }
    }
</style>

<?php get_footer(); ?>