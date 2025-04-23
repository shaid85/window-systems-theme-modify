<?php
$slider_gallerys = get_field('slider_gallery');
if ($slider_gallerys): ?>
    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
        <div class="entry-content">

            <section class="px-4 pb-10 sm:px-20 sm:pb-20">
                <button onclick="window.history.back();"
                    class="flex items-center self-start justify-center gap-2 my-8 text-base font-bold text-center text-black font-fam-1 whitespace-nowrap">
                    <img src="<?php echo LANGU_THEME_URI; ?>/assets/icons/arrow-left.svg" alt="Back arrow"
                        class="self-stretch object-contain w-6 my-auto shrink-0 aspect-square" />
                    <span class="self-stretch my-auto" style="font-family: 'DegularText-Bold' !important;">Grįžti</span>
                </button>

                <div class="flex flex-col items-center w-full gap-6 md:gap-12 sm:flex-row max-md:max-w-full">
                    <!-- Product Images -->
                    <div class="my-auto max-w-full md:max-w-[560px]">
                        <!-- ============== slider start ==================  -->
                        <!-- Main Slider -->
                        <div class="relative h-0">
                            <div
                                class="featured-chip flex relative gap-2 justify-center items-center px-3 py-2 mb-0 bg-[#027AFF] rounded-2xl max-md:mb-2.5  w-[64%] md:w-[200px] -bottom-[12px] md:-bottom-[24px] z-[90] left-[12px] md:left-[20px] h-[32px]">
                                <span class=" font-Degular my-auto text-[12px] text-white" style="letter-spacing: 1px;
    font-family: 'DegularText-Bold' !important;">Populiariausia prekė</span>
                                <img
                                    src="https://cdn.builder.io/api/v1/image/assets/TEMP/6181e7ae4354add9872ea79122957107dff5abe9024d542bcee51c57fd625145"
                                    alt="Popular badge icon" class="self-stretch object-contain w-4 my-auto shrink-0 aspect-square">
                            </div>
                        </div>
                        <div class="swiper main-swiper md:min-h-[520px] h-[343px] md:h-[520px]">
                            <div class="swiper-wrapper">
                                <?php

                                $size = 'medium_large'; // (thumbnail, medium, large, full or custom size)
                                if ($slider_gallerys): ?>

                                    <?php foreach ($slider_gallerys as $slider_gallery): ?>

                                        <div
                                            class="swiper-slide border border-[#F3F4F6] flex items-center justify-center rounded-[16px] p-[16px]">
                                            <img class="object-contain size-full p-[16px]" src="<?php echo esc_url($slider_gallery['sizes']['medium_large']); ?>" alt="<?php echo esc_attr($slider_gallery['alt']); ?>">
                                        </div>
                                    <?php endforeach; ?>

                                <?php endif; ?>
                            </div>
                        </div>

                        <!-- Thumbnail Gallery -->
                        <div class="flex justify-center">
                            <div class="thumb-swiper-wrapper mb-[24px]">
                                <!-- Left Button -->
                                <div class="custom-swiper-button-prev">
                                    <img
                                        src="https://cdn.builder.io/api/v1/image/assets/TEMP/26361eec8e578e9d020f0c37e0cdd97c6c141eada681ae562ab3519eac89c2b0"
                                        alt="Previous" />
                                </div>

                                <div class="swiper thumb-swiper">
                                    <div class="swiper-wrapper">
                                        <?php if ($slider_gallerys): ?>
                                            <?php foreach ($slider_gallerys as $slider_gallery): ?>
                                                <div class="flex items-center justify-center swiper-slide min-w-[56px]">
                                                    <img src="<?php echo esc_url($slider_gallery['sizes']['thumbnail']); ?>" alt="Gallery Thumbnail" class="thumbnail" />
                                                </div>
                                            <?php endforeach; ?>
                                        <?php endif; ?>
                                    </div>
                                </div>

                                <!-- Right Button -->
                                <div class="custom-swiper-button-next">
                                    <img
                                        src="https://cdn.builder.io/api/v1/image/assets/TEMP/d16ce56173e655b7260abf8e914264174deb765a4eb94a0c6f4edf1790aaf122"
                                        alt="Next" />
                                </div>
                            </div>
                        </div>

                        <script>
                            document.addEventListener("DOMContentLoaded", () => {
                                // Initialize thumbnail slider first
                                const thumbnailSwiper = new Swiper(".thumb-swiper", {
                                    loop: true,
                                    slidesPerView: 5,
                                    spaceBetween: 16,
                                    watchSlidesProgress: true,
                                    centeredSlides: true,
                                    navigation: {
                                        nextEl: '.custom-swiper-button-next',
                                        prevEl: '.custom-swiper-button-prev',
                                    },
                                    breakpoints: {
                                        640: {
                                            slidesPerView: 5
                                        },
                                        768: {
                                            slidesPerView: 5
                                        },
                                        1024: {
                                            slidesPerView: 5
                                        },
                                    }
                                });

                                // Initialize main slider (linked to thumbnail slider)
                                const mainSwiper = new Swiper(".main-swiper", {
                                    loop: true,
                                    spaceBetween: 10,
                                    slidesPerView: 1,
                                    thumbs: {
                                        swiper: thumbnailSwiper,
                                    },
                                    pagination: {
                                        el: ".swiper-pagination",
                                        clickable: true,
                                    },
                                });
                            });
                        </script>



                        <script>
                            document.addEventListener("DOMContentLoaded", () => {
                                // Initialize thumbnail slider first
                                const thumbnailSwiper = new Swiper(".thumb-swiper", {
                                    loop: true,
                                    slidesPerView: 5,
                                    spaceBetween: 10,
                                    freeMode: true,
                                    watchSlidesProgress: true,
                                    breakpoints: {
                                        640: {
                                            slidesPerView: 5
                                        },
                                        768: {
                                            slidesPerView: 6
                                        },
                                        1024: {
                                            slidesPerView: 7
                                        },
                                    }
                                });

                                // Initialize main slider (linked to thumbnail slider)
                                const mainSwiper = new Swiper(".main-swiper", {
                                    loop: true,
                                    spaceBetween: 10,
                                    slidesPerView: 1,
                                    thumbs: {
                                        swiper: thumbnailSwiper,
                                    },
                                });

                                // Sync main slider when clicking the navigation buttons
                                document.querySelector('.custom-swiper-button-prev').addEventListener('click', () => {
                                    thumbnailSwiper.slidePrev();
                                    mainSwiper.slidePrev(); // Sync main slider with thumbnail
                                });

                                document.querySelector('.custom-swiper-button-next').addEventListener('click', () => {
                                    thumbnailSwiper.slideNext();
                                    mainSwiper.slideNext(); // Sync main slider with thumbnail
                                });
                            });
                        </script>
                        <!-- ============== slider end ==================  -->
                    </div>


                    <!-- Product Details -->
                    <?php
                    $metu_garantija = get_field('10_metu_garantija');
                    $auksta_kokybe = get_field('auksta_kokybe');
                    $demesys_ekologijai = get_field('demesys_ekologijai');
                    ?>
                    <div class="flex flex-col gap-6 text-lg text-black max-md:max-w-full">
                        <div class="flex flex-col gap-6 text-lg text-black max-md:max-w-full">
                            <div
                                class="flex flex-wrap items-center justify-around w-full gap-6 text-sm font-bold leading-loose text-center rounded-lg font-fam-1 sm:justify-start max-md:max-w-full">
                                <div class="flex flex-col-reverse items-center self-stretch gap-1 my-auto sm:flex-row">
                                    <p class="self-stretch my-auto font-degular-bold"><?php echo esc_html($metu_garantija); ?></p>
                                    <div class="flex items-center justify-center w-full sm:w-fit">
                                        <img
                                            src="https://cdn.builder.io/api/v1/image/assets/TEMP/113a20252b5d45b9d3b33f82f534e02c15e6cef67238f11b3c8b90370257b270?placeholderIfAbsent=true&apiKey=dae2151c29344c8b913745d4df937d8c"
                                            alt="Warranty icon" class="self-stretch object-contain w-4 my-auto shrink-0 aspect-square" />
                                    </div>
                                </div>
                                <div class="flex flex-col-reverse items-center self-stretch gap-1 my-auto sm:flex-row">
                                    <p class="self-stretch my-auto font-degular-bold"><?php echo esc_html($auksta_kokybe); ?></p>
                                    <div class="flex items-center justify-center w-full sm:w-fit">
                                        <img
                                            src="https://cdn.builder.io/api/v1/image/assets/TEMP/f54b1da5dbeafbd2886d590797c1e8671146277117f076db6f8ab90219fcb685?placeholderIfAbsent=true&apiKey=dae2151c29344c8b913745d4df937d8c"
                                            alt="Quality icon" class="self-stretch object-contain w-4 my-auto shrink-0 aspect-square" />
                                    </div>
                                </div>
                                <div class="flex flex-col-reverse items-center self-stretch gap-1 my-auto sm:flex-row">
                                    <p class="self-stretch my-auto font-degular-bold"><?php echo esc_html($demesys_ekologijai); ?></p>
                                    <div class="flex items-center justify-center w-full sm:w-fit">
                                        <img
                                            src="https://cdn.builder.io/api/v1/image/assets/TEMP/10f235012cf17197f32c0191613407582ba42daf27245a15944068eba1c0116c?placeholderIfAbsent=true&apiKey=dae2151c29344c8b913745d4df937d8c"
                                            alt="Ecology icon" class="self-stretch object-contain w-4 my-auto shrink-0 aspect-square" />
                                    </div>
                                </div>
                            </div>
                            <!-- Title -->
                            <h1 class="text-3xl leading-none font-fam-2 max-md:max-w-full font-erbaum-regular">
                                <?php the_title(); ?>
                            </h1>
                            <!-- Description -->
                            <div class="font-fam-3 text-[18px] leading-[26px] max-md:max-w-full">
                                <?php echo wp_kses_post(get_field('product_description')); ?>
                            </div>
                            <!-- Example Features List -->
                            <ul class="max-w-full flex flex-col gap-0 leading-none w-[564px]">

                                <?php

                                // Check rows exists.
                                if (have_rows('add_bullet_points')):
                                    // Loop through rows.
                                    while (have_rows('add_bullet_points')) : the_row();
                                ?>
                                        <li class=" flex flex-wrap gap-[16px] items-center w-full max-md:max-w-full mb-2">
                                            <img src="https://cdn.builder.io/api/v1/image/assets/TEMP/7f7018db77a35f783fb5a3fd231ae6392ee40c9fe7ee80873b46ea0775c43310" alt="Checkmark" class="object-contain shrink-0 self-stretch my-auto w-[24px] aspect-square" />
                                            <span class="self-stretch my-auto degular-light">
                                                <?php echo esc_html(get_sub_field('bullet__point')); ?>
                                            </span>
                                        </li>
                                <?php
                                    // End loop.
                                    endwhile;
                                // Do something...
                                endif;
                                ?>
                            </ul>
                            <!-- CTA Button -->
                            <button
                                class="gap-2.5 self-stretch p-4 max-w-full h-[58px] font-bold leading-none text-center bg-amber-400 rounded-2xl w-[400px]">
                                Gauti pasiūlymą
                            </button>
                        </div>
                    </div>
            </section>


            <section class="flex flex-col px-4 py-10 gap-6 md:gap-14 sm:p-20 bg-neutral-100">
                <div class="flex flex-col gap-2 md:gap-4">
                    <h2 class="md:text-3xl text-[24px] leading-10 text-black max-sm:leading-9">
                        <?php echo esc_html(get_field('features_title')); ?>
                    </h2>
                    <div class="text-lg leading-7 text-black max-sm:text-base max-sm:leading-6">
                        <?php echo wp_kses_post(get_field('description_of_features_items')); ?>
                    </div>
                </div>

                <div
                    class="grid gap-14 grid-cols-[repeat(3,1fr)] md:gap-y-[56px] md:gap-x-[48px] max-md:grid-cols-[repeat(2,1fr)] max-sm:gap-4 max-sm:grid-cols-[1fr]">
                    <?php // Check rows exists.
                    if (have_rows('features_items')):

                        // Loop through rows.
                        while (have_rows('features_items')) : the_row();
                            $image = get_sub_field('icon_image');
                    ?>

                            <article>
                                <!-- Mobile Layout -->
                                <div class="sm:hidden flex flex-col gap-1">
                                    <!-- Icon & Title Row -->
                                    <div class="flex items-center gap-4">
                                        <?php if ($image): ?>
                                            <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($title); ?>" class="feature-icon"
                                                style="width: 40px; height: 40px;" />
                                        <?php else: ?>
                                            <svg width="40" height="40" viewBox="0 0 40 40" fill="none" xmlns="http://www.w3.org/2000/svg"
                                                class="feature-icon" style="width: 40px; height: 40px">
                                                <circle cx="20" cy="20" r="18" stroke="black" stroke-width="2" />
                                            </svg>
                                        <?php endif; ?>

                                        <h3 class="text-xl leading-7 text-black max-sm:text-lg max-sm:leading-7">
                                            <?php echo esc_html(get_sub_field('heading')); ?>
                                        </h3>
                                    </div>

                                    <!-- Description Row -->
                                    <div class="text-[14px] leading-[26px] text-black max-sm:text-base max-sm:leading-6">
                                        <?php echo wp_kses_post(get_sub_field('icon_description')); ?>
                                    </div>
                                </div>

                                <!-- Desktop Layout (Original) -->
                                <div class="hidden sm:flex items-start gap-6">
                                    <div>
                                        <?php if ($image): ?>
                                            <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($title); ?>" class="feature-icon"
                                                style="width: 40px; height: 40px;" />
                                        <?php else: ?>
                                            <svg width="40" height="40" viewBox="0 0 40 40" fill="none" xmlns="http://www.w3.org/2000/svg"
                                                class="feature-icon" style="width: 40px; height: 40px">
                                                <circle cx="20" cy="20" r="18" stroke="black" stroke-width="2" />
                                            </svg>
                                        <?php endif; ?>
                                    </div>

                                    <div class="flex flex-col flex-1 gap-2">
                                        <h3 class="text-xl leading-7 text-black max-sm:text-lg max-sm:leading-7">
                                            <?php echo esc_html(get_sub_field('heading')); ?>
                                        </h3>
                                        <div class="text-lg leading-[26px] text-black max-sm:text-base max-sm:leading-6">
                                            <?php echo wp_kses_post(get_sub_field('icon_description')); ?>
                                        </div>
                                    </div>
                                </div>
                            </article>

                        <?php endwhile; ?>
                    <?php else: ?>
                        <p>No features available.</p>
                    <?php endif; ?>
                </div>

            </section>

            <section class="flex flex-col items-center px-4 py-6 md:py-10 bg-white sm:flex-row gap-14 sm:p-20">
                <div class="flex flex-col w-full gap-8 text-black sm:w-1/2">
                    <div class="w-full">
                        <h2 class="text-[32px] md:text-3xl leading-10 max-md:max-w-full">
                            <?php
                            // Acf field
                            echo esc_html(get_field('tech_heading')); ?>
                        </h2>
                        <div class="mt-4 text-lg leading-7 max-md:max-w-full">
                            <?php echo wp_kses_post(get_field('tech_description')); ?>
                        </div>
                    </div>
                    <button
                        class="hidden sm:block gap-2.5 self-stretch p-4 max-w-full text-lg font-bold leading-none text-center bg-amber-400 rounded-2xl w-[400px]">
                        Gauti pasiūlymą
                    </button>
                </div>

                <div class="flex flex-col items-center pb-10 w-full gap-[24px] sm:w-1/2">
                    <?php
                    // Check rows exists.
                    if (have_rows('technical_data_items')): ?>
                        <div
                            class="flex flex-col w-full gap-2 p-4 text-lg text-white bg-black sm:gap-6 sm:py-14 sm:pb-16 sm:px-10 rounded-2xl">
                            <?php
                            // Loop through rows.
                            while (have_rows('technical_data_items')) : the_row();
                            ?>
                                <!-- Single Item -->
                                <div class="w-full">
                                    <a class="text-[16px] md:text-[18px]">
                                        <?php
                                        // Acf field
                                        echo esc_html(get_sub_field('tech_feature')); ?>:
                                    </a>
                                    <span>
                                        <?php
                                        // Acf field
                                        echo esc_html(get_sub_field('feature_value')); ?>
                                    </span>
                                </div>
                                <hr class="w-full bg-zinc-800 border-zinc-800 min-h-px max-md:max-w-full"
                                    style="border-bottom: 1/2px solid #292929;" />
                            <?php endwhile; ?>
                        </div>
                    <?php else: ?>
                        <p>No technical data available.</p>
                    <?php endif; ?>

                    <button
                        class="block sm:hidden gap-2.5 self-stretch p-4 text-lg font-bold leading-none text-center bg-amber-400 rounded-2xl w-full">
                        Gauti pasiūlymą
                    </button>
                </div>
            </section>

            <section class="flex flex-col px-4 py-10 mx-auto gap-6 md:gap-14 sm:px-20 sm:py-24 max-w-none bg-neutral-100">
                <div class="flex flex-col gap-4 sm:gap-2">
                    <h2 class="text-3xl leading-10 text-black max-sm:text-[24px] max-sm:leading-9">
                        <?php
                        // Acf field
                        echo esc_html(get_field('spalvos')); ?>
                    </h2>
                    <div class="text-lg leading-7 text-black max-sm:text-base max-sm:leading-6">
                        <?php
                        // Acf field
                        echo wp_kses_post(get_field('spalvos_description')); ?>
                    </div>
                </div>
                <?php
                $spalvos_gallery = get_field('spalvos_gallery');

                if ($spalvos_gallery): ?>
                    <div id='pattern-palette' class=" grid grid-cols-5 pb-2 md:pb-0 md:gap-3 gap-[8px] md:flex md:flex-wrap">
                        <?php foreach ($spalvos_gallery as $g_image): ?>
                            <div class="md:w-20 w-[56px] md:h-20 h-[56px] overflow-hidden rounded-[8px] cursor-pointer">
                                <img src="<?php echo esc_url($g_image['url']); ?>" alt="Pattern" class="object-cover w-full h-full" />
                            </div>

                        <?php endforeach; ?>
                    </div>
                <?php else: ?>
                    <p>No patterns available.</p>
                <?php endif; ?>

            </section>

            <section
                class="flex flex-col items-start justify-center w-full gap-6 px-4 py-10 bg-white sm:flex-row sm:gap-12 sm:p-20">
                <div class="ls_faq flex flex-col items-start flex-1 gap-6">
                    <h2 class="w-full text-3xl leading-10 text-black max-md:text-3xl max-sm:text-2xl">
                        <?php
                        // Acf field
                        echo esc_html(get_field('additional_information')); ?>
                    </h2>

                    <div id="info-container" class="tik_list flex flex-col items-center justify-around w-full gap-3">
                        <?php

                        // Check rows exists.
                        if (have_rows('faq_items')):

                            // Loop through rows.
                            while (have_rows('faq_items')) : the_row();
                                $title = get_sub_field('title');
                                $description = get_sub_field('description');
                                $index = get_row_index();
                        ?>
                                <div
                                    class="flex flex-col items-center w-full gap-4 p-5 bg-white border rounded-xl border-zinc-100 max-sm:p-4">
                                    <div class="flex items-center justify-between w-full gap-4">
                                        <div class="text-lg font-bold text-black" style="font-family: degular;"><?php echo esc_html($title); ?>
                                        </div>
                                        <button type="button"
                                            class="toggle-button flex justify-center items-center p-2 w-8 bg-amber-400 rounded-2xl <?php echo ($index === 0) ? 'active' : ''; ?>"
                                            aria-expanded="<?php echo ($index === 0) ? 'true' : 'false'; ?>"
                                            aria-controls="info-<?php echo $index; ?>-content">
                                            <span class="toggle-icon-plus">
                                                <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg"
                                                    class="w-[16px] h-[16px]">
                                                    <path
                                                        d="M14 8C14 8.13261 13.9473 8.25979 13.8536 8.35355C13.7598 8.44732 13.6326 8.5 13.5 8.5H8.5V13.5C8.5 13.6326 8.44732 13.7598 8.35355 13.8536C8.25979 13.9473 8.13261 14 8 14C7.86739 14 7.74021 13.9473 7.64645 13.8536C7.55268 13.7598 7.5 13.6326 7.5 13.5V8.5H2.5C2.36739 8.5 2.24021 8.44732 2.14645 8.35355C2.05268 8.25979 2 8.13261 2 8C2 7.86739 2.05268 7.74021 2.14645 7.64645C2.24021 7.55268 2.36739 7.5 2.5 7.5H7.5V2.5C7.5 2.36739 7.55268 2.24021 7.64645 2.14645C7.74021 2.05268 7.86739 2 8 2C8.13261 2 8.25979 2.05268 8.35355 2.14645C8.44732 2.24021 8.5 2.36739 8.5 2.5V7.5H13.5C13.6326 7.5 13.7598 7.55268 13.8536 7.64645C13.9473 7.74021 14 7.86739 14 8Z"
                                                        fill="black"></path>
                                                </svg>
                                            </span>
                                            <span class="toggle-icon-minus">
                                                <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg"
                                                    class="w-[16px] h-[16px]">
                                                    <path
                                                        d="M14 8C14 8.13261 13.9473 8.25979 13.8536 8.35355C13.7598 8.44732 13.6326 8.5 13.5 8.5H2.5C2.36739 8.5 2.24021 8.44732 2.14645 8.35355C2.05268 8.25979 2 8.13261 2 8C2 7.86739 2.05268 7.74021 2.14645 7.64645C2.24021 7.55268 2.36739 7.5 2.5 7.5H13.5C13.6326 7.5 13.7598 7.55268 13.8536 7.64645C13.9473 7.74021 14 7.86739 14 8Z"
                                                        fill="black"></path>
                                                </svg>
                                            </span>
                                        </button>
                                    </div>
                                    <?php if (!empty($description)): ?>
                                        <div id="info-<?php echo $index; ?>-content"
                                            class="section-content w-full <?php echo ($index === 0) ? 'active' : ''; ?>">
                                            <?php echo wp_kses_post($description); ?>
                                        </div>
                                    <?php endif; ?>

                                </div>
                            <?php endwhile; ?>
                        <?php else: ?>
                            <p>No additional information available.</p>
                        <?php endif; ?>
                    </div>
                </div>
                <?php
                $imagevideo = get_field('imagevideo');
                $additional_img = get_field('right_image');
                $info_video  = get_field('info_video');
                ?>
                <?php if ($imagevideo == 'Image'): ?>
                    <div class="flex justify-center items-center bg-white rounded-2xl border border-zinc-100 mx-auto h-[560px] w-[560px] max-md:h-[400px] max-md:w-[400px] max-sm:w-[343px] max-sm:h-[343px]">
                        <img src="<?php echo esc_url($additional_img['url']); ?>" alt="Product image"
                            class="w-full h-full object-contain rounded-[16px] border-[1px] border-[#F3F4F6]" />
                    </div>
                <?php else: ?>
                    <div class="video_box">
                        <div class="embed-container">
                            <?php echo $info_video; ?>
                        </div>
                    </div>
                <?php endif; ?>
            </section>
            <style>
                .video_box {
                    width: 100%;
                }

                @media (min-width: 767px) {
                    .ls_faq {
                        width: 55%;
                    }

                    .video_box {
                        width: 45%;
                    }
                }

                .embed-container {
                    position: relative;
                    padding-bottom: 56.25%;
                    overflow: hidden;
                    max-width: 100%;
                    height: auto;
                }

                .embed-container iframe,
                .embed-container object,
                .embed-container embed {
                    position: absolute;
                    top: 0;
                    left: 0;
                    width: 100%;
                    height: 100%;
                }
            </style>

            <?php
            $images = get_field('image_gallery');
            if ($images):
            ?>
                <section class="flex flex-col items-center w-full gap-6 px-4 py-10 bg-black sm:gap-14 sm:px-20 sm:py-24">
                    <h2 class="self-stretch text-3xl leading-10 text-white max-sm:text-2xl max-sm:leading-8">
                        <?php
                        // Acf field
                        echo esc_html(get_field('title_of_gallery')); ?>
                    </h2>

                    <div id="gallery-container" class="flex flex-col items-center justify-center w-full gap-4 sm:flex-row sm:gap-6">

                        <!-- Left Side (Large Image) -->
                        <?php
                        $images = get_field('image_gallery');

                        if ($images):
                            // Display the first image
                            $first_image = $images[0]; ?>
                            <div class="w-full sm:w-1/2 md:h-[560px]">
                                <img src="<?php echo esc_url($images[0]['url']); ?>" alt="Gallery Image"
                                    class="object-cover w-full h-[93vw] md:h-full md:h-[520px] rounded-2xl cursor-pointer" onclick="openGallery(0)" />
                            </div>
                        <?php endif;
                        // Remove the first image from the array
                        $remaining_images = array_slice($images, 1);
                        // if ($remaining_images):
                        ?>

                        <!-- Right Side (Grid of Smaller Images) -->
                        <div class="grid w-full grid-cols-2 gap-4 sm:w-1/2 sm:gap-6">
                            <?php
                            if ($remaining_images):
                                foreach ($remaining_images as $image) {
                                    $i = get_row_index();
                            ?>
                                    <img src="<?php echo esc_url($image['url']); ?>" alt="Gallery Thumbnail"
                                        class="object-cover w-full h-[44vw] md:h-[268px] rounded-2xl cursor-pointer"
                                        onclick="openGallery(<?php echo $i; ?>)" />
                            <?php }
                            endif;
                            ?>
                        </div>

                    </div>
                </section>

                <!-- Hidden Swiper for Fullscreen Gallery -->
                <div id="fullscreen-gallery"
                    class="fixed inset-0 z-[9999999] flex-col items-center justify-center hidden bg-black bg-opacity-90">
                    <div class="absolute top-4 right-4">
                        <button onclick="closeGallery()" class="text-3xl text-white">
                            <?php echo file_get_contents(LANGU_THEME_URI . "/assets/icons/svg/close-btn.svg"); ?>

                        </button>
                    </div>

                    <!-- Swiper Container -->
                    <div class="relative w-[40vh] md:w-[72vw] h-[50vh] md:h-[688px] swiper gallery-swiper">
                        <div class="swiper-wrapper">
                            <?php foreach ($images as $url): ?>
                                <div class="flex items-center justify-center w-full md:p-8 swiper-slide">
                                    <img src="<?php echo esc_url($url['url']); ?>" alt="Gallery Slide"
                                        class="object-cover w-full h-full md:rounded-[16px]" />
                                </div>
                            <?php endforeach; ?>
                        </div>


                    </div>
                    <!-- Navigation Buttons -->
                    <div class="">
                        <div
                            class="absolute bottom-10 md:top-1/2 custom-swiper-prev flex bg-yellow items-center justify-center w-12 h-12 text-black !rounded-[16px] bg-yellow left-[30%] md:left-[8%]"
                            style="border-radius: 12px !important;">
                            <!-- Arrow Icon -->
                            <img class="w-6" src="<?php echo LANGU_THEME_URI . "/assets/icons/arrow-left.png"; ?>" alt="">
                        </div>
                        <span id="product-counter" class="font-bold text-white bottom-[50px] md:hidden right-[47%] absolute">0/0</span>
                        <div
                            class="absolute right-[30%] md:right-[8%] bottom-10 md:top-1/2 custom-swiper-next flex bg-yellow items-center justify-center w-12 h-12 text-black !rounded-[16px] bg-yellow"
                            style="border-radius: 12px !important;">
                            <!-- Arrow Icon -->
                            <img class="w-6" src="<?php echo LANGU_THEME_URI . "/assets/icons/arrow-right.png"; ?>" alt="">

                        </div>


                    </div>
                </div>
            <?php endif; ?>

            <!-- ============================================ -->

            <section class="flex flex-col gap-6 px-4 py-10 mx-auto sm:gap-14 sm:p-20 max-w-none bg-neutral-100">

                <!-- title and navigation arrows -->
                <div class="flex flex-row items-center justify-between">
                    <h2 class="text-3xl leading-10 text-black">Panašūs gaminiai</h2>
                    <div class="flex gap-2 sm:gap-6 max-sm:self-end">
                        <button class="flex items-center justify-center w-12 h-12 cursor-pointer bg-amber-400 rounded-[16px]"
                            aria-label="Previous product">
                            <img class="w-6" src='<?php echo LANGU_THEME_URI . "/assets/icons/arrow-left.svg"; ?>' alt="">
                        </button>
                        <button class="flex items-center justify-center w-12 h-12 cursor-pointer bg-amber-400 rounded-[16px]"
                            aria-label="Next product">
                            <img class="w-6 rotate-0" src='<?php echo LANGU_THEME_URI . "/assets/icons/arrow-right.svg"; ?>' alt="">
                        </button>
                    </div>
                </div>


                <?php
                // Get current post ID and related terms from the custom taxonomy
                $current_post_id = get_the_ID();
                $related_terms = wp_get_post_terms($current_post_id, 'produkcija_category', ['fields' => 'ids']);

                // Set up the query arguments to fetch related posts
                $related_args = [
                    'post_type' => 'produkcija',
                    'posts_per_page' => 16,
                    'post__not_in' => [$current_post_id],
                    'tax_query' => [
                        [
                            'taxonomy' => 'produkcija_category',
                            'field' => 'term_id',
                            'terms' => $related_terms,
                            'operator' => 'IN',
                        ],
                    ],
                ];

                $related_query = new WP_Query($related_args);
                ?>

                <!-- SWIPER CONTAINER -->
                <div id="product-container"
                    class="flex w-full py-4 bg-gray-100 product-container swiper sm:items-center sm:justify-center">
                    <div class="flex-row swiper-wrapper">
                        <?php if ($related_query->have_posts()):
                            while ($related_query->have_posts()):
                                $related_query->the_post();
                                $title = get_the_title();
                                $trimmed = wp_html_excerpt($title, 200, '…');
                        ?>
                                <div
                                    class="flex flex-col justify-between items-center h-full w-full swiper-slide max-w-full min-h-[265px] md:min-h-[444px]">
                                    <?php if (has_post_thumbnail()): ?>
                                        <div class="bg-white p-4 rounded-[16px] min-w-[100%] border border-gray-200">
                                            <img src="<?= esc_url(get_the_post_thumbnail_url(get_the_ID(), 'medium')) ?>"
                                                alt="<?= the_title_attribute(['echo' => false]) ?>"
                                                class="w-full h-[150px] md:h-[250px] object-contain rounded-[16px] " />
                                        </div>
                                    <?php endif; ?>
                                    <h3 class="mt-4 text-[14px] md:text-[18px] font-bold text-center text-black">
                                        <?php echo esc_html($trimmed); ?>
                                    </h3>
                                    <a href="<?= get_the_permalink() ?>" class="w-full mt-4">
                                        <button
                                            class="w-full px-[16px] py-[8px] md:p-[16px] text-sm font-bold text-white transition-colors bg-black rounded-[16px] hover:bg-gray-800 leading-[26px]">
                                            Daugiau informacijos
                                        </button>
                                    </a>
                                </div>
                            <?php endwhile;
                            wp_reset_postdata();
                        else: ?>
                            <p class="text-black">No related products found.</p>
                        <?php endif; ?>
                    </div>
                </div>

                <script>
                    document.addEventListener("DOMContentLoaded", () => {

                        const swiper = new Swiper(".product-container", {
                            loop: true,
                            spaceBetween: 24,
                            slidesPerView: 1,
                            navigation: {
                                prevEl: '[aria-label="Previous product"]',
                                nextEl: '[aria-label="Next product"]',
                            },
                            breakpoints: {
                                350: {
                                    slidesPerView: 2,
                                    spaceBetween: 8,
                                },
                                768: {
                                    slidesPerView: 3
                                },
                                1024: {
                                    slidesPerView: 4,
                                    spaceBetween: 24,
                                },
                            }
                        });

                    });
                </script>

                <!-- ========================================== -->

                <!-- Contact/Consultation section -->
                <?php
                echo do_shortcode('[feedback_cta 
       title="Reikia konsultacijos ar patarimo?
       Klauskite!" 
       description="Jūsų grįžtamasis ryšys leidžia mums augti ir gerinti jūsų patirtį." 
       button_text="Susisiekti" 
       button_url="/gauti_pasiulyma"]');
                ?>
            </section>

        </div>
    </article>



    <script>
        document.addEventListener('DOMContentLoaded', () => {
            let gallerySwiper;
            const counterEl = document.querySelector("#product-counter");

            window.openGallery = (startIndex) => {
                const fullscreen = document.getElementById('fullscreen-gallery');

                fullscreen.classList.remove('hidden');
                fullscreen.classList.add('flex');

                if (!gallerySwiper) {
                    gallerySwiper = new Swiper('.gallery-swiper', {
                        loop: true,
                        navigation: {
                            nextEl: '.custom-swiper-next',
                            prevEl: '.custom-swiper-prev'
                        }
                    });

                    gallerySwiper.on("slideChange", () => {
                        updateCounter();
                    })
                }

                gallerySwiper.slideTo(startIndex, 0);

            };

            function updateCounter() {
                const total = Array.from(document.querySelectorAll("#product-container .swiper-slide")).length;
                counterEl.innerHTML = `<span class="text-yellow">${gallerySwiper.realIndex + 1}</span>/${total}`;
            }

            window.closeGallery = () => {
                document.getElementById('fullscreen-gallery').classList.add('hidden');
                document.getElementById('fullscreen-gallery').classList.remove('flex');
            };

            document.addEventListener('keydown', e => {
                if (e.key === 'Escape') closeGallery();
            });
        });
    </script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Select all accordion toggle buttons.
            const toggleButtons = document.querySelectorAll('.toggle-button');

            toggleButtons.forEach(button => {
                button.addEventListener('click', function() {
                    // Get the ID of the content container from aria-controls.
                    const targetId = this.getAttribute('aria-controls');
                    const targetContent = document.getElementById(targetId);
                    const isExpanded = this.getAttribute('aria-expanded') === 'true';

                    // Collapse all accordion items.
                    toggleButtons.forEach(btn => {
                        btn.setAttribute('aria-expanded', 'false');
                        btn.classList.remove('active');
                        const contentId = btn.getAttribute('aria-controls');
                        const contentEl = document.getElementById(contentId);
                        if (contentEl) {
                            contentEl.classList.remove('active');
                        }
                        // Toggle icons: show plus, hide minus.
                        const plusIcon = btn.querySelector('.toggle-icon-plus');
                        const minusIcon = btn.querySelector('.toggle-icon-minus');
                        if (plusIcon) plusIcon.style.display = 'block';
                        if (minusIcon) minusIcon.style.display = 'none';
                    });

                    // If the clicked button was not already expanded, expand it.
                    if (!isExpanded) {
                        this.setAttribute('aria-expanded', 'true');
                        this.classList.add('active');
                        targetContent.classList.add('active');

                        // Toggle icons: hide plus, show minus.
                        const plusIcon = this.querySelector('.toggle-icon-plus');
                        const minusIcon = this.querySelector('.toggle-icon-minus');
                        if (plusIcon) plusIcon.style.display = 'none';
                        if (minusIcon) minusIcon.style.display = 'block';
                    }
                });
            });
        });
    </script>
    <style>
        .featured-chip {
            font-family: Degular;
            font-size: 12px;
            font-style: normal;
            font-weight: 700;
            line-height: 18px;
            text-transform: uppercase;
            text-transform: uppercase;
            position: absolute;
            left: 24px;
            top: 24px;
        }

        #product-container .swiper-slide {
            display: flex !important;
        }

        @media (max-width: 450px) {
            .swiper.gallery-swiper {
                margin: 0 !important;
                width: 100%;
            }
        }
    </style>
    <style>
        /* Main Slider */
        .main-swiper {
            width: 100%;
            border-radius: 16px;
            overflow: hidden;
        }

        .main-swiper .swiper-slide img {
            width: 100%;
            height: 100%;
            object-fit: contain;
        }

        /* Thumbnail Gallery */
        .thumb-swiper-wrapper {
            display: flex;
            align-items: center;
            margin-top: 16px;
            gap: 8px;
            width: 80%;
        }

        .thumb-swiper {
            width: 100%;
            height: 56px;
            overflow: hidden;
        }

        .thumb-swiper .swiper-slide {
            max-width: 76px;
            height: 100%;
            opacity: 0.5;
            transition: opacity 0.3s ease;
            cursor: pointer;
            border: 1px solid #EEEEEE;
            border-radius: 8px;
        }

        .thumb-swiper .swiper-slide-thumb-active {
            border: 2px solid black !important;
            border-radius: 8px;
        }

        .main-swiper .swiper-slide img {
            max-width: 100%;
            width: 100%;
            height: 100%;
        }

        .main-swiper .swiper-slide-active {
            display: flex !important;
        }

        .thumb-swiper .swiper-slide-thumb-active {
            opacity: 1;
            border: 1px solid #F3F4F6;
            border-radius: 8px;
        }

        /* Custom Navigation Buttons */
        .custom-swiper-button-prev,
        .custom-swiper-button-next {
            width: 48px;
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            transition: background-color 0.3s ease;
            background-color: black;
            padding: 12px;
        }

        .custom-swiper-button-prev img,
        .custom-swiper-button-next img {
            width: 20px;
            height: 20px;
        }

        /* simplest, valid everywhere */
        @media (max-width: 450px) {

            .custom-swiper-button-prev,
            .custom-swiper-button-next {
                display: none;
            }

            .thumb-swiper-wrapper {
                width: 100%;
            }

            .thumb-swiper {
                height: 72px;
            }
        }

        /* simplest, valid everywhere */
        @media (max-width: 400px) {
            .thumb-swiper {
                height: 64px;
            }
        }
    </style>
    <style>
        .last-cta {}

        .cta-main {
            padding: 0;
            display: block !important;
            background-color: #161515;
            border-radius: 16px;
        }


        @media (max-width: 450px) {
            .cta-main {
                overflow: hidden !important;
            }

            .cta-main div.relative div.absolute {
                display: block;
                width: 128px;
                right: 0;
                transform: rotate(65deg);
                top: 14px;
                right: -46px;
                overflow: hidden !important;
            }

            .cta-main div.text-white {
                padding: 16px;
                min-height: 210px;
            }

            .cta-main .grid {
                gap: 0;
            }
        }
    </style>

    <style>
        .section-content {
            max-height: 0;
            overflow: hidden;
            transition: all 200ms ease-in-out;
            margin-top: -12px;
        }

        .section-content.active {
            max-height: 1000px;
            margin-top: 0px;
            transition: all 200ms ease-in-out;
        }

        .toggle-icon-plus {
            display: block;
        }

        .toggle-icon-minus {
            display: none;
        }

        .toggle-button.active .toggle-icon-plus {
            display: none;
        }

        .toggle-button.active .toggle-icon-minus {
            display: block;
        }

        span {
            font-family: 'DegularVariable', sans-serif !important;
        }

        #thumbnails {
            display: flex;
            flex-wrap: nowrap;
            gap: 1rem;
            overflow-x: auto;
            -ms-overflow-style: none;
            scrollbar-width: none;
        }

        #thumbnails::-webkit-scrollbar {
            display: none;
        }

        .thumbnail {
            flex: 0 0 auto;
            width: 72px;
            /* height: 72px; */
            border: 2px solid transparent;
            border-radius: 8px;
            cursor: pointer;
            object-fit: cover;
        }

        .thumbnail.active {
            border-color: black;
        }
    </style>

