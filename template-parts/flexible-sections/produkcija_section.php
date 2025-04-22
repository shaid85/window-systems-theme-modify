<?php
$section_title = get_sub_field('section_title');
$add_custom_class = get_sub_field('add_custom_class');


$description = get_sub_field('description');
$text_show_more = get_sub_field('text_show_more');
$text_show_less = get_sub_field('text_show_less');
?>
<!--second section-->
<div id="produkcija_section" class="<?php echo acf_esc_html($add_custom_class); ?> bg-[#F7F7F7] w-full">
    <section class="mx-auto max-w-[1440px] p-[40px] px-4 pt-8 md:p-20 ">
        <div class="grid grid-cols-1 mb-10 md:p-0">
            <div class=" mb-4 md:col-span-1 ">
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
        $categories = get_terms([
            'taxonomy'   => 'produkcija_category',
            'number'     => 6,
            'orderby'    => 'count',
            'order'      => 'DESC',
            'hide_empty' => false,
            'parent'     => 0,
        ]);

        if (! is_wp_error($categories) && $categories) : ?>
            <div class="grid grid-cols-1 gap-4 md:gap-[24px] md:grid-cols-3 md:p-0 mx-auto w-full md:w-[95%]">
                <?php foreach ($categories as $cat) :
                    $image_url = get_term_meta($cat->term_id, 'produkcija_category_image', true);
                    $link      = get_term_link($cat);
                ?>
                    <a href="<?php echo esc_url($link); ?>" class="flex items-center justify-between max-w-[100%] md:max-w-[410px] border-gray-200 rounded-[16px] bg-white p-[16px] md:pb-[32px] shadow-sm hover:shadow-md transition">
                        <div class="flex w-full gap-4 md:flex-col productions md:gap-[24px]">
                            <div class="rounded-[8px] flex justify-center items-center bg-[#f7f7f7] w-1/2 h-[96px] md:h-[180px] p-2 md:py-4 md:px-7 max-w-1/3 md:max-w-full md:w-full">
                                <?php if ($image_url) : ?>
                                    <img class="w-auto object-contain h-full" src="<?php echo esc_url($image_url); ?>" alt="<?php echo esc_attr($cat->name); ?>">
                                <?php endif; ?>
                            </div>
                            <div class="flex items-center justify-between w-full">
                                <h3 class="text-[18px] text-black" style="font-weight:400;"><?php echo esc_html($cat->name); ?></h3>
                                <div class="flex items-center justify-center min-w-[48px] min-h-[48px] md:w-12 md:h-12 text-black rounded-[16px] bg-yellow">
                                    <?php echo file_get_contents(LANGU_THEME_URI . "/assets/icons/arrow-right.svg"); ?>
                                </div>
                            </div>
                        </div>
                    </a>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>

    </section>
</div>