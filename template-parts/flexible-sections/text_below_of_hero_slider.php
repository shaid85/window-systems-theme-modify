<?php
$section_title = get_sub_field('section_title');
$add_custom_class = get_sub_field('add_custom_class');


$description = get_sub_field('description');
$description_color = get_sub_field('description_color');
$sl_button2 = get_sub_field('sl_button2');
?>

<!--First section  -->
<section id="text_below_of_hero_slider" class="<?php echo acf_esc_html($add_custom_class); ?> flex flex-col items-center justify-center gap-6 md:gap-10 px-6 py-10 md:py-20 pt-7 md:pt-10 ">
    <div class="">
        <img src="<?php echo esc_url(LANGU_THEME_URI); ?>/assets/images/home/logo.png" alt="Icon"
            class="w-16 h-16 mx-auto" />
    </div>

    <p class="w-full md:w-[880px] text-[24px] leading-[28px] md:leading-[40px] text-center text-white md:text-[32px] font-[Erbaum] font-normal">
        <?php echo esc_html($description); ?>
        <span class="text-yellow">
            <?php echo esc_html($description_color); ?>
        </span>
    </p>

    <?php if ($sl_button2): ?>
        <a href="<?php echo esc_url($sl_button2['url']); ?>" class="w-full md:w-[220px] px-4 py-3 font-semibold text-center text-black transition bg-yellow-400 rounded-2xl hover:bg-yellow-600"><?php echo esc_html($sl_button2['title']); ?></a>
    <?php endif; ?>
</section>