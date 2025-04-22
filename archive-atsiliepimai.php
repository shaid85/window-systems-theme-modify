<?php
get_header();

// Get current post type.
$current_pt = get_post_type();
$post_type_obj = get_post_type_object($current_pt);
$archive_descriptions = get_option('cp_cpt_archive_descriptions', []);

// Count all published testimonials for the current post type.
$testimonial_count = isset($counts->publish) ? (int) $counts->publish : 0;

$all_testimonials = get_posts([
  'post_type' => $current_pt,
  'posts_per_page' => -1,
  'fields' => 'ids'
]);

$total_rating = 0;
if ($all_testimonials) {
  foreach ($all_testimonials as $t_id) {
    $rating = (float) get_post_meta($t_id, 'cp_atsiliepimai_rating', true);
    $total_rating += $rating;
  }
  $average_rating = $total_rating / count($all_testimonials);
} else {
  $average_rating = 0;
}

// Get the most recent testimonial.
$recent_args = [
  'post_type' => $current_pt,
  'posts_per_page' => 1,
  'orderby' => 'date',
  'order' => 'DESC'
];

$recent_query = new WP_Query($recent_args);
$recent_name = $recent_feedback = '';
$recent_rating = 0.0;
if ($recent_query->have_posts()):
  while ($recent_query->have_posts()):
    $recent_query->the_post();
    $recent_name = get_post_meta(get_the_ID(), 'cp_atsiliepimai_name', true);
    $recent_feedback = get_post_meta(get_the_ID(), 'cp_atsiliepimai_feedback', true);
    $recent_rating = (float) get_post_meta(get_the_ID(), 'cp_atsiliepimai_rating', true);
  endwhile;
  wp_reset_postdata();
endif;
?>


<div class="w-full bg-black mt-4 md:mt-0">
  <div class="max-w-[1440px] mx-auto px-4 md:px-[80px] pt-6 pb-10 bg-[#000000] text-white">
    <div class="flex flex-col-reverse items-center justify-between md:flex-row gap-6">
      <div class="md:w-[50%] flex flex-col items-start gap-[24px] md:gap-[32px]">
        <div>
          <h2 class="text-3xl md:text-[40px] font-Erbaum mb-[8px] leading-8 md:leading-[48px]">
            <?php esc_html_e('Mūsų klientų atsiliepimai', 'langu-sistemos'); ?>
          </h2>
          <div class="text-[#ffffff] text-[16px] md:text-[18px] leading-[26px] font-degular-var">
            <?php
            if (!empty($archive_descriptions[$current_pt])) {
              echo apply_filters('the_content', $archive_descriptions[$current_pt]);
            } else {
              echo esc_html__('Lorem ipsum dolor sit amet consectetur. Nec ac egestas sed amet gravida volutpat. Pleasant tempor cursus ut feugiat at sit risus ut velit vel. Ridiculus nulla faucibus ac ut mauris vel ac. Sollicitudin sapien molestie augue commodo. Amet scelerisque nunc libero enim eu. Etiam tincidunt facilisi turpis ac dignissim faucibus interdum.', 'langu-sistemos');
            }
            ?>
          </div>
        </div>
        <div class="flex flex-col items-start">
          <div class="flex gap-2 pb-3">
            <?php
            $rounded_rating = round($average_rating);
            for ($i = 1; $i <= 5; $i++) {
              echo '<span><img src="' . LANGU_THEME_URI . '/assets/images/Vector (4).png" alt="star"></span>';
            }
            ?>
          </div>
          <span class="text-sm text-[#ffffff] font-degular-text-bold">
            <?php
            $rating = esc_html(get_theme_mod('topbar_rating'));
            printf(esc_html__('Klientų įvertinimas %s iš 5', 'langu-sistemos'), $rating);
            ?>
            <br />
          </span>
          <p><?php echo esc_html(get_theme_mod('total_user_rated')); ?>+
            <?php esc_html_e('atsiliepimų', 'langu-sistemos'); ?>
          </p>
        </div>
        <a href="/palikite-atsiliepima"
          class="bg-[#FFCC32] w-full md:max-w-[260px] text-[#000000] font-semibold p-[16px] rounded-xl hover:bg-yellow-300 transition-colors text-[18px] font-Degular text-center">
          <?php esc_html_e('Palikti atsiliepimą', 'langu-sistemos'); ?>
        </a>
      </div>
      <div
        class="flex justify-center relative w-full md:w-[560px] h-[380px] md:h-[620px] bg-cover bg-center bg-no-repeat rounded-[16px] shadow-lg  md:ml-10"
        style="background-image: url('<?php echo LANGU_THEME_URI; ?>/assets/images/feedback.jpeg');">
        <div
          class="absolute bottom-0 md:left-6 bg-white text-gray-900 px-4 py-2 rounded-xl shadow-lg w-[92%] md:w-[90%] mb-[24px]">
          <p class="text-sm text-[#000000] leading-relaxed font-degural-var">
              <?php echo esc_html( get_theme_mod( 'atsiliepimai_text') ); ?>
          </p>
          <div class="flex items-center py-2">
              <p class="font-semibold text-[#000000] text-[14px] font-Degular leading-[22px]">
                  <?php echo esc_html( get_theme_mod( 'atsiliepimai_author' ) ); ?>
              </p>
          </div>
          <div class="flex flex-col items-start">
          <div class="flex gap-2 pb-3">
            <?php
            $rounded_rating = round($average_rating);
            for ($i = 1; $i <= 5; $i++) {
              echo '<span><img src="' . LANGU_THEME_URI . '/assets/images/Vector (4).png" alt="star"></span>';
            }
            ?>
          </div>
          
        </div>
        </div>
      </div>
    </div>
  </div>

</div>
<main class="">


  <div class="w-full max-w-[1440px] mx-auto px-[16px] py-10 md:py-[56px] md:px-[80px]">
      <div class="grid grid-cols-1 gap-[16px] md:gap-[24px] md:grid-cols-2">
        <?php
        $paged = (get_query_var('paged')) ? get_query_var('paged') : (get_query_var('page') ? get_query_var('page') : 1);

        $args = [
          'post_type' => $current_pt,
          'posts_per_page' => 10,
          'paged' => $paged,
        ];

        $archive_query = new WP_Query($args);

        if ($archive_query->have_posts()):
          while ($archive_query->have_posts()):
            $archive_query->the_post();
            $meta_name = get_post_meta(get_the_ID(), 'cp_atsiliepimai_name', true);
            $meta_feedback = get_post_meta(get_the_ID(), 'cp_atsiliepimai_feedback', true);
            ?>
            <div class="bg-[#f7f7f7] rounded-[16px] p-4 md:p-[24px] min-h-[280px] md:min-h-[180px] flex flex-col items-center justify-center">
              <p class="text-[#000000] mb-4 md:mb-[24px] text-center font-degular-var">
                <?php echo wp_trim_words($meta_feedback, 25, '...'); ?>
              </p>
              <h3 class="font-semibold text-[#000000] text-center font-degular-text-bold text-[18px]">
                <?php echo $meta_name ? esc_html($meta_name) : get_the_title(); ?>
              </h3>
            </div>
          <?php endwhile; else: ?>
          <p><?php esc_html_e('No testimonials found.', 'langu-sistemos'); ?></p>
        <?php endif; ?>
      </div>
      <?php wp_reset_postdata(); ?>

    <?php if ($archive_query->max_num_pages > 1): ?>
      <div class="px-4 py-[24px] md:py-[56px] bg-white md:px-24">
        <div class="flex items-center justify-center gap-[16px]">
          <?php
          // Use the current post type's archive link for pagination.
          $base = trailingslashit(get_post_type_archive_link($current_pt)) . '%_%';
          $format = 'page/%#%/';

          $links = paginate_links([
            'base' => $base,
            'format' => $format,
            'current' => $paged,
            'total' => $archive_query->max_num_pages,
            'prev_text' => '←',
            'next_text' => '→',
            'type' => 'array',
          ]);

          // Same design as before: transform array links into your custom classes
          if (is_array($links)) {
            foreach ($links as $link) {
              // Current page
              if (strpos($link, 'current') !== false) {
                echo str_replace(
                  '<span',
                  '<a class="flex justify-center items-center py-[12px] px-[16px] bg-[#FFCC32] text-gray-700 rounded-[16px] h-[48px] w-[48px]"',
                  str_replace('</span>', '</a>', $link)
                );
              }
              // Dots
              elseif (strpos($link, 'dots') !== false) {
                echo '<span class="text-gray-500">…</span>';
              }
              // Normal page link
              else {
                echo str_replace(
                  '<a',
                  '<a class="flex justify-center items-center py-[12px] px-[16px] text-gray-700 rounded h-[48px] w-[48px]"',
                  $link
                );
              }
            }
          }
          ?>
        </div>
      </div>
    <?php endif; ?>

    <div >
      <?php
      echo do_shortcode('[feedback_cta 
  title="Padėkite mums tobulėti – palikite atsiliepimą apie mūsų produkciją ir paslaugas" 
  description="Jūsų grįžtamasis ryšys leidžia mums augti ir gerinti jūsų patirtį." 
  button_text="Palikite atsiliepimą" 
  button_url="/palikite-atsiliepima"]');
      ?>
    </div>

  </div>
</main>

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

    .cta-main h2 {
      width: 82%;
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

<?php get_footer(); ?>