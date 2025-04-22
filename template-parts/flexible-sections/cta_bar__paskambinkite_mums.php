<?php
$section_title = get_sub_field('section_title');
$phone_number = get_sub_field('phone_number');
$button_1 = get_sub_field('button_1');


$add_custom_class = get_sub_field('add_custom_class');
?>
<!--Hero section  -->
<section id="cta_bar__paskambinkite_mums" class="<?php echo acf_esc_html($add_custom_class); ?> w-full bg-[#FFCC32] gap-6 flex flex-col md:flex-row items-center justify-between text-black mx-auto py-10 px-4 md:p-20 ">
    <div class="text-center">
        <h2 class="text-[24px] md:text-[32px]"><?php echo esc_html($section_title); ?> <span class="pb-1 border-b-[7px] border-white"><?php echo esc_html($phone_number); ?></span></h2>
    </div>
    <?php if ($button_1): ?>
        <a href="<?php echo esc_url($button_1['url']); ?>"
            class="bg-[#000000] px-[16px] py-[12px] text-white text-center rounded-[16px] w-full md:w-[220px]">
            <?php echo esc_html($button_1['title']); ?>
        </a>
    <?php endif; ?>
    </div>
</section>