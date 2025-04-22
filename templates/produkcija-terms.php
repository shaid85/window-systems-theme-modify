  <?php
  /*
  Template Name: Produkcija Terms
  */
  get_header();
  ?>

    <div
      class="flex flex-col max-w-[1440px] w-full mx-auto px-[16px] md:p-[80px] pt-[16px] pb-[40px] gap-[24px] md:gap-[56px]">

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
        <div class="flex flex-col gap-[24px]">
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
            $short = wp_trim_words($full, 50, '');
            ?>
            <div class="cpt-desc-container text-[#000000] text-[18px] leading-[26px] font-degular-var">
              <P class="cpt-desc-short"><?php echo esc_html($short); ?>…</P>
              <P class="hidden cpt-desc-full"><?php echo wp_kses_post($full); ?></P>
              <?php if (str_word_count(wp_strip_all_tags($full)) > 50): ?>
                <div><button class="cpt-show-more my-[32px] text-black text-[18px]">Rodyti daugiau</button></div>
              <?php endif; ?>
            </div>


            <div class="">
              <!-- Buttons Section -->
              <div class="flex flex-col md:flex-row gap-[8px] md:gap-[16px]">
                <a
                  href="#" class="text-[18px] font-[700] leading-[26px] text-center font-Degular self-start w-full md:w-[260px] h-[58px] p-[16px] rounded-[16px] bg-[#000000] text-[#ffffff]">
                  Daugiau informacijos
                </a>
                <a
                  href="/gauti_pasiulyma" class="text-[18px] font-[700] leading-[26px] text-center font-Degular self-start w-full md:w-[260px] h-[58px] p-[16px] rounded-[16px] bg-[#FFCC32] text-[#000000]">
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
      'parent' => 0, // Top-level terms
    ]);

    if ($terms && !is_wp_error($terms)) {
      $i = 1;
      foreach ($terms as $term) {
        $i += 1;
        // Retrieve the featured image for this term (set via term meta)
        $featured_image = get_term_meta($term->term_id, 'produkcija_category_image', true);
        $classes = $i % 2 == 0 ? "bg-primary" : "bg-white";
        ?>
        <div class="w-full <?php echo $classes; ?>">
          <div class="max-w-[1440px] px-[40px] mx-auto h-[544px]">
            <div class="w-full flex flex-col md:flex-row items-center min-h-[544px] px-20">
              <!-- Image Container -->
              <div class="flex justify-center w-full md:w-2/6">
                <div class="relative w-full overflow-hidden aspect-video max-w-[250px] md:max-w-[650px]">
                  <?php if ($featured_image): ?>
                    <img src="<?php echo esc_url($featured_image); ?>" alt="<?php echo esc_attr($term->name); ?>"
                      class="absolute inset-0 object-contain w-full h-full px-10">
                  <?php endif; ?>
                </div>
              </div>
              <!-- Content Section -->
              <div class="w-full md:w-4/6 px-8 mt-4 md:mt-0 md:px-[60px]"
                style="font-family: 'Erbaum', sans-serif; font-weight: 400">
                <h2 class="inline-block mb-4 text-3xl">
                  <a href="<?php echo esc_url(get_term_link($term)); ?>">
                    <?php echo esc_html($term->name); ?>
                  </a>
                  <span class="block border-t-4 border-[#FFD700] mt-1 w-full"></span>
                </h2>
                <div class="grid grid-cols-1 text-lg sm:grid-cols-2 gap-y-2">
                  <?php
                  $child_terms = get_terms([
                    'taxonomy' => 'produkcija_category',
                    'hide_empty' => false,
                    'parent' => $term->term_id, // Sub-categories
                  ]);
                  if ($child_terms && !is_wp_error($child_terms)) {
                    foreach ($child_terms as $child_term) {
                      ?>
                      <p>
                        <a style="font-family: ErbaumRegular !important; font-weight: normal;" href="<?php echo esc_url(get_term_link($child_term)); ?>">
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
      document.addEventListener('click', function (e) {
        if (!e.target.matches('.cpt-show-more')) return;

        const container = e.target.closest('.cpt-desc-container');
        container.querySelector('.cpt-desc-short').classList.toggle('hidden');
        container.querySelector('.cpt-desc-full').classList.toggle('hidden');
        e.target.textContent = e.target.textContent === 'Rodyti daugiau' ? 'Rodyti mažiau' : 'Rodyti daugiau';
      });
    </script>

    <?php get_footer(); ?>

