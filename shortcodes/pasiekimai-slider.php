<?php

function cp_pasiekimai_section_shortcode($atts) {
    $atts = shortcode_atts([
        'imgwidth'  => 'w-[182px]', 
        'imgheight' => 'h-[243px]',

    ], $atts, 'pasiekimai_section');

    $query = new WP_Query([
        'post_type'      => 'pasiekimai',
        'posts_per_page' => -1,
    ]);

    if (!$query->have_posts()) {
        return '<p>No achievements found.</p>';
    }

    $images = [];
    while ($query->have_posts()) {
        $query->the_post();
        $img_url = get_post_meta(get_the_ID(), 'cp_pasiekimai_image', true);
        if ($img_url) {
            $images[] = esc_url($img_url);
        }
    }
    wp_reset_postdata();

    if (empty($images)) {
        return '<p>No images found in Pasiekimai.</p>';
    }

    ob_start();
    ?>

    <!-- SECTION WRAPPER -->
    <section class="bg-white py-[40px] px-[16px] md:py-[80px] md:px-[40px] flex flex-col items-center gap-6 md:gap-[56px]">
        <div class="max-w-[1440px] mx-auto text-center md:px-0">
            <h2 class="text-black font-normal text-[28px] md:text-[40px] font-erbaum-regular md:mb-2">
                Mūsų pasiekimai
            </h2>
            <p class="!text-[18px] font-degular-var md:text-base leading-[26px] mb-0">
                Lorem ipsum dolor sit amet consectetur. Vitae posuere sed libero adipiscing.
                Facilisi sed diam dui justo suspendisse aliquam. A arcu scelerisque iaculis in
                faucibus facilisis. Proin tortor sit gravida habitasse.
            </p>
        </div>

        <!-- SLIDER WRAPPER -->
        <div class="w-full  mx-auto mb-0 md:mb-[40px] md:px-0">

            <!-- ===== MOBILE SWIPER (md:hidden) ===== -->
            <div class="relative md:hidden">
                <div class="swiper w-[85%] mx-auto pasiekimai-mobile-swiper slider-wrapper flex justify-center items-center">
                    <div class="swiper-wrapper">
                        <?php foreach ($images as $img_url): ?>
                            <div class="swiper-slide">
                                <img 
                                    src="<?php echo $img_url; ?>"
                                    class="<?php echo $atts['imgwidth'] . ' ' . $atts['imgheight']; ?> object-contain mx-auto"
                                    alt="Certificate"
                                />
                            </div>
                        <?php endforeach; ?>
                    </div> 
                </div>

                <!-- Mobile Navigation Buttons -->
                <button
                    class="pasiekimai-mobile-prev absolute left-0 md:left-2 top-[50%] md:top-[60%] -translate-y-1/2 bg-white rounded-full p-2 hover:bg-gray-100 focus:outline-none"
                >
                    <img src="<?php echo LANGU_THEME_URI; ?>/assets/icons/left-mobile-button.png" alt="Left" />
                </button>
                <button
                    class="pasiekimai-mobile-next absolute right-0 md:right-2 top-[50%] md:top-[60%] -translate-y-1/2 bg-white rounded-full p-2 hover:bg-gray-100 focus:outline-none"
                >
                    <img src="<?php echo LANGU_THEME_URI; ?>/assets/icons/right-mobile-button.png" alt="Right" />
                </button>
            </div>

            <!-- ===== DESKTOP SWIPER (hidden md:block) ===== -->
            <div class="relative hidden md:block">
                <div class="swiper w-[85%] mx-auto pasiekimai-desktop-swiper">
                    <div class="swiper-wrapper">
                        <?php foreach ($images as $img_url): ?>
                            <div class="swiper-slide w-[281px] h-[281px]">
                                <img 
                                    src="<?php echo $img_url; ?>"
                                    class="w-full h-[281px] object-contain"
                                    alt="Certificate"
                                />
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>

                <button
                    class="rotate-180 pasiekimai-desktop-prev absolute left-0 top-[60%] -translate-y-1/2 bg-white rounded-[16px] border p-[16px] hover:bg-gray-100 focus:outline-none border-[#BEBEBE] "
                >
                    <img src="<?php echo LANGU_THEME_URI; ?>/assets/icons/arrow-right.svg" alt="Left" />
                </button>
                <button
                    class="pasiekimai-desktop-next absolute right-0 top-[60%] -translate-y-1/2 bg-white rounded-[16px] border p-[16px] hover:bg-gray-100 focus:outline-none border-[#BEBEBE] "
                >
                    <img src="<?php echo LANGU_THEME_URI; ?>/assets/icons/arrow-right.svg" alt="Right" />
                </button>
            </div>
        </div>
    </section>

    <?php
    return ob_get_clean();
}
add_shortcode('pasiekimai_section', 'cp_pasiekimai_section_shortcode');

/**
 * 2) Inline Swiper init
 *    We rely on your already-enqueued 'swiper-script' handle
 */
function cp_pasiekimai_swiper_init() {
    wp_add_inline_script('swiper-script', "
        new Swiper('.pasiekimai-mobile-swiper', {
            slidesPerView: 1,
            slidesPerGroup: 1,
            spaceBetween: 16,
            loop: true,
            navigation: {
                nextEl: '.pasiekimai-mobile-next',
                prevEl: '.pasiekimai-mobile-prev'
            }
        });


        new Swiper('.pasiekimai-desktop-swiper', {
            slidesPerView: 4,
            slidesPerGroup: 1,
            spaceBetween: 24,
            loop: true,
            navigation: {
                nextEl: '.pasiekimai-desktop-next',
                prevEl: '.pasiekimai-desktop-prev'
            }
        });
    ", 'after');
}
add_action('wp_enqueue_scripts', 'cp_pasiekimai_swiper_init', 20);
