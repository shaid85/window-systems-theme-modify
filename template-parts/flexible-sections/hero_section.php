<?php
$section_title = get_sub_field('section_title');
$add_custom_class = get_sub_field('add_custom_class');

$slider_heading = get_sub_field('slider_heading');
$slider_heading_color = get_sub_field('slider_heading_color');
$slider_description = get_sub_field('slider_description');
$sl_button1 = get_sub_field('sl_button1');
$sl_button2 = get_sub_field('sl_button2');
?>
<!--Hero section  -->

<section id="hero_section" class="<?php echo acf_esc_html($add_custom_class); ?> relative mx-auto w-full h-[500px] md:min-h-[720px] overflow-hidden top-[8px] md:top-0 p-[12px] md:mb-0 md:px-12 md:py-6 rounded-3xl">
    <div class="swiper mySwiper rounded-2xl">
        <div class="swiper-wrapper rounded-2xl">
            <?php
            $rows = get_sub_field('slider_images');
            foreach ($rows as $row):
                $image_url = $row['image']; ?>
                <div class="swiper-slide relative min-h-[480px] md:min-h-[650px] bg-center bg-cover flex items-center justify-center rounded-[16px]" style="background-image:url('<?php echo esc_url($image_url['url']); ?>')">
                    <div class="absolute inset-0 bg-black bg-opacity-30"></div>
                    <div class="absolute z-10 px-[16px] text-white top-[8%] md:top-[36%] md:left-24 top-15">
                        <h1 class="text-[28px] md:mb-[12px] mb-3 leading-8 md:text-[40px]">
                            <span><?php echo esc_html($slider_heading); ?></span>
                            <span class="text-[#FFCC32]"><?php echo esc_html($slider_heading_color); ?></span>
                        </h1>
                        <p class="mb-[32px] text-[18px] font-normal degular-light"><?php echo wp_kses_post($slider_description); ?></p>
                        <div class="flex flex-col gap-4 text-center sm:flex-row">
                            <?php if ($sl_button1): ?>
                                <a href="<?php echo esc_url($sl_button1['url']); ?>" class="self-start w-full md:w-[180px] px-[16px] py-[12px] font-semibold text-black bg-white rounded-[16px] hover:bg-gray-200"><?php echo esc_html($sl_button1['title']); ?></a>
                            <?php endif; ?>
                            <?php if ($sl_button2): ?>
                                <a href="<?php echo esc_url($sl_button2['url']); ?>" class="self-start w-full md:w-[180px] px-[16px] py-[12px] font-semibold text-black bg-yellow rounded-[16px] hover:bg-yellow-600"><?php echo esc_html($sl_button2['title']); ?></a>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
        <div class="hidden text-white swiper-button-next md:block"></div>
        <div class="hidden text-white swiper-button-prev md:block"></div>
        <div class="swiper-pagination top-[-10%]"></div>
    </div>
</section>