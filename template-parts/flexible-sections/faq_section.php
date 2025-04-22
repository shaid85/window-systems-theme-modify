<?php
$section_title = get_sub_field('section_title');

$custom_faq = get_sub_field('need_custom_faq_items');
// $faq_items = get_sub_field('faq_items');

$add_custom_class = get_sub_field('add_custom_class');
?>
<?php
$args = array(
    'posts_per_page' => 4,
    'post_type' => 'faq',
);
$query = new WP_Query($args);
?>

<section id="faq_section" class="<?php echo acf_esc_html($add_custom_class); ?> w-full bg-[#F7F7F7] text-black mx-auto px-4 py-10 md:py-20">
    <div class="mb-8 text-center">
        <h2 class="text-[28px] md:text-[40px]"><?php echo esc_html($section_title); ?></h2>
    </div>
    <?php if ($custom_faq != true): ?>
        <?php if ($query->have_posts()) : ?>
            <div class="mx-auto max-w-[850px] space-y-2 md:space-y-4">
                <?php
                $first = true;
                while ($query->have_posts()) : $query->the_post();
                    $is_open     = $first;
                    $aria_exp    = $is_open ? 'true' : 'false';
                    $content_cls = $is_open ? '' : 'hidden';
                ?>
                    <div class="faq-item border border-[#EEEEEE] rounded-[12px] bg-white p-4">
                        <div class="flex justify-between items-center">
                            <h3 class="degular text-[16px] md:text-[18px]"><?php the_title(); ?></h3>
                            <button type="button"
                                class="faq-toggle text-[20px] p-0.5 md:p-2 rounded-full bg-amber-400"
                                aria-expanded="<?php echo $aria_exp; ?>"
                                aria-controls="faq-<?php the_ID(); ?>">
                                <span class="plus <?php echo $is_open ? 'hidden' : ''; ?>">
                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                        xmlns="http://www.w3.org/2000/svg" stroke="#000" stroke-width="1.5">
                                        <line x1="12" y1="5" x2="12" y2="19" />
                                        <line x1="5" y1="12" x2="19" y2="12" />
                                    </svg>
                                </span>
                                <span class="minus <?php echo $is_open ? '' : 'hidden'; ?>">
                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                        xmlns="http://www.w3.org/2000/svg" stroke="#000" stroke-width="1.5">
                                        <line x1="5" y1="12" x2="19" y2="12" />
                                    </svg>
                                </span>
                            </button>
                        </div>
                        <div id="faq-<?php the_ID(); ?>" class="mt-2 <?php echo $content_cls; ?>">
                            <?php the_content(); ?>
                        </div>
                    </div>
                <?php
                    $first = false;
                endwhile;
                ?>
            </div>
        <?php endif; ?>
        <?php wp_reset_postdata(); ?>
    <?php else: ?>
        <?php if (have_rows('faq_items')): ?>
            <div class="custom_faq mx-auto max-w-[850px] space-y-2 md:space-y-4">
                <?php while (have_rows('faq_items')): the_row();
                    $heading = get_sub_field('heading');
                    $body_data = get_sub_field('body_of_faq_item');
                ?>
                    <div class="faq-item border border-[#EEEEEE] rounded-[12px] bg-white p-4">
                        <div class="flex justify-between items-center">
                            <h3 class="degular text-[16px] md:text-[18px]"><?php echo esc_html($heading); ?></h3>
                            <button type="button"
                                class="faq-toggle text-[20px] p-0.5 md:p-2 rounded-full bg-amber-400"
                                aria-expanded="<?php echo $aria_exp; ?>"
                                aria-controls="faq-<?php the_ID(); ?>">
                                <span class="plus <?php echo $is_open ? 'hidden' : ''; ?>">
                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                        xmlns="http://www.w3.org/2000/svg" stroke="#000" stroke-width="1.5">
                                        <line x1="12" y1="5" x2="12" y2="19" />
                                        <line x1="5" y1="12" x2="19" y2="12" />
                                    </svg>
                                </span>
                                <span class="minus <?php echo $is_open ? '' : 'hidden'; ?>">
                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                        xmlns="http://www.w3.org/2000/svg" stroke="#000" stroke-width="1.5">
                                        <line x1="5" y1="12" x2="19" y2="12" />
                                    </svg>
                                </span>
                            </button>
                        </div>
                        <div id="faq-<?php the_ID(); ?>" class="mt-2 <?php echo $content_cls; ?>">
                            <?php echo esc_html($body_data); ?>
                        </div>
                    </div>
                <?php endwhile; ?>
            </div>
        <?php endif; ?>
    <?php endif; ?>

    <div class="flex align-center justify-center mt-6 md:mt-8">
        <a href="/dažnai-užduodami-klausimai/"
            class="faq_btn bg-[#FFCC32] px-[14px] py-[12px] text-black text-center rounded-[16px] w-full md:w-[220px]">
            Peržiūrėti visus klausimus
        </a>
    </div>
</section>