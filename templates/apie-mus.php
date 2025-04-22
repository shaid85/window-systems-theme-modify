<?php
/*
Template Name: Apie Mus
*/
get_header();
?>

<!-- Inline styles (Consider moving these to your CSS file) -->
<style>
    .slider-container {
        position: relative;
        width: 100%;
        overflow: hidden;
    }

    .slider-wrapper {
        display: flex;
        transition: transform 0.3s ease;
    }

    .slide {
        flex: 0 0 100%;
    }

    @media (min-width: 768px) {
        .slide {
            flex: 0 0 25%;
        }
    }
</style>

<!-- Hero section -->

<?php

$about_hero_title_white_default = "Apie mus - faucibus at orci vel ac.";
$about_hero_title_white = get_theme_mod("about_hero_title_white", $about_hero_title_white_default);
$about_hero_title_colored_default = "Sollicite augue commodo.";
$about_hero_title_colored = get_theme_mod("about_hero_title_colored", $about_hero_title_colored_default);
$about_hero_description_first_default = "Lorem ipsum dolor sit amet consectetur. Nec ac egestas sed amet gravida vulputate.
            Placerat tempor cursus ut feugiat at sit nisi velit vel. Ridiculus nulla faucibus
            at orci mauris vel ac. Sollicitudin sapien molestie augue commodo. Amet scelerisque
            nunc libero enim eu. Enim tincidunt facilisi turpis et adipiscing faucibus interdum.";
$about_hero_description_first = get_theme_mod("about_hero_description_first", $about_hero_description_first_default);

