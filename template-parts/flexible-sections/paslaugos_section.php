<?php
$section_title = get_sub_field('section_title');
$add_custom_class = get_sub_field('add_custom_class');


$description = get_sub_field('description');
$text_show_more = get_sub_field('text_show_more');
$text_show_less = get_sub_field('text_show_less');
?>
<!-- Paslaugos section -->
<div id="paslaugos_section" class="<?php echo acf_esc_html($add_custom_class); ?> w-full bg-white">
    <section class="px-0 py-10 md:py-20 mx-auto max-w-[1440px] md:px-20">
        <div class="grid grid-cols-1 px-4 mb-2 md:mb-10 md:p-0">
            <div class=" mb-4 md:col-span-1">
                <h2 class="text-[40px] text-black"><?php echo esc_html($section_title); ?></h2>
            </div>
            <div class="long-list text-black md:col-span-1">
                <div class="long-list-inner font-degular-var leading-[26px] font-[400] text-[18px]">
                    <?php echo wp_kses_post($description); ?>
                </div>
                <button type="button" class="see-more-btn">Rodyti daugiau</button>
            </div>
        </div>

        <?php
        $args = [
            'post_type'      => 'paslaugos',
            'posts_per_page' => -1,
            'post_status'    => 'publish',
        ];

        $query = new WP_Query($args);

        if ($query->have_posts()) : ?>
            <div class="grid grid-cols-1 gap-4 md:gap-6 p-4 md:grid-cols-3 md:p-0 mx-auto  w-[95%]">
                <?php while ($query->have_posts()) : $query->the_post();
                    $icon = esc_url(get_post_meta(get_the_ID(), 'cp_paslaugos_icon', true));
                    $title = get_the_title();
                    $url   = get_permalink();
                ?>
                    <a href="<?php echo $url; ?>" class="flex items-center justify-between gap-4 border-gray-200 rounded-[16px] bg-[#F7F7F7] px-4 py-8 shadow-sm">
                        <div class="flex items-center justify-start gap-4">
                            <?php if ($icon) : ?>
                                <img class="object-contain w-[12%] mx-[8px] m-auto md:w-8 h-8" src="<?php echo $icon; ?>" alt="<?php echo esc_attr($title); ?>">
                            <?php endif; ?>
                            <span class="font-medium text-black text-[16px] md:text-[18px] font-erbaum-regular"><?php echo esc_html($title); ?></span>
                        </div>
                        <div class="flex items-center justify-center min-w-[48px] min-h-[48px] w-12 h-12 text-black rounded-[16px] bg-yellow">
                            <!-- Arrow SVG -->
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                <path d="M20.7806 12.531L14.0306 19.281C13.8899 19.4218 13.699 19.5008 13.5 19.5008C13.301 19.5008 13.1101 19.4218 12.9694 19.281C12.8286 19.1403 12.7496 18.9494 12.7496 18.7504C12.7496 18.5514 12.8286 18.3605 12.9694 18.2198L18.4397 12.7504H3.75C3.55109 12.7504 3.36032 12.6714 3.21967 12.5307C3.07902 12.3901 3 12.1993 3 12.0004C3 11.8015 3.07902 11.6107 3.21967 11.4701C3.36032 11.3294 3.55109 11.2504 3.75 11.2504H18.4397L12.9694 5.78104C12.8286 5.64031 12.7496 5.44944 12.7496 5.25042C12.7496 5.05139 12.8286 4.86052 12.9694 4.71979C13.1101 4.57906 13.301 4.5 13.5 4.5C13.699 4.5 13.8899 4.57906 14.0306 4.71979L20.7806 11.4698C20.8504 11.5394 20.9057 11.6222 20.9434 11.7132C20.9812 11.8043 21.0006 11.9019 21.0006 12.0004C21.0006 12.099 20.9812 12.1966 20.9434 12.2876C20.9057 12.3787 20.8504 12.4614 20.7806 12.531Z" fill="black" />
                            </svg>
                        </div>
                    </a>
                <?php endwhile; ?>
            </div>
            <?php wp_reset_postdata(); ?>
        <?php endif; ?>


    </section>

</div>