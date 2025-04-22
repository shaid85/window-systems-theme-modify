<?php
$section_title = get_sub_field('section_title');

$section_image = get_sub_field('section_image');
$button_1 = get_sub_field('button_1');
$button_2 = get_sub_field('button_2');

$add_custom_class = get_sub_field('add_custom_class');
?>
<!--fourth section -->
<section id="kodel_verta_rinktis_mus" class="<?php echo acf_esc_html($add_custom_class); ?> relative px-4 py-10 md:p-20 overflow-hidden text-white bg-black">
    <div style="transform: rotateZ(60deg);" class="absolute block border-[#FFCC32] border-[5px] rounded-[32px] md:rounded-[45px] w-48 h-48 top-[0%] right-[-10%]
         md:w-64 md:h-64 md:top-[8%] md:right-[-2%]
         md:border-[7px] z-[99]"></div>

    <div class="relative grid grid-cols-1 gap-5 md:gap-12 px-0 mx-auto md:gap-16 max-w-[1440px] md:grid-cols-2">
        <div class="flex flex-col w-full md:w-[82%] gap-6 md:gap-8 max-w-[1440px] md:w-full justify-start order-2 md:order-1 degular">
            <h2 class="text-[28px] text-white md:text-[40px] font-erbaum-regular leading-8 leading-12">
                <?php echo esc_html($section_title); ?>
            </h2>

            <div class="space-y-6 leading-relaxed text-gray-200">

                <div class="iconbox_wrap flex flex-col gap-4 md:flex-row">
                    <?php
                    $rows = get_sub_field('icon_box_items');
                    foreach ($rows as $row):
                        $image_url = $row['image'];
                        $heading = $row['heading'];
                        $description = $row['description'];
                    ?>

                        <div class="icon_box w-full flex flex-col gap-1">
                            <div class="flex items-center md:items-start md:flex-col justify-start gap-2 md:gap-1">
                                <img class="image_icon" src="<?php echo esc_url($image_url['url']); ?>" alt="">

                                <?php if ($heading) : ?>
                                    <h3 class="text-white text-[16px] md:text-[18px] degular">
                                        <?php echo esc_html($heading); ?>
                                    </h3>
                                <?php endif; ?>
                            </div>

                            <?php if ($description) : ?>
                                <p class="font-degular-var text-[#BEBEBE] text-[18px] leading-[26px]">
                                    <?php echo esc_html($description); ?>
                                </p>
                            <?php endif; ?>
                        </div>
                    <?php endforeach; ?>

                </div><!-- /first row -->

            </div><!-- /outer container -->


            <div class="flex flex-col md:flex-row gap-4 mt-[-8px] md:mt-0">
                <?php if ($button_1): ?>
                    <a href="<?php echo esc_url($button_1['url']); ?>"
                        class="block w-full md:w-[220px] text-center px-2 md:px-6 py-3 font-semibold text-black transition rounded-[16px] shadow bg-white">
                        <?php echo esc_html($button_1['title']); ?>
                    </a>
                <?php endif; ?>
                <?php if ($button_2): ?>
                    <a href="<?php echo esc_url($button_2['url']); ?>"
                        class="block w-full md:w-[220px] text-center px-2 md:px-6 py-3 font-semibold text-black transition rounded-[16px] shadow bg-yellow">
                        <!-- Susisiekti -->
                        <?php echo esc_html($button_2['title']); ?>
                    </a>
                <?php endif; ?>
            </div>
        </div>

        <!-- Right Column: Image -->
        <div class="flex items-start justify-start order-1 md:order-2">
            <img src="<?php echo esc_url($section_image['url']); ?>"
                alt="Woman installing blinds"
                class="object-cover w-full rounded-xl shadow-lg md:w-[560px] h-[440px] md:h-[660px]" />
        </div>
    </div>

</section>