$about_us_trust_list_items_raw = get_theme_mod("about_hero_section_list_items", '10 metų garantija
Greitas ir kokybiškas aptarnavimas
17+ metų patirtis rinkoje');
$about_hero_section_list_items = array_filter(array_map('trim', explode("\n", $about_us_trust_list_items_raw)));

$about_hero_description_second = get_theme_mod("about_hero_description_second", 'Susisiekite su mumis ir sužinokite, kaip galime padėti įgyvendinti jūsų viziją!');

$about_hero_image = get_theme_mod("about_hero_image", "");

?>

<div class="text-white bg-black">
    <section
        class="pt-[24px] pr-[16px] pb-[40px] pl-[16px] md:pt-[24px] md:pr-[80px] md:pb-[80px] md:pl-[80px] max-w-[1440px] mx-auto flex flex-col gap-[16px]">
        <h2 class="text-[28px] md:text-[40px] font-[400] leading-[32px] md:leading-[48px] font-erbaum-regular">
            <?php echo esc_html($about_hero_title_white); ?>
        </h2>
        <span
            class="text-yellow-400 text-[28px] md:text-[40px] font-[400] leading-[32px] md:leading-[48px] font-erbaum-regular">
            <?php echo esc_html($about_hero_title_colored); ?></span>
        <p class="mt-2 text-[18px] font-degular-var font-normal">
            <?php echo esc_html($about_hero_description_first); ?>
        </p>

        <?php if (!empty($about_hero_section_list_items)): ?>
            <ul class="flex flex-col gap-[8px]">
                <?php foreach ($about_hero_section_list_items as $item => $text): ?>
                    <?php if (!empty($text)): ?>
                        <li class="flex gap-[8px] items-center">
                            <img src="<?php echo LANGU_THEME_URI; ?>/assets/icons/svg/post-checked-light.svg" alt="Check icon"
                                class="w-[24px] h-[24px]" />
                            <p class="text-[18px] font-degular-var leading-[26px] font-400">
                                <?php echo esc_html($text); ?>
                            </p>
                        </li>
                    <?php endif; ?>
                <?php endforeach; ?>
            </ul>
        <?php endif; ?>

        <p class="mt-2 text-[18px] font-degular-var font-normal">
            <?php echo esc_html($about_hero_description_second); ?>
        </p>

        <?php if (empty($about_hero_image)): ?>
            <!-- Mobile Image (shown on smaller screens) -->
            <img src="<?php echo LANGU_THEME_URI; ?>/assets/images/api-mus-hero.jpeg" alt="Api-Mus Hero Mobile"
                class="block md:hidden sm:w-[343px] sm:h-[220px] mt-6 md:w-[1280px] md:h-[780px] rounded-[16px]" />

            <!-- Desktop Image (shown on md and larger) -->
            <img src="<?php echo LANGU_THEME_URI; ?>/assets/images/api-mus-hero.jpeg" alt="Api-Mus Hero"
                class="hidden md:block w-full h-[560px] object-cover mt-[56px] rounded-[16px]" />
        <?php else: ?>
            <!-- Mobile Image (shown on smaller screens) -->
            <img src="<?php echo $about_hero_image; ?>" alt="Api-Mus Hero Mobile"
                class="block md:hidden sm:w-[343px] sm:h-[220px] mt-6 md:w-[1280px] md:h-[780px] rounded-[16px]" />

            <!-- Desktop Image (shown on md and larger) -->
            <img src="<?php echo $about_hero_image; ?>" alt="Api-Mus Hero"
                class="hidden md:block w-full h-[560px] object-cover mt-[56px] rounded-[16px]" />
        <?php endif; ?>

    </section>
</div>


<!-- trust section -->

<?php

$about_us_trust_section_title = get_theme_mod("about_us_trust_section_title", "Mumis pasitiki šimtai klientų visame
                pasaulyje!");
$about_us_trust_list_items_raw = get_theme_mod("about_us_trust_section_list_items", '10 metų garantija
Greitas ir kokybiškas aptarnavimas
17+ metų patirtis rinkoje');
$about_us_trust_list_items = array_filter(array_map('trim', explode("\n", $about_us_trust_list_items_raw)));
$about_us_trust_section_button_text = get_theme_mod("about_us_trust_section_button_text", 'Susisiekti');
$about_us_trust_section_image = get_theme_mod("about_us_trust_section_image", LANGU_THEME_URI . "/assets/images/about-seection-2.jpg");
?>

<section class="bg-[#F7F7F7]">
    <div class="py-[40px] px-[16px] md:p-[80px] grid grid-cols-2 gap-[24px] md:gap-[48px] max-w-[1440px] mx-auto">
        <div class="flex flex-col gap-[24px] justify-center col-span-2 md:col-span-1">
            <h2 class="text-[28px] md:text-[40px] font-erbaum-regular leading-[32px] md:leading-[48px]">
                <?php echo esc_html($about_us_trust_section_title); ?></h2>
            <div class="flex flex-col gap-[24px]">
                <?php if (!empty($about_us_trust_list_items)): ?>
                    <ul class="flex flex-col">
                        <?php foreach ($about_us_trust_list_items as $item => $text): ?>
                            <?php if (!empty($text)): ?>
                                <li class="flex gap-2 items-center">
                                    <img src="<?php echo LANGU_THEME_URI; ?>/assets/icons/svg/post-checked.svg" alt="Check icon"
                                        class="w-[24px] h-[24px]" />
                                    <p class="text-[18px] font-degular-var leading-[26px] font-400">
                                        <?php echo esc_html($text); ?>
                                    </p>
                                </li>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    </ul>
                <?php endif; ?>

                <a href="<?php esc_url_raw(home_url('/kontaktai')); ?>"
                    class="w-full md:w-[220px] h-[58px] p-[16px] bg-black text-white rounded-[16px] transition-colors degular text-center">
                    <?php echo esc_html($about_us_trust_section_button_text); ?>
                </a>
            </div>
        </div>
        <div class=" col-span-2 md:col-span-1">
            <img class="rounded-[16px]" src="<?php echo $about_us_trust_section_image; ?>"
                alt="About Us Trust Section Image" />
        </div>
    </div>
</section>


<?php

$about_us_our_values_title_default = "Mūsų vertybės";
$about_us_our_values_title = get_theme_mod("about_us_our_values_title", $about_us_our_values_title_default);

$about_us_our_values_description_first_default = "Langų Sistemos – šešiolika metų sėkmingai veikianti įmonė, kuri užtikrina aukščiausią kokybę, inovacijas ir
            nepriekaištingą klientų aptarnavimą. Nuo pat veiklos pradžios mūsų tikslas buvo ne tik tiekti kokybiškus
            produktus, bet ir sukurti visapusiškai patogų klientų aptarnavimo procesą, teikti pilną servisą nuo
            užsakymo, montavimo iki garantiniės darbų priežiūros.";
$about_us_our_values_description_first = get_theme_mod("about_us_our_values_description_first", $about_us_our_values_description_first_default);

$about_us_our_values_description_first_items = array_filter(array_map('trim', explode("\n", $about_us_our_values_description_first)));

$about_us_our_values_description_second_default = "Mūsų komanda – tai patyrę specialistai, kurie padeda kiekvienam klientui išsirinkti geriausiai jo poreikius
            atitinkantį produktą ir užtikrina, kad visas procesas – nuo konsultacijos iki montavimo – vyktų sklandžiai.
            Šiandien Langų Sistemos išsiskiria šešiomis pagrindinėmis vertybėmis:";
$about_us_our_values_description_second = get_theme_mod("about_us_our_values_description_second", $about_us_our_values_description_second_default);

$about_us_card_repeater = json_decode(get_theme_mod("about_us_card_repeater", []));

$about_us_our_values_subtitle_default = "Langų Sistemos - kai kokybė ir patogumas susitinka su inovacijomis!";
$about_us_our_values_subtitle = get_theme_mod("about_us_our_values_subtitle", $about_us_our_values_subtitle_default);

?>
<section class="flex flex-col gap-[24px] md:gap-[56px] py-[40px] px-[16px] md:p-[80px] max-w-[1440px] mx-auto ">
    <div class="flex gap-[16px] flex-col">
        <h2 class="text-[28px] md:text-[40px] font-[400]  font-erbaum-regular">
            <?php echo esc_html($about_us_our_values_title); ?>
        </h2>

        <p class=" font-normal text-[18px] leading-[26px] text-black font-degular-var">
        </p>
        
        <?php foreach ($about_us_our_values_description_first_items as $item => $text): ?>
            <p class=" font-degular-var font-[400] leading-[26px] text-[18px] text-black">
                <?php echo esc_html($text); ?>
            </p>
        <?php endforeach;?>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4 md:gap-[24px]">
        <?php
        if (!empty($about_us_card_repeater) && is_array($about_us_card_repeater)):
            foreach ($about_us_card_repeater as $card):
                $icon = isset($card->icon) ? esc_url($card->icon) : '';
                $title = isset($card->title) ? esc_html($card->title) : '';
                $desc = isset($card->description) ? esc_html($card->description) : '';
                ?>
                <div class="bg-[#F7F7F7] h-[140px] md:h-[210px] p-[16px] md:p-[24px] gap-[8px] rounded-[16px] flex flex-col">
                    <div class="flex flex-row md:flex-col items-center md:items-start mb-2 gap-[8px]">
                        <?php if ($icon): ?>
                            <img src="<?php echo $icon; ?>" alt="<?php echo esc_attr($title); ?> Icon"
                                class="w-[32px] h-[32px] md:w-[40px] md:h-[40px]" />
                        <?php endif; ?>
                        <?php if ($title): ?>
                            <h3 class="font-[400] text-[#161515] text-[16px] md:text-[20px] font-erbaum-regular">
                                <?php echo $title; ?>
                            </h3>
                        <?php endif; ?>
                    </div>
                    <?php if ($desc): ?>
                        <p class="text-[#161515] font-[400] font-degular-var text-[16px] md:text-[18px]">
                            <?php echo $desc; ?>
                        </p>
                    <?php endif; ?>
                </div>
                <?php
            endforeach;
        endif;
        ?>
    </div>

    <div
        class="flex flflex flex-col items-start justify-center w-full space-y-4 md:space-y-6 pr-[64px]ex-col gap-[16px]">
        <p class=" text-black font-degular-var text-[16px] md:text-[18px] font-[400]">
            <?php echo esc_html($about_us_our_values_description_second); ?>
        </p>

        <p class="font-bold text-black text-[16px] md:text-[18px] font-degular-bold">
            <?php echo esc_html($about_us_our_values_subtitle); ?>
        </p>
    </div>
</section>

<?php

$about_us_work_quality_title_default = "Pamatykite mūsų darbo kokybę iš arti.";
$about_us_work_quality_title = get_theme_mod("about_us_work_quality_title", $about_us_work_quality_title_default);
$about_us_work_quality_description_default = "Peržiūrėkite mūsų atliktus projektus ir įsitikinkite aukšta kokybe bei profesionalumu.";
$about_us_work_quality_description = get_theme_mod("about_us_work_quality_title", $about_us_work_quality_description_default);

$about_us_work_quality_btn_text_default = "Atlikti darbai";
$about_us_work_quality_btn_text = get_theme_mod("about_us_work_quality_btn_text", $about_us_work_quality_btn_text_default);
?>

<section class="md:gap-12 gap-2 flex flex-col bg-[#f7f7f7] items-center py-10 px-4 md:p-20">
    <div class="flex flex-col flex-grow text-black gap-2 md:gap-4">
        <h2 class="text-[28px] leading-8 md:leading-11 md:text-[40px] mb-2 text-center">
            <?php echo esc_html($about_us_work_quality_title); ?>
        </h2>
        <p class="leading-6 md:leading-6.5 text-[16px] md:text-[18px] mb-3 text-center">
            <?php echo esc_html($about_us_work_quality_description); ?>
        </p>
    </div>

    <div class="w-full flex flex-col items-center justify-end">
        <a href="/atlikti-darbai"
            class="px-4 py-3 bg-[#FFCC32] w-full md:w-[220px] text-black text-center rounded-[16px] hover:bg-[#FFCC32]">
            <?php echo esc_html($about_us_work_quality_btn_text); ?>
        </a>
    </div>
</section>


<?php

$about_us_history_title_default = "Istorija";
$about_us_history_title = get_theme_mod("about_us_history_title", $about_us_history_title_default);

$about_us_history_desk_img_default = LANGU_THEME_URI . "/assets/images/timeline.png";
$about_us_history_desk_img = get_theme_mod("about_us_history_desk_img", $about_us_history_desk_img_default);
$about_us_history_mobile_img_default = LANGU_THEME_URI . "/assets/images/timeline.png";
$about_us_history_mobile_img = get_theme_mod("about_us_history_mobile_img", $about_us_history_mobile_img_default);

?>

<section class="md:py-[120px] py-[40px] px-[16px] bg-[#FFCC32]">
    <!-- Desktop Layout (Visible on md and above) -->
    <div class="md:block relative">
        <!-- Title -->
        <h1
            class="text-[28px] md:text-[40px] font-erbaum-regular font-[400] ml-4 md:mb-16 md:ml-16 absolute md:relative">
            <?php echo $about_us_history_title; ?>
        </h1>
        <img src="<?php echo $about_us_history_desk_img; ?>" alt="Timeline" class="w-full hidden md:block" />
        <img src="<?php echo $about_us_history_mobile_img; ?>" alt="Timeline" class="w-full block md:hidden" />
    </div>
</section>

<?php

// our team
$about_our_team_title_default = "Mūsų komanda - profesionalumas ir rūpestis kiekvienu klientu";
$about_our_team_title = get_theme_mod("about_our_team_title", $about_our_team_title_default);
$members_cards = json_decode(get_theme_mod("about_us_our_team_member_card_repeater"));
?>

<section class="bg-black text-white py-[40px] px-[16px] md:p-[80px]">
    <!-- Container -->
    <div class="container mx-auto ">
        <!-- Headings -->
        <h2
            class="text-[28px] md:text-[40px] font-[400] leading-[32px] md:leading-[48px] font-erbaum-regular mb-12 text-center md:text-left">
            <?php echo esc_html($about_our_team_title); ?>
        </h2>

        <?php if (!empty($members_cards)): ?>
            <div class="block space-y-8 md:hidden">
                <?php foreach ($members_cards as $member): ?>
                    <div>
                        <div class="mb-[24px] overflow-hidden rounded-lg">
                            <?php if (!empty($member->image)): ?>
                                <img src="<?php echo esc_url($member->image); ?>" alt="<?php echo esc_attr($member->name); ?>"
                                    class="w-[163px] h-[173px] mx-auto object-cover rounded-[16px]" />
                            <?php endif; ?>
                        </div>
                        <h3 class="text-[16px] font-normal mb-1 text-center font-erbaum-regular">
                            <?php echo esc_html($member->name); ?>
                        </h3>
                        <h4 class="text-[#BEBEBE] text-[16px] degular uppercase font-bold mb-2 text-center">
                            <?php echo esc_html($member->position); ?>
                        </h4>
                        <p class="text-white text-[16px] font-degular-var leading-relaxed text-center leading-[24px]">
                            <?php echo esc_html($member->description); ?>
                        </p>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>

        <?php if (!empty($members_cards)): ?>
            <div class="hidden md:grid grid-cols-2 lg:grid-cols-4 gap-[24px]">
                <?php foreach ($members_cards as $member): ?>
                    <div>
                        <div class="mb-[24px] overflow-hidden rounded-lg">
                            <?php if (!empty($member->image)): ?>
                                <img src="<?php echo esc_url($member->image); ?>" alt="<?php echo esc_attr($member->name); ?>"
                                    class="w-full h-[320px] object-cover rounded-[16px] mt-[12px]" />
                            <?php endif; ?>
                        </div>
                        <h3 class="text-[18px] font-normal mb-1 font-erbaum-regular"><?php echo esc_html($member->name); ?></h3>
                        <h4 class="text-[#BEBEBE] text-[16px] uppercase font-medium mb-3 degular">
                            <?php echo esc_html($member->position); ?>
                        </h4>
                        <p class="text-white text-[16px] leading-relaxed font-degular-var">
                            <?php echo esc_html($member->description); ?>
                        </p>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>

</section>


<!-- location section -->

<?php
$about_us_location_title_default = "Lorem ipsum dolor sit amet consectetur.";
$about_us_location_title = get_theme_mod("about_us_location_title", $about_us_location_title_default);

$about_us_location_description_default = "Lorem ipsum dolor sit amet consectetur. Id vitae lectus sodales elementum massa nunc. Eu ornare sem ut a blandit tempor. Adipiscing posuere nisl interdum scelerisque placerat pharetra. Hendrerit odio turpis ullamcorper auctor.";
$about_us_location_description_first = get_theme_mod("about_us_location_description_first", $about_us_location_description_default);

$about_us_location_list_items_raw = get_theme_mod("about_us_location_list_items", '');
$about_us_location_list_items = array_filter(array_map('trim', explode("\n", $about_us_location_list_items_raw)));

$about_us_location_description_second1 = get_theme_mod("about_us_location_description_second1", 'Taip pat mūsų mobilusis meistras pasiruošęs atvykti į jūsų miestą ir suteikti visą reikalingą pagalbą ');

$about_us_location_description_second_bold = get_theme_mod("about_us_location_description_second_bold", 'Visagine, Švenčionyse, Švenčionėliuose, Ignalinoje, Zarasuose, Utenoje, Molėtuose ir jų rajonuose');

$about_us_location_description_second2 = get_theme_mod("about_us_location_description_second2", 'viskas jūsų patogumui!');

$about_us_location_contact_btn_default = "Kontaktai";
$about_us_location_contact_btn_text = get_theme_mod("about_us_location_contact_btn_text", $about_us_location_contact_btn_default);

$about_us_location_img_map_default = LANGU_THEME_URI . '/assets/images/Map-about-us.svg';
$about_us_location_img_map = get_theme_mod("about_us_location_img_map", $about_us_location_img_map_default);

?>

<div class="bg-[#F7F7F7]">
    <section class="py-[40px] px-[16px] md:p-[80px] max-w-[1440px] mx-auto">
        <div class="flex flex-col gap-[56px] md:flex-row md:gap-12">
            <div class="flex flex-col items-start justify-center w-full space-y-4 md:w-1/2 md:space-y-6 md:pr-[64px]">

                <?php if (!empty($about_us_location_title)): ?>
                    <h2 class="text-[28px] md:text-[40px] font-normal font-erbaum-regular leading-tight">
                        <?php echo esc_html($about_us_location_title); ?>
                    </h2>
                <?php endif; ?>

                <?php if (!empty($about_us_location_description_first)): ?>
                    <p class="text-[18px] font-degular-var md:text-base text-black md:max-w-[80%]">
                        <?php echo esc_html($about_us_location_description_first); ?>
                    </p>
                <?php endif; ?>

                <?php if (!empty($about_us_location_list_items)): ?>
                    <div class="flex flex-wrap gap-4 my-4 text-black md:gap-6">
                        <?php foreach ($about_us_location_list_items as $item): ?>
                            <div class="flex items-center gap-2">
                                <img src="<?php echo LANGU_THEME_URI; ?>/assets/icons/svg/post-checked.svg" alt="Check icon"
                                    class="w-[24px] h-[24px]" />
                                <span class="text-[18px] font-degular-var"><?php echo esc_html($item); ?></span>
                            </div>
                        <?php endforeach; ?>
                    </div>
                <?php endif; ?>

                <?php if (!empty($about_us_location_description_second1)): ?>
                    <p class="text-[18px] font-degular-var md:text-base text-black md:max-w-[80%]">
                        <?php echo wp_kses_post($about_us_location_description_second1); ?>
                        <strong>
                            <?php echo esc_html($about_us_location_description_second_bold); ?>
                        </strong>
                        <?php echo esc_html($about_us_location_description_second2); ?>
                    </p>
                <?php endif; ?>

                <?php if (!empty($about_us_location_contact_btn_text)): ?>
                    <button type="button"
                        class="w-full h-[58px] md:w-[220px] p-[16px] mt-6 bg-black text-white rounded-[16px] transition-colors degular">
                        <?php echo esc_html($about_us_location_contact_btn_text); ?>
                    </button>
                <?php endif; ?>

            </div>

            <div class="relative flex flex-col items-center justify-center w-full mt-0 md:w-1/2 md:mt-6 md:mt-0">
                <img src="<?php echo $about_us_location_img_map; ?>" class="w-full h-auto" alt="Map of Lithuania" />
            </div>
        </div>
    </section>
</div>


<?php
echo do_shortcode('[pasiekimai_section]');
?>

<?php

$about_us_reviews_title_default = "„Stipriausi Lietuvoje“ įvertinimas kelis metus iš eilės patvirtina mūsų patikimumą!";
$about_us_reviews_title = get_theme_mod("about_us_reviews_title", $about_us_reviews_title_default);
$about_us_reviews_description_default = "Projektus įgyvendinome bendradarbiaudami su gerai žinomais NT vystytojais ir statybų įmonėmis.";
$about_us_reviews_description = get_theme_mod("about_us_reviews_description", $about_us_reviews_description_default);

$about_us_reviews_images_repeater = get_theme_mod("about_us_reviews_images_repeater");
$review_images = json_decode($about_us_reviews_images_repeater);

?>
<section class="md:gap-12 gap-2 flex flex-col bg-[#f7f7f7] items-center py-10 px-4 md:p-20">
    <div class="flex flex-col flex-grow text-black gap-2 md:gap-4">
        <h2 class="text-[28px] leading-8 md:leading-[48px] md:text-[40px] mb-2 text-center max-w-[880px]">
            <?php echo esc_html($about_us_reviews_title); ?>
        </h2>
        <p class="leading-6 md:leading-6.5 text-[16px] md:text-[18px] mb-3 text-center">
            <?php echo esc_html($about_us_reviews_description); ?>
        </p>
    </div>

    <?php if (!empty($review_images)): ?>
        <div class="w-full flex items-center flex-wrap justify-center gap-4 md:gap-6">
            <?php foreach ($review_images as $item):
                if (!empty($item->image)): ?>
                    <div class="flex items-center justify-center bg-white w-[160px] h-[88px] rounded-[16px]">
                        <img src="<?php echo esc_url($item->image); ?>" alt="Review Image" class="object-contain" />
                    </div>
                <?php endif;
            endforeach; ?>
        </div>
    <?php endif; ?>

</section>

<?php
get_footer();
?>