<?php
$section_title = get_sub_field('section_title');
$sub_title = get_sub_field('sub_heading');

$button_1 = get_sub_field('button_1');
$heading_feedback = get_sub_field('heading_feedback');
$description_feedback = get_sub_field('description_feedback');

$add_custom_class = get_sub_field('add_custom_class');
?>
<section id="atsiliepimai_section" class="<?php echo acf_esc_html($add_custom_class); ?>">
    <section class="md:gap-12 gap-2 flex flex-col bg-white items-center py-10 px-4 md:p-20">
        <div class="flex flex-col flex-grow text-black gap-2 md:gap-4">
            <h2 class="text-[28px] leading-8 md:leading-[48px] md:text-[40px] text-center">
                <?php echo esc_html($section_title); ?>
            </h2>
            <p class="leading-6 md:leading-6.5 text-[16px] md:text-[18px] text-center">
                <?php echo esc_html($sub_title); ?>
            </p>
        </div>

        <div class="w-full flex flex-col items-center justify-end">
            <?php if ($button_1): ?>
                <a
                    href="<?php echo esc_url($button_1['url']); ?>"
                    class="px-4 py-3 bg-[#FFCC32] w-full md:w-[220px] w-full text-black text-center rounded-[16px] hover:bg-[#FFCC32]">
                    <?php echo esc_html($button_1['title']); ?>
                </a>
            <?php endif; ?>
        </div>
    </section>

    <!--Atsiliepimai section -->
    <section class=" bg-[#F6F6F6] py-10 md:py-20 px-4 md:px-10">
        <div class="mx-auto max-w-[1440px]">
            <div class="text-center">
                <h2 class="text-4xl text-black font-erbaum-regular">
                    <?php echo esc_html($heading_feedback); ?>
                </h2>
                <div class="text-black text-base md:text-lg degular-light text-[18px] py-[12px]">
                    <?php echo esc_html($description_feedback); ?>
                </div>
            </div>

            <div class="reviewbox flex items-center justify-center gap-4 mb-8 md:space-y-0 md:space-x-2 flex-row">
                <div class="flex -space-x-4">
                    <img class="w-[40px] md:w-[48px] h-[40px] md:h-[48px] rounded-full border-2 border-white mr-0 object-cover"
                        src="<?php echo esc_url(LANGU_THEME_URI . '/assets/images/home/f4.jpeg'); ?>" alt="User 1" />
                    <img class="w-[40px] md:w-[48px] h-[40px] md:h-[48px] rounded-full border-2 border-white object-cover"
                        src="<?php echo esc_url(LANGU_THEME_URI . '/assets/images/home/f2.jpeg'); ?>" alt="User 2" />
                    <img class="w-[40px] md:w-[48px] h-[40px] md:h-[48px] rounded-full border-2 border-white object-cover"
                        src="<?php echo esc_url(LANGU_THEME_URI . '/assets/images/home/f3.jpeg'); ?>" alt="User 3" />
                    <img class="w-[40px] md:w-[48px] h-[40px] md:h-[48px] rounded-full border-2 border-white object-cover "
                        src="<?php echo esc_url(LANGU_THEME_URI . '/assets/images/home/f1.jpg'); ?>" alt="User 4" />
                    <img class="w-[40px] md:w-[48px] h-[40px] md:h-[48px] rounded-full border-2 border-white object-cover"
                        src="<?php echo esc_url(LANGU_THEME_URI . '/assets/images/home/f5.jpeg'); ?>" alt="User 5" />
                </div>

                <!-- Rating -->
                <div class="flex justify-center gap-2  ">
                    <div class="flex items-center md:space-x-2 ">
                        <!-- Star icon: replace with your own if desired -->
                        <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 32 32" fill="none">
                            <path
                                d="M29.8966 12.1573C29.7716 11.773 29.5356 11.4342 29.2184 11.1838C28.9012 10.9333 28.517 10.7823 28.1141 10.7498L20.7391 10.1548L17.8916 3.26858C17.7376 2.89335 17.4755 2.57239 17.1386 2.3465C16.8018 2.12061 16.4053 2 15.9997 2C15.5941 2 15.1977 2.12061 14.8608 2.3465C14.5239 2.57239 14.2619 2.89335 14.1079 3.26858L11.2629 10.1536L3.88411 10.7498C3.48058 10.784 3.09609 10.9364 2.77883 11.1881C2.46156 11.4398 2.22561 11.7795 2.10056 12.1646C1.9755 12.5498 1.9669 12.9633 2.07581 13.3534C2.18473 13.7434 2.40634 14.0927 2.71286 14.3573L8.33786 19.2111L6.62411 26.4686C6.52826 26.8629 6.55173 27.2767 6.69153 27.6577C6.83133 28.0386 7.08116 28.3694 7.40931 28.608C7.73745 28.8467 8.12912 28.9825 8.53458 28.9982C8.94004 29.0139 9.34102 28.9087 9.68661 28.6961L15.9991 24.8111L22.3154 28.6961C22.6611 28.9062 23.0612 29.0093 23.4654 28.9925C23.8696 28.9756 24.2598 28.8395 24.5869 28.6014C24.9139 28.3632 25.1631 28.0336 25.3032 27.6541C25.4433 27.2746 25.468 26.8621 25.3741 26.4686L23.6541 19.2098L29.2791 14.3561C29.5881 14.0919 29.8117 13.7419 29.9217 13.3504C30.0316 12.959 30.0229 12.5438 29.8966 12.1573Z"
                                fill="#FFCC32" />
                        </svg>
                    </div>

                    <!-- Rating Subtitle -->
                    <div class="flex flex-col">
                        <span class="text-[24px] text-black font-erbaum-regular"><?php echo esc_html(get_theme_mod('topbar_rating')); ?> IŠ 5</span>
                        <p class="text-sm text-black degular">Klientų įvertinimas</p>
                    </div>
                </div>
            </div>

            <!-- Testimonial Cards -->
            <?php
            $testimonials = new WP_Query([
                'post_type'      => 'atsiliepimai',
                'posts_per_page' => 6,
                'post_status'    => 'publish',
            ]);

            if ($testimonials->have_posts()) : ?>
                <div class="md:w-[1280px] mx-auto grid grid-cols-1 gap-4 md:gap-6 md:grid-cols-3 degular-light">
                    <?php while ($testimonials->have_posts()) : $testimonials->the_post();
                        $feedback = get_post_meta(get_the_ID(), 'cp_atsiliepimai_feedback', true);
                        $name     = get_post_meta(get_the_ID(), 'cp_atsiliepimai_name', true);
                    ?>
                        <div class="md:w-[410px] p-4 md:p-6 bg-white rounded-lg shadow-sm">
                            <?php if ($feedback) : ?>
                                <p class="text-black text-[14px] mb-4">
                                    <?php echo esc_html($feedback); ?>
                                </p>
                            <?php endif; ?>

                            <?php if ($name) : ?>
                                <p class="text-black font-bold text-[14px]">
                                    <?php echo esc_html($name); ?>
                                </p>
                            <?php endif; ?>
                        </div>
                    <?php endwhile; ?>
                </div>
                <?php wp_reset_postdata(); ?>
            <?php endif; ?>


            <!-- Button -->
            <div class="flex justify-center mt-8">
                <a href="/atsiliepimai" class="inline-block bg-black text-white rounded-[16px] px-8 py-3 font-semibold
                hover:bg-gray-800 transition-colors w-full md:w-[220px] text-center">
                    Daugiau atsiliepimų
                </a>
            </div>
        </div>
    </section>
</section> <!-- Main section -->