<?php else: ?>
    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

        <style>
            .section-content {
                max-height: 0;
                overflow: hidden;
                transition: all 200ms ease-in-out;
                margin-top: -12px;
            }

            .section-content.active {
                max-height: 1000px;
                margin-top: 0px;
                transition: all 200ms ease-in-out;
            }

            .toggle-icon-plus {
                display: block;
            }

            .toggle-icon-minus {
                display: none;
            }

            .toggle-button.active .toggle-icon-plus {
                display: none;
            }

            .toggle-button.active .toggle-icon-minus {
                display: block;
            }

            span {
                font-family: 'DegularVariable', sans-serif !important;
            }

            #thumbnails {
                display: flex;
                flex-wrap: nowrap;
                gap: 1rem;
                overflow-x: auto;
                -ms-overflow-style: none;
                scrollbar-width: none;
            }

            #thumbnails::-webkit-scrollbar {
                display: none;
            }

            .thumbnail {
                flex: 0 0 auto;
                width: 72px;
                /* height: 72px; */
                border: 2px solid transparent;
                border-radius: 8px;
                cursor: pointer;
                object-fit: cover;
            }

            .thumbnail.active {
                border-color: black;
            }
        </style>

        <div class="entry-content">
            <?php

            // Retrieve meta fields
            $image_post_gallery_raw = get_post_meta(get_the_ID(), 'cp_image_post_gallery', true);
            $main_gallery = get_post_meta(get_the_ID(), 'cp_main_gallery', true);
            $gallery_urls = !empty($main_gallery) ? array_map('trim', explode(',', $main_gallery)) : [];
            $features_desc = get_post_meta(get_the_ID(), 'cp_features_description', true);
            $features_items = get_post_meta(get_the_ID(), 'cp_features_items', true);
            $technical_desc = get_post_meta(get_the_ID(), 'cp_technical_data_description', true);
            $technical_items = get_post_meta(get_the_ID(), 'cp_technical_data_items', true);
            $spalvos_desc = get_post_meta(get_the_ID(), 'cp_spalvos_description', true);
            $spalvos_gallery = get_post_meta(get_the_ID(), 'cp_spalvos_image_gallery', true);
            $additional_img = get_post_meta(get_the_ID(), 'cp_additional_information_image', true);
            $additional_items = get_post_meta(get_the_ID(), 'cp_additional_information_items', true);
            ?>

            <section class="px-4 pb-10 sm:px-20 sm:pb-20">
                <button onclick="window.history.back();"
                    class="flex items-center self-start justify-center gap-2 my-8 text-base font-bold text-center text-black font-fam-1 whitespace-nowrap">
                    <img src="<?php echo LANGU_THEME_URI; ?>/assets/icons/arrow-left.svg" alt="Back arrow"
                        class="self-stretch object-contain w-6 my-auto shrink-0 aspect-square" />
                    <span class="self-stretch my-auto" style="font-family: 'DegularText-Bold' !important;">Grįžti</span>
                </button>

                <div class="flex flex-col items-center w-full gap-6 md:gap-12 sm:flex-row max-md:max-w-full">
                    <!-- Product Images -->
                    <div class="my-auto max-w-full md:max-w-[560px]">
                        <!-- ============== slider start ==================  -->
                        <!-- Main Slider -->
                        <div class="relative h-0">
                            <div
                                class="featured-chip flex relative gap-2 justify-center items-center px-3 py-2 mb-0 bg-[#027AFF] rounded-2xl max-md:mb-2.5  w-[64%] md:w-[200px] -bottom-[12px] md:-bottom-[24px] z-[90] left-[12px] md:left-[20px] h-[32px]">
                                <span class=" font-Degular my-auto text-[12px] text-white" style="letter-spacing: 1px;
  font-family: 'DegularText-Bold' !important;">Populiariausia prekė</span>
                                <img
                                    src="https://cdn.builder.io/api/v1/image/assets/TEMP/6181e7ae4354add9872ea79122957107dff5abe9024d542bcee51c57fd625145"
                                    alt="Popular badge icon" class="self-stretch object-contain w-4 my-auto shrink-0 aspect-square">
                            </div>
                        </div>
                        <div class="swiper main-swiper md:min-h-[520px] h-[343px] md:h-[520px]">
                            <div class="swiper-wrapper">
                                <?php
                                // Output thumbnails using the raw meta value
                                if (!empty($image_post_gallery_raw)) {
                                    $thumbs = explode(',', $image_post_gallery_raw);
                                    foreach ($thumbs as $thumb) {
                                        $thumb = trim($thumb);
                                        if (filter_var($thumb, FILTER_VALIDATE_URL)) {
                                ?>
                                            <div
                                                class="swiper-slide border border-[#F3F4F6] flex items-center justify-center rounded-[16px] p-[16px]">
                                                <img class="object-contain size-full p-[16px]" src="<?php echo esc_url($thumb); ?>" alt="">
                                            </div>
                                <?php
                                        }
                                    }
                                }
                                ?>
                            </div>
                        </div>

                        <!-- Thumbnail Gallery -->
                        <div class="flex justify-center">
                            <div class="thumb-swiper-wrapper mb-[24px]">
                                <!-- Left Button -->
                                <div class="custom-swiper-button-prev">
                                    <img
                                        src="https://cdn.builder.io/api/v1/image/assets/TEMP/26361eec8e578e9d020f0c37e0cdd97c6c141eada681ae562ab3519eac89c2b0"
                                        alt="Previous" />
                                </div>

                                <div class="swiper thumb-swiper">
                                    <div class="swiper-wrapper">

                                        <?php
                                        // Output thumbnails using the raw meta value
                                        if (!empty($image_post_gallery_raw)) {
                                            $thumbs = explode(',', $image_post_gallery_raw);
                                            foreach ($thumbs as $thumb) {
                                                $thumb = trim($thumb);
                                                if (filter_var($thumb, FILTER_VALIDATE_URL)) {
                                                    echo '<div class="flex items-center justify-center swiper-slide min-w-[56px]"><img src="' . esc_url($thumb) . '" alt="Gallery Thumbnail" class="thumbnail" /></div>';
                                                }
                                            }
                                        }
                                        ?>
                                    </div>
                                </div>

                                <!-- Right Button -->
                                <div class="custom-swiper-button-next">
                                    <img
                                        src="https://cdn.builder.io/api/v1/image/assets/TEMP/d16ce56173e655b7260abf8e914264174deb765a4eb94a0c6f4edf1790aaf122"
                                        alt="Next" />
                                </div>
                            </div>
                        </div>

                        <script>
                            document.addEventListener("DOMContentLoaded", () => {
                                // Initialize thumbnail slider first
                                const thumbnailSwiper = new Swiper(".thumb-swiper", {
                                    loop: true,
                                    slidesPerView: 5,
                                    spaceBetween: 16,
                                    watchSlidesProgress: true,
                                    centeredSlides: true,
                                    navigation: {
                                        nextEl: '.custom-swiper-button-next',
                                        prevEl: '.custom-swiper-button-prev',
                                    },
                                    breakpoints: {
                                        640: {
                                            slidesPerView: 5
                                        },
                                        768: {
                                            slidesPerView: 5
                                        },
                                        1024: {
                                            slidesPerView: 5
                                        },
                                    }
                                });

                                // Initialize main slider (linked to thumbnail slider)
                                const mainSwiper = new Swiper(".main-swiper", {
                                    loop: true,
                                    spaceBetween: 10,
                                    slidesPerView: 1,
                                    thumbs: {
                                        swiper: thumbnailSwiper,
                                    },
                                    pagination: {
                                        el: ".swiper-pagination",
                                        clickable: true,
                                    },
                                });
                            });
                        </script>

                        <style>
                            /* Main Slider */
                            .main-swiper {
                                width: 100%;
                                border-radius: 16px;
                                overflow: hidden;
                            }

                            .main-swiper .swiper-slide img {
                                width: 100%;
                                height: 100%;
                                object-fit: contain;
                            }

                            /* Thumbnail Gallery */
                            .thumb-swiper-wrapper {
                                display: flex;
                                align-items: center;
                                margin-top: 16px;
                                gap: 8px;
                                width: 80%;
                            }

                            .thumb-swiper {
                                width: 100%;
                                height: 56px;
                                overflow: hidden;
                            }

                            .thumb-swiper .swiper-slide {
                                max-width: 76px;
                                height: 100%;
                                opacity: 0.5;
                                transition: opacity 0.3s ease;
                                cursor: pointer;
                                border: 1px solid #EEEEEE;
                                border-radius: 8px;
                            }

                            .thumb-swiper .swiper-slide-thumb-active {
                                border: 2px solid black !important;
                                border-radius: 8px;
                            }

                            .main-swiper .swiper-slide img {
                                max-width: 100%;
                                width: 100%;
                                height: 100%;
                            }

                            .main-swiper .swiper-slide-active {
                                display: flex !important;
                            }

                            .thumb-swiper .swiper-slide-thumb-active {
                                opacity: 1;
                                border: 1px solid #F3F4F6;
                                border-radius: 8px;
                            }

                            /* Custom Navigation Buttons */
                            .custom-swiper-button-prev,
                            .custom-swiper-button-next {
                                width: 48px;
                                border-radius: 12px;
                                display: flex;
                                align-items: center;
                                justify-content: center;
                                cursor: pointer;
                                transition: background-color 0.3s ease;
                                background-color: black;
                                padding: 12px;
                            }

                            .custom-swiper-button-prev img,
                            .custom-swiper-button-next img {
                                width: 20px;
                                height: 20px;
                            }

                            /* simplest, valid everywhere */
                            @media (max-width: 450px) {

                                .custom-swiper-button-prev,
                                .custom-swiper-button-next {
                                    display: none;
                                }

                                .thumb-swiper-wrapper {
                                    width: 100%;
                                }

                                .thumb-swiper {
                                    height: 72px;
                                }
                            }

                            /* simplest, valid everywhere */
                            @media (max-width: 400px) {
                                .thumb-swiper {
                                    height: 64px;
                                }
                            }
                        </style>

                        <script>
                            document.addEventListener("DOMContentLoaded", () => {
                                // Initialize thumbnail slider first
                                const thumbnailSwiper = new Swiper(".thumb-swiper", {
                                    loop: true,
                                    slidesPerView: 5,
                                    spaceBetween: 10,
                                    freeMode: true,
                                    watchSlidesProgress: true,
                                    breakpoints: {
                                        640: {
                                            slidesPerView: 5
                                        },
                                        768: {
                                            slidesPerView: 6
                                        },
                                        1024: {
                                            slidesPerView: 7
                                        },
                                    }
                                });

                                // Initialize main slider (linked to thumbnail slider)
                                const mainSwiper = new Swiper(".main-swiper", {
                                    loop: true,
                                    spaceBetween: 10,
                                    slidesPerView: 1,
                                    thumbs: {
                                        swiper: thumbnailSwiper,
                                    },
                                });

                                // Sync main slider when clicking the navigation buttons
                                document.querySelector('.custom-swiper-button-prev').addEventListener('click', () => {
                                    thumbnailSwiper.slidePrev();
                                    mainSwiper.slidePrev(); // Sync main slider with thumbnail
                                });

                                document.querySelector('.custom-swiper-button-next').addEventListener('click', () => {
                                    thumbnailSwiper.slideNext();
                                    mainSwiper.slideNext(); // Sync main slider with thumbnail
                                });
                            });
                        </script>
                        <!-- ============== slider end ==================  -->
                    </div>


                    <!-- Product Details -->
                    <div class="flex flex-col gap-6 text-lg text-black max-md:max-w-full">
                        <div class="flex flex-col gap-6 text-lg text-black max-md:max-w-full">
                            <div
                                class="flex flex-wrap items-center justify-around w-full gap-6 text-sm font-bold leading-loose text-center rounded-lg font-fam-1 sm:justify-start max-md:max-w-full">
                                <div class="flex flex-col-reverse items-center self-stretch gap-1 my-auto sm:flex-row">
                                    <p class="self-stretch my-auto font-degular-bold">10 metų garantija</p>
                                    <div class="flex items-center justify-center w-full sm:w-fit">
                                        <img
                                            src="https://cdn.builder.io/api/v1/image/assets/TEMP/113a20252b5d45b9d3b33f82f534e02c15e6cef67238f11b3c8b90370257b270?placeholderIfAbsent=true&apiKey=dae2151c29344c8b913745d4df937d8c"
                                            alt="Warranty icon" class="self-stretch object-contain w-4 my-auto shrink-0 aspect-square" />
                                    </div>
                                </div>
                                <div class="flex flex-col-reverse items-center self-stretch gap-1 my-auto sm:flex-row">
                                    <p class="self-stretch my-auto font-degular-bold">Aukšta kokybė</p>
                                    <div class="flex items-center justify-center w-full sm:w-fit">
                                        <img
                                            src="https://cdn.builder.io/api/v1/image/assets/TEMP/f54b1da5dbeafbd2886d590797c1e8671146277117f076db6f8ab90219fcb685?placeholderIfAbsent=true&apiKey=dae2151c29344c8b913745d4df937d8c"
                                            alt="Quality icon" class="self-stretch object-contain w-4 my-auto shrink-0 aspect-square" />
                                    </div>
                                </div>
                                <div class="flex flex-col-reverse items-center self-stretch gap-1 my-auto sm:flex-row">
                                    <p class="self-stretch my-auto font-degular-bold">Dėmesys ekologijai</p>
                                    <div class="flex items-center justify-center w-full sm:w-fit">
                                        <img
                                            src="https://cdn.builder.io/api/v1/image/assets/TEMP/10f235012cf17197f32c0191613407582ba42daf27245a15944068eba1c0116c?placeholderIfAbsent=true&apiKey=dae2151c29344c8b913745d4df937d8c"
                                            alt="Ecology icon" class="self-stretch object-contain w-4 my-auto shrink-0 aspect-square" />
                                    </div>
                                </div>
                            </div>
                            <!-- Title -->
                            <h1 class="text-3xl leading-none font-fam-2 max-md:max-w-full font-erbaum-regular">
                                <?php the_title(); ?>
                            </h1>
                            <!-- Description -->
                            <div class="font-fam-3 text-[18px] leading-[26px] max-md:max-w-full">
                                <?php the_content(); ?>
                            </div>
                            <!-- Example Features List -->
                            <ul class="max-w-full flex flex-col gap-2 leading-none w-[564px]">
                                <?php
                                $features_items = get_post_meta(get_the_ID(), 'cp_features_items', true);
                                if (!empty($features_items) && is_array($features_items)) {
                                    foreach ($features_items as $item) {
                                        $title = $item['title'] ?? '';
                                        echo '<li class=" flex flex-wrap gap-[16px] items-center w-full max-md:max-w-full">';
                                        echo '<img src="https://cdn.builder.io/api/v1/image/assets/TEMP/7f7018db77a35f783fb5a3fd231ae6392ee40c9fe7ee80873b46ea0775c43310" alt="Checkmark" class="object-contain shrink-0 self-stretch my-auto w-[24px] aspect-square" />';
                                        echo '<span class="self-stretch my-auto degular-light">' . esc_html($title) . '</span>';
                                        echo '</li>';
                                    }
                                }
                                ?>
                            </ul>
                            <!-- CTA Button -->
                            <button
                                class="gap-2.5 self-stretch p-4 max-w-full h-[58px] font-bold leading-none text-center bg-amber-400 rounded-2xl w-[400px]">
                                Gauti pasiūlymą
                            </button>
                        </div>
                    </div>
            </section>


            <section class="flex flex-col px-4 py-10 gap-6 md:gap-14 sm:p-20 bg-neutral-100">
                <div class="flex flex-col gap-2 md:gap-4">
                    <h2 class="md:text-3xl text-[24px] leading-10 text-black max-sm:leading-9">
                        Softline langų ypatybės
                    </h2>
                    <p class="text-lg leading-7 text-black max-sm:text-base max-sm:leading-6">
                        <?php echo $features_desc; ?>
                    </p>
                </div>

                <div
                    class="grid gap-14 grid-cols-[repeat(3,1fr)] md:gap-y-[56px] md:gap-x-[48px] max-md:grid-cols-[repeat(2,1fr)] max-sm:gap-4 max-sm:grid-cols-[1fr]">
                    <?php if (!empty($features_items) && is_array($features_items)): ?>
                        <?php foreach ($features_items as $item):
                            $title = $item['title'] ?? '';
                            $icon = $item['icon'] ?? '';
                            $description = $item['description'] ?? '';
                        ?>

                            <article>
                                <!-- Mobile Layout -->
                                <div class="sm:hidden flex flex-col gap-1">
                                    <!-- Icon & Title Row -->
                                    <div class="flex items-center gap-4">
                                        <?php if ($icon): ?>
                                            <img src="<?php echo esc_url($icon); ?>" alt="<?php echo esc_attr($title); ?>" class="feature-icon"
                                                style="width: 40px; height: 40px;" />
                                        <?php else: ?>
                                            <svg width="40" height="40" viewBox="0 0 40 40" fill="none" xmlns="http://www.w3.org/2000/svg"
                                                class="feature-icon" style="width: 40px; height: 40px">
                                                <circle cx="20" cy="20" r="18" stroke="black" stroke-width="2" />
                                            </svg>
                                        <?php endif; ?>

                                        <h3 class="text-xl leading-7 text-black max-sm:text-lg max-sm:leading-7">
                                            <?php echo esc_html($title); ?>
                                        </h3>
                                    </div>

                                    <!-- Description Row -->
                                    <p class="text-[14px] leading-[26px] text-black max-sm:text-base max-sm:leading-6">
                                        <?php echo wp_kses_post($description); ?>
                                    </p>
                                </div>

                                <!-- Desktop Layout (Original) -->
                                <div class="hidden sm:flex items-start gap-6">
                                    <div>
                                        <?php if ($icon): ?>
                                            <img src="<?php echo esc_url($icon); ?>" alt="<?php echo esc_attr($title); ?>" class="feature-icon"
                                                style="width: 40px; height: 40px;" />
                                        <?php else: ?>
                                            <svg width="40" height="40" viewBox="0 0 40 40" fill="none" xmlns="http://www.w3.org/2000/svg"
                                                class="feature-icon" style="width: 40px; height: 40px">
                                                <circle cx="20" cy="20" r="18" stroke="black" stroke-width="2" />
                                            </svg>
                                        <?php endif; ?>
                                    </div>

                                    <div class="flex flex-col flex-1 gap-2">
                                        <h3 class="text-xl leading-7 text-black max-sm:text-lg max-sm:leading-7">
                                            <?php echo esc_html($title); ?>
                                        </h3>
                                        <p class="text-lg leading-[26px] text-black max-sm:text-base max-sm:leading-6">
                                            <?php echo wp_kses_post($description); ?>
                                        </p>
                                    </div>
                                </div>
                            </article>

                        <?php endforeach; ?>
                    <?php else: ?>
                        <p>No features available.</p>
                    <?php endif; ?>
                </div>

            </section>

            <section class="flex flex-col items-center px-4 py-6 md:py-10 bg-white sm:flex-row gap-14 sm:p-20">
                <div class="flex flex-col w-full gap-8 text-black sm:w-1/2">
                    <div class="w-full">
                        <h2 class="text-[32px] md:text-3xl leading-10 max-md:max-w-full">
                            Techniniai duomenys
                        </h2>
                        <p class="mt-4 text-lg leading-7 max-md:max-w-full">
                            <?php echo $technical_desc; ?>
                        </p>
                    </div>
                    <button
                        class="hidden sm:block gap-2.5 self-stretch p-4 max-w-full text-lg font-bold leading-none text-center bg-amber-400 rounded-2xl w-[400px]">
                        Gauti pasiūlymą
                    </button>
                </div>

                <div class="flex flex-col items-center pb-10 w-full gap-[24px] sm:w-1/2">
                    <?php if (!empty($technical_items) && is_array($technical_items)): ?>
                        <div
                            class="flex flex-col w-full gap-2 p-4 text-lg text-white bg-black sm:gap-6 sm:py-14 sm:pb-16 sm:px-10 rounded-2xl">
                            <?php foreach ($technical_items as $t_item):
                                $text = $t_item['text'] ?? '';
                                $value = $t_item['value'] ?? '';
                            ?>
                                <!-- Single Item -->
                                <div class="w-full">
                                    <a class="text-[16px] md:text-[18px]"><?php echo esc_html($text); ?>: </a>
                                    <span><?php echo esc_html($value); ?></span>
                                </div>
                                <hr class="w-full bg-zinc-800 border-zinc-800 min-h-px max-md:max-w-full"
                                    style="border-bottom: 1/2px solid #292929;" />
                            <?php endforeach; ?>
                        </div>
                    <?php else: ?>
                        <p>No technical data available.</p>
                    <?php endif; ?>

                    <button
                        class="block sm:hidden gap-2.5 self-stretch p-4 text-lg font-bold leading-none text-center bg-amber-400 rounded-2xl w-full">
                        Gauti pasiūlymą
                    </button>
                </div>
            </section>

            <section class="flex flex-col px-4 py-10 mx-auto gap-6 md:gap-14 sm:px-20 sm:py-24 max-w-none bg-neutral-100">
                <div class="flex flex-col gap-4 sm:gap-2">
                    <h2 class="text-3xl leading-10 text-black max-sm:text-[24px] max-sm:leading-9">
                        Spalvos
                    </h2>
                    <p class="text-lg leading-7 text-black max-sm:text-base max-sm:leading-6">
                        <?php echo $spalvos_desc; ?>
                    </p>
                </div>
                <?php
                // Split the comma-separated list into an array
                $image_urls = !empty($spalvos_gallery) ? explode(',', $spalvos_gallery) : [];

                if (!empty($image_urls)): ?>
                    <div id='pattern-palette' class=" grid grid-cols-5 pb-2 md:pb-0 md:gap-3 gap-[8px] md:flex md:flex-wrap">
                        <?php foreach ($image_urls as $url):
                            $url = trim($url); // Remove any extra spaces
                            if (filter_var($url, FILTER_VALIDATE_URL)): ?>
                                <div class="md:w-20 w-[56px] md:h-20 h-[56px] overflow-hidden rounded-[8px] cursor-pointer">
                                    <img src="<?php echo esc_url($url); ?>" alt="Pattern" class="object-cover w-full h-full" />
                                </div>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    </div>
                <?php else: ?>
                    <p>No patterns available.</p>
                <?php endif; ?>

            </section>

            <section
                class="flex flex-col items-start justify-center w-full gap-6 px-4 py-10 bg-white sm:flex-row sm:gap-12 sm:p-20">
                <div class="flex flex-col items-start flex-1 gap-6">
                    <h2 class="w-full text-3xl leading-10 text-black max-md:text-3xl max-sm:text-2xl">
                        Papildoma informacija
                    </h2>

                    <div id="info-container" class="flex flex-col items-center justify-around w-full gap-4">
                        <?php if (!empty($additional_items) && is_array($additional_items)): ?>
                            <?php foreach ($additional_items as $index => $a_item):
                                $title = $a_item['title'] ?? '';
                                $description = $a_item['description'] ?? '';
                            ?>
                                <div
                                    class="flex flex-col items-center w-full gap-4 p-6 bg-white border rounded-xl border-zinc-100 max-sm:p-4">
                                    <div class="flex items-center justify-between w-full gap-4">
                                        <div class="text-lg font-bold text-black" style="font-family: degular;"><?php echo esc_html($title); ?>
                                        </div>
                                        <button type="button"
                                            class="toggle-button flex justify-center items-center p-2 w-8 bg-amber-400 rounded-2xl <?php echo ($index === 0) ? 'active' : ''; ?>"
                                            aria-expanded="<?php echo ($index === 0) ? 'true' : 'false'; ?>"
                                            aria-controls="info-<?php echo $index; ?>-content">
                                            <span class="toggle-icon-plus">
                                                <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg"
                                                    class="w-[16px] h-[16px]">
                                                    <path
                                                        d="M14 8C14 8.13261 13.9473 8.25979 13.8536 8.35355C13.7598 8.44732 13.6326 8.5 13.5 8.5H8.5V13.5C8.5 13.6326 8.44732 13.7598 8.35355 13.8536C8.25979 13.9473 8.13261 14 8 14C7.86739 14 7.74021 13.9473 7.64645 13.8536C7.55268 13.7598 7.5 13.6326 7.5 13.5V8.5H2.5C2.36739 8.5 2.24021 8.44732 2.14645 8.35355C2.05268 8.25979 2 8.13261 2 8C2 7.86739 2.05268 7.74021 2.14645 7.64645C2.24021 7.55268 2.36739 7.5 2.5 7.5H7.5V2.5C7.5 2.36739 7.55268 2.24021 7.64645 2.14645C7.74021 2.05268 7.86739 2 8 2C8.13261 2 8.25979 2.05268 8.35355 2.14645C8.44732 2.24021 8.5 2.36739 8.5 2.5V7.5H13.5C13.6326 7.5 13.7598 7.55268 13.8536 7.64645C13.9473 7.74021 14 7.86739 14 8Z"
                                                        fill="black"></path>
                                                </svg>
                                            </span>
                                            <span class="toggle-icon-minus">
                                                <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg"
                                                    class="w-[16px] h-[16px]">
                                                    <path
                                                        d="M14 8C14 8.13261 13.9473 8.25979 13.8536 8.35355C13.7598 8.44732 13.6326 8.5 13.5 8.5H2.5C2.36739 8.5 2.24021 8.44732 2.14645 8.35355C2.05268 8.25979 2 8.13261 2 8C2 7.86739 2.05268 7.74021 2.14645 7.64645C2.24021 7.55268 2.36739 7.5 2.5 7.5H13.5C13.6326 7.5 13.7598 7.55268 13.8536 7.64645C13.9473 7.74021 14 7.86739 14 8Z"
                                                        fill="black"></path>
                                                </svg>
                                            </span>
                                        </button>
                                    </div>
                                    <?php if (!empty($description)): ?>
                                        <div id="info-<?php echo $index; ?>-content"
                                            class="section-content w-full <?php echo ($index === 0) ? 'active' : ''; ?>">
                                            <p><?php echo wp_kses_post($description); ?></p>
                                        </div>
                                    <?php endif; ?>

                                </div>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <p>No additional information available.</p>
                        <?php endif; ?>
                    </div>
                </div>

                <div
                    class="flex justify-center items-center bg-white rounded-2xl border border-zinc-100 mx-auto h-[560px] w-[560px] max-md:h-[400px] max-md:w-[400px] max-sm:w-[343px] max-sm:h-[343px]">
                    <img src="<?php echo $additional_img; ?>" alt="Product image"
                        class="w-full h-full object-contain rounded-[16px] border-[1px] border-[#F3F4F6]" />
                </div>
            </section>

            <?php if (!empty($gallery_urls) && count($gallery_urls) > 0): ?>
                <section class="flex flex-col items-center w-full gap-6 px-4 py-10 bg-black sm:gap-14 sm:px-20 sm:py-24">
                    <h2 class="self-stretch text-3xl leading-10 text-white max-sm:text-2xl max-sm:leading-8">
                        Galerija
                    </h2>

                    <div id="gallery-container" class="flex flex-col items-center justify-center w-full gap-4 sm:flex-row sm:gap-6">

                        <!-- Left Side (Large Image) -->
                        <?php if (!empty($gallery_urls[0])): ?>
                            <div class="w-full sm:w-1/2 md:h-[560px]">
                                <img src="<?php echo esc_url($gallery_urls[0]); ?>" alt="Gallery Image"
                                    class="object-cover w-full h-[93vw] md:h-full md:h-[520px] rounded-2xl cursor-pointer" onclick="openGallery(0)" />
                            </div>
                        <?php endif; ?>

                        <!-- Right Side (Grid of Smaller Images) -->
                        <div class="grid w-full grid-cols-2 gap-4 sm:w-1/2 sm:gap-6">
                            <?php
                            for ($i = 1; $i < count($gallery_urls) && $i <= 4; $i++):
                                if (!empty($gallery_urls[$i])): ?>
                                    <img src="<?php echo esc_url($gallery_urls[$i]); ?>" alt="Gallery Thumbnail"
                                        class="object-cover w-full h-[44vw] md:h-[268px] rounded-2xl cursor-pointer"
                                        onclick="openGallery(<?php echo $i; ?>)" />
                            <?php endif;
                            endfor; ?>
                        </div>
                    </div>
                </section>

                <!-- Hidden Swiper for Fullscreen Gallery -->
                <div id="fullscreen-gallery"
                    class="fixed inset-0 z-[9999999] flex-col items-center justify-center hidden bg-black bg-opacity-90">
                    <div class="absolute top-4 right-4">
                        <button onclick="closeGallery()" class="text-3xl text-white">
                            <?php echo file_get_contents(LANGU_THEME_URI . "/assets/icons/svg/close-btn.svg"); ?>

                        </button>
                    </div>

                    <!-- Swiper Container -->
                    <div class="relative w-[40vh] md:w-[72vw] h-[50vh] md:h-[688px] swiper gallery-swiper">
                        <div class="swiper-wrapper">
                            <?php foreach ($gallery_urls as $url): ?>
                                <div class="flex items-center justify-center w-full md:p-8 swiper-slide">
                                    <img src="<?php echo esc_url($url); ?>" alt="Gallery Slide"
                                        class="object-cover w-full h-full md:rounded-[16px]" />
                                </div>
                            <?php endforeach; ?>
                        </div>


                    </div>
                    <!-- Navigation Buttons -->
                    <div class="">
                        <div
                            class="absolute bottom-10 md:top-1/2 custom-swiper-prev flex bg-yellow items-center justify-center w-12 h-12 text-black !rounded-[16px] bg-yellow left-[30%] md:left-[8%]"
                            style="border-radius: 12px !important;">
                            <!-- Arrow Icon -->
                            <img class="w-6" src="<?php echo LANGU_THEME_URI . "/assets/icons/arrow-left.png"; ?>" alt="">
                        </div>
                        <span id="product-counter" class="font-bold text-white bottom-[50px] md:hidden right-[47%] absolute">0/0</span>
                        <div
                            class="absolute right-[30%] md:right-[8%] bottom-10 md:top-1/2 custom-swiper-next flex bg-yellow items-center justify-center w-12 h-12 text-black !rounded-[16px] bg-yellow"
                            style="border-radius: 12px !important;">
                            <!-- Arrow Icon -->
                            <img class="w-6" src="<?php echo LANGU_THEME_URI . "/assets/icons/arrow-right.png"; ?>" alt="">

                        </div>


                    </div>
                </div>
            <?php endif; ?>

            <!-- ============================================ -->

            <section class="flex flex-col gap-6 px-4 py-10 mx-auto sm:gap-14 sm:p-20 max-w-none bg-neutral-100">

                <!-- title and navigation arrows -->
                <div class="flex flex-row items-center justify-between">
                    <h2 class="text-3xl leading-10 text-black">Panašūs gaminiai</h2>
                    <div class="flex gap-2 sm:gap-6 max-sm:self-end">
                        <button class="flex items-center justify-center w-12 h-12 cursor-pointer bg-amber-400 rounded-[16px]"
                            aria-label="Previous product">
                            <img class="w-6" src='<?php echo LANGU_THEME_URI . "/assets/icons/arrow-left.svg"; ?>' alt="">
                        </button>
                        <button class="flex items-center justify-center w-12 h-12 cursor-pointer bg-amber-400 rounded-[16px]"
                            aria-label="Next product">
                            <img class="w-6 rotate-0" src='<?php echo LANGU_THEME_URI . "/assets/icons/arrow-right.svg"; ?>' alt="">
                        </button>
                    </div>
                </div>


                <?php
                // Get current post ID and related terms from the custom taxonomy
                $current_post_id = get_the_ID();
                $related_terms = wp_get_post_terms($current_post_id, 'produkcija_category', ['fields' => 'ids']);

                // Set up the query arguments to fetch related posts
                $related_args = [
                    'post_type' => 'produkcija',
                    'posts_per_page' => 16,
                    'post__not_in' => [$current_post_id],
                    'tax_query' => [
                        [
                            'taxonomy' => 'produkcija_category',
                            'field' => 'term_id',
                            'terms' => $related_terms,
                            'operator' => 'IN',
                        ],
                    ],
                ];

                $related_query = new WP_Query($related_args);
                ?>

                <!-- SWIPER CONTAINER -->
                <div id="product-container"
                    class="flex w-full py-4 bg-gray-100 product-container swiper sm:items-center sm:justify-center">
                    <div class="flex-row swiper-wrapper">
                        <?php if ($related_query->have_posts()):
                            while ($related_query->have_posts()):
                                $related_query->the_post();
                                $title = get_the_title();
                                $trimmed = wp_html_excerpt($title, 200, '…');
                        ?>
                                <div
                                    class="flex flex-col justify-between items-center h-full w-full swiper-slide max-w-full min-h-[265px] md:min-h-[444px]">
                                    <?php if (has_post_thumbnail()): ?>
                                        <div class="bg-white p-4 rounded-[16px] min-w-[100%] border border-gray-200">
                                            <img src="<?= esc_url(get_the_post_thumbnail_url(get_the_ID(), 'medium')) ?>"
                                                alt="<?= the_title_attribute(['echo' => false]) ?>"
                                                class="w-full h-[150px] md:h-[250px] object-contain rounded-[16px] " />
                                        </div>
                                    <?php endif; ?>
                                    <h3 class="mt-4 text-[14px] md:text-[18px] font-bold text-center text-black">
                                        <?php echo esc_html($trimmed); ?>
                                    </h3>
                                    <a href="<?= get_the_permalink() ?>" class="w-full mt-4">
                                        <button
                                            class="w-full px-[16px] py-[8px] md:p-[16px] text-sm font-bold text-white transition-colors bg-black rounded-[16px] hover:bg-gray-800 leading-[26px]">
                                            Daugiau informacijos
                                        </button>
                                    </a>
                                </div>
                            <?php endwhile;
                            wp_reset_postdata();
                        else: ?>
                            <p class="text-black">No related products found.</p>
                        <?php endif; ?>
                    </div>
                </div>

                <script>
                    document.addEventListener("DOMContentLoaded", () => {

                        const swiper = new Swiper(".product-container", {
                            loop: true,
                            spaceBetween: 24,
                            slidesPerView: 1,
                            navigation: {
                                prevEl: '[aria-label="Previous product"]',
                                nextEl: '[aria-label="Next product"]',
                            },
                            breakpoints: {
                                350: {
                                    slidesPerView: 2,
                                    spaceBetween: 8,
                                },
                                768: {
                                    slidesPerView: 3
                                },
                                1024: {
                                    slidesPerView: 4,
                                    spaceBetween: 24,
                                },
                            }
                        });

                    });
                </script>

                <!-- ========================================== -->

                <!-- Contact/Consultation section -->
                <?php
                echo do_shortcode('[feedback_cta 
     title="Reikia konsultacijos ar patarimo?
     Klauskite!" 
     description="Jūsų grįžtamasis ryšys leidžia mums augti ir gerinti jūsų patirtį." 
     button_text="Susisiekti" 
     button_url="/gauti_pasiulyma"]');
                ?>
            </section>

        </div>
    </article>


    <style>
        .featured-chip {
            font-family: Degular;
            font-size: 12px;
            font-style: normal;
            font-weight: 700;
            line-height: 18px;
            text-transform: uppercase;
            text-transform: uppercase;
            position: absolute;
            left: 24px;
            top: 24px;
        }

        #product-container .swiper-slide {
            display: flex !important;
        }

        @media (max-width: 450px) {
            .swiper.gallery-swiper {
                margin: 0 !important;
                width: 100%;
            }
        }
    </style>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            let gallerySwiper;
            const counterEl = document.querySelector("#product-counter");

            window.openGallery = (startIndex) => {
                const fullscreen = document.getElementById('fullscreen-gallery');

                fullscreen.classList.remove('hidden');
                fullscreen.classList.add('flex');

                if (!gallerySwiper) {
                    gallerySwiper = new Swiper('.gallery-swiper', {
                        loop: true,
                        navigation: {
                            nextEl: '.custom-swiper-next',
                            prevEl: '.custom-swiper-prev'
                        }
                    });

                    gallerySwiper.on("slideChange", () => {
                        updateCounter();
                    })
                }

                gallerySwiper.slideTo(startIndex, 0);

            };

            function updateCounter() {
                const total = Array.from(document.querySelectorAll("#product-container .swiper-slide")).length;
                counterEl.innerHTML = `<span class="text-yellow">${gallerySwiper.realIndex + 1}</span>/${total}`;
            }

            window.closeGallery = () => {
                document.getElementById('fullscreen-gallery').classList.add('hidden');
                document.getElementById('fullscreen-gallery').classList.remove('flex');
            };

            document.addEventListener('keydown', e => {
                if (e.key === 'Escape') closeGallery();
            });
        });
    </script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Select all accordion toggle buttons.
            const toggleButtons = document.querySelectorAll('.toggle-button');

            toggleButtons.forEach(button => {
                button.addEventListener('click', function() {
                    // Get the ID of the content container from aria-controls.
                    const targetId = this.getAttribute('aria-controls');
                    const targetContent = document.getElementById(targetId);
                    const isExpanded = this.getAttribute('aria-expanded') === 'true';

                    // Collapse all accordion items.
                    toggleButtons.forEach(btn => {
                        btn.setAttribute('aria-expanded', 'false');
                        btn.classList.remove('active');
                        const contentId = btn.getAttribute('aria-controls');
                        const contentEl = document.getElementById(contentId);
                        if (contentEl) {
                            contentEl.classList.remove('active');
                        }
                        // Toggle icons: show plus, hide minus.
                        const plusIcon = btn.querySelector('.toggle-icon-plus');
                        const minusIcon = btn.querySelector('.toggle-icon-minus');
                        if (plusIcon) plusIcon.style.display = 'block';
                        if (minusIcon) minusIcon.style.display = 'none';
                    });

                    // If the clicked button was not already expanded, expand it.
                    if (!isExpanded) {
                        this.setAttribute('aria-expanded', 'true');
                        this.classList.add('active');
                        targetContent.classList.add('active');

                        // Toggle icons: hide plus, show minus.
                        const plusIcon = this.querySelector('.toggle-icon-plus');
                        const minusIcon = this.querySelector('.toggle-icon-minus');
                        if (plusIcon) plusIcon.style.display = 'none';
                        if (minusIcon) minusIcon.style.display = 'block';
                    }
                });
            });
        });
    </script>

    <style>
        .last-cta {}

        .cta-main {
            padding: 0;
            display: block !important;
            background-color: #161515;
            border-radius: 16px;
        }


        @media (max-width: 450px) {
            .cta-main {
                overflow: hidden !important;
            }

            .cta-main div.relative div.absolute {
                display: block;
                width: 128px;
                right: 0;
                transform: rotate(65deg);
                top: 14px;
                right: -46px;
                overflow: hidden !important;
            }

            .cta-main div.text-white {
                padding: 16px;
                min-height: 210px;
            }

            .cta-main .grid {
                gap: 0;
            }
        }
    </style>

<?php endif; ?>