<?php

/**
 * @description this pages behave like a archive for produkcija categories
 */

// Loop through all terms and add/update term_order if not set


get_header();
?>

<div class="flex flex-col max-w-[1440px] w-full mx-auto px-[16px] md:p-[80px] py-10 gap-[24px] md:gap-[56px]">

  <!-- Information Section -->
  <div class="flex flex-col md:flex-row gap-[24px] w-full">
    <!-- Icon column (desktop only) -->
    <div class="hidden md:block w-[20px] flex-shrink-0">
      <svg width="20" height="48" viewBox="0 0 20 48" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path
          d="M3.1405 48L0 44.7691L12.2865 32.1291C14.3985 29.9563 15.5556 27.075 15.5556 23.9953C15.5556 20.9156 14.3893 18.0342 12.2865 15.8709L0 3.23086L3.1405 0L15.427 12.64C18.3747 15.6725 20 19.7064 20 23.9953C20 28.2842 18.3747 32.318 15.427 35.3505L3.1405 47.9906V48Z"
          fill="#FFCC32" />
      </svg>
    </div>
    <!-- Text content -->
    <div class="flex flex-col gap-2 md:gap-[24px]">
      <div class="flex md:hidden block gap-[12px] items-center">
        <div class="w-[13px] flex-shrink-0">
          <svg width="13" height="32" viewBox="0 0 13 32" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path
              d="M2.04132 32L0 29.8461L7.98623 21.4194C9.35905 19.9709 10.1111 18.05 10.1111 15.9969C10.1111 13.9437 9.35308 12.0228 7.98623 10.5806L0 2.15391L2.04132 0L10.0275 8.42669C11.9435 10.4483 13 13.1376 13 15.9969C13 18.8561 11.9435 21.5454 10.0275 23.567L2.04132 31.9937V32Z"
              fill="#FFCC32" />
          </svg>
        </div>
        <h1 class="text-[#000000] text-[28px] font-[400] leading-[32px] font-Erbaum">
          Produkcija
        </h1>
      </div>
      <h1 class="hidden md:block text-[#000000] text-[40px] font-[400] leading-[48px] font-Erbaum">
        Produkcija
      </h1>
      <div class="text-[#000000] text-[18px] leading-[26px] font-degular-var">

        <?php
        $default_value = "What is Lorem Ipsum?
Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.";
        $descs = get_option('cp_cpt_archive_descriptions', $default_value);
        $full = $descs["produkcija"] ?? '';
        $short = substr($full, 0, 350);
        ?>
        <div class="cpt-desc-container text-[#000000] text-[18px] leading-[26px] font-degular-var">
          <div class="cpt-desc-short"><?php echo wp_kses_post($short); ?>…</div>
          <div class="hidden cpt-desc-full"><?php echo wp_kses_post($full); ?></div>
          <?php if (strlen($full) > 350): ?>
            <div><button class="cpt-show-more md:my-[32px] mt-2 mb-6 text-black text-[18px]">Rodyti daugiau</button></div>
          <?php endif; ?>
        </div>


        <div class="">
          <!-- Buttons Section -->
          <div class="flex flex-col md:flex-row gap-4 md:gap-[16px]">
            <a href="#"
              class="text-[18px] font-[700] leading-[26px] text-center font-Degular self-start w-full md:w-[260px] h-[58px] p-[16px] rounded-[16px] bg-[#000000] text-[#ffffff]">
              Kainų skaičiuoklė
            </a>
            <a href="/gauti_pasiulyma"
              class="text-[18px] font-[700] leading-[26px] text-center font-Degular self-start w-full md:w-[260px] h-[58px] p-[16px] rounded-[16px] bg-[#FFCC32] text-[#000000]">
              Gauti pasiūlymą
            </a>
          </div>
        </div>
      </div>
    </div>

  </div>
</div>


<!-- Dynamic Categories Section -->
<?php
$terms = get_terms([
  'taxonomy' => 'produkcija_category',
  'hide_empty' => false,
  'parent' => 0,
  'meta_query' => [
    [
      'key' => 'term_order',
      'compare' => 'EXISTS'
    ]
  ]
]);

if ($terms && !is_wp_error($terms)) {

  usort($terms, function ($a, $b) {
    $order_a = get_term_meta($a->term_id, 'term_order', true);
    $order_b = get_term_meta($b->term_id, 'term_order', true);

    return $order_a - $order_b; // Ascending order (change to $order_b - $order_a for descending)
  });

  $i = 1;
  foreach ($terms as $term) {
    $i += 1;
    // Retrieve the featured image for this term (set via term meta)
    $featured_image = get_term_meta($term->term_id, 'produkcija_category_image', true);
    $classes = $i % 2 == 0 ? "bg-primary" : "bg-white";
?>
    <div class="w-full <?php echo $classes; ?>">
      <div class="max-w-[1440px] md:px-[40px] px-4 pb-10 mx-auto h-auto md:h-[544px]">
        <div
          class="w-full flex md:flex-row flex-row-reverse items-start md:items-center min-h-auto md:min-h-[544px] py-4 md:py-0 md:px-20">
          <!-- Image Container -->
          <div
            class="flex justify-end md:justify-center w-[130px] md:w-[40%] h-[112px] md:h-full md:w-2/6 absolute md:static">
            <div class="relative w-full overflow-hidden aspect-video max-w-[250px] md:max-w-[650px]">
              <?php if ($featured_image): ?>
                <img src="<?php echo esc_url($featured_image); ?>" alt="<?php echo esc_attr($term->name); ?>"
                  class="absolute inset-0 object-contain w-full h-full px-4 py-3 md:px-10">
              <?php endif; ?>
            </div>
          </div>
          <!-- Content Section -->
          <div class="w-full md:w-4/6 md:px-8 mt-4 md:mt-0 md:px-[60px]"
            style="font-family: 'Erbaum', sans-serif; font-weight: 400">
            <div class="h-[112px] md:h-full flex items-center pb-4 md:pb-0">
              <h2 class="inline-block mb-4 text-[24px] md:text-[32px] ">
                <a href="<?php echo esc_url(get_term_link($term)); ?>"
                  style="font-family: ErbaumRegular !important; font-weight: normal;">
                  <?php echo esc_html($term->name); ?>
                </a>
                <span class="block border-t-4 border-[#FFD700] mt-1 w-full"></span>
              </h2>
            </div>

            <div class="grid grid-cols-1 text-[16px] md:text-[20px] sm:grid-cols-2 gap-y-4">
              <?php
              $child_terms = get_terms([
                'taxonomy' => 'produkcija_category',
                'hide_empty' => false,
                'parent' => $term->term_id, // Sub-categories
              ]);
              // Sort terms by term_order meta
              usort($child_terms, function ($a, $b) {
                $order_a = get_term_meta($a->term_id, 'term_order', true);
                $order_b = get_term_meta($b->term_id, 'term_order', true);

                return intval($order_a) - intval($order_b);
              });

              if ($child_terms && !is_wp_error($child_terms)) {
                foreach ($child_terms as $child_term) {
              ?>
                  <p>
                    <a style="font-family: ErbaumRegular !important; font-weight: normal;"
                      href="<?php echo esc_url(get_term_link($child_term)); ?>">
                      <?php echo esc_html($child_term->name); ?>
                    </a>
                  </p>
              <?php
                }
              }
              ?>
            </div>
          </div>
        </div>
      </div>
    </div>
<?php
  }
} else {
  echo '<p>No terms found.</p>';
}
?>


<style>
  .bg-primary {
    background: #f7f7f7;
  }
</style>

<script>
  document.addEventListener('click', function(e) {
    if (!e.target.matches('.cpt-show-more')) return;

    const container = e.target.closest('.cpt-desc-container');
    container.querySelector('.cpt-desc-short').classList.toggle('hidden');
    container.querySelector('.cpt-desc-full').classList.toggle('hidden');
    e.target.textContent = e.target.textContent === 'Rodyti daugiau' ? 'Rodyti mažiau' : 'Rodyti daugiau';
  });
</script>

<?php get_footer(); ?>