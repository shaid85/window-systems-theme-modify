<?php get_header(); ?>
<main id="primary" class="w-full bg-white">
  <!-- Third section -->
  <section class="py-10 px-4 md:p-20 mx-auto ">
    <!-- Top: Heading and Description -->
    <div class="order-2 md:order-1 md:pb-10 flex flex-col md:flex-row gap-[24px] w-full">
      <div class="flex-shrink-0 hidden md:block">
        <svg width="20" height="48" viewBox="0 0 20 48" fill="none" xmlns="http://www.w3.org/2000/svg">
          <path
            d="M3.1405 48L0 44.7691L12.2865 32.1291C14.3985 29.9563 15.5556 27.075 15.5556 23.9953C15.5556 20.9156 14.3893 18.0342 12.2865 15.8709L0 3.23086L3.1405 0L15.427 12.64C18.3747 15.6725 20 19.7064 20 23.9953C20 28.2842 18.3747 32.318 15.427 35.3505L3.1405 47.9906V48Z"
            fill="#FFCC32" />
        </svg>
      </div>

      <!-- Information Section -->
      <div class="flex flex-col">
        <div class="flex flex-col gap-[16px]">
          <div class="flex gap-3">
            <div class="flex-shrink-0 md:hidden">
              <svg width="20" height="48" viewBox="0 0 20 48" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path
                  d="M3.1405 48L0 44.7691L12.2865 32.1291C14.3985 29.9563 15.5556 27.075 15.5556 23.9953C15.5556 20.9156 14.3893 18.0342 12.2865 15.8709L0 3.23086L3.1405 0L15.427 12.64C18.3747 15.6725 20 19.7064 20 23.9953C20 28.2842 18.3747 32.318 15.427 35.3505L3.1405 47.9906V48Z"
                  fill="#FFCC32" />
              </svg>
            </div>
            <h1 class="md:block text-[#000000] text-[40px] font-[400] leading-[48px] font-Erbaum">
              <?php post_type_archive_title(); ?>
            </h1>
          </div>
          <div class="text-[#000000] text-[18px] leading-[26px] font-degular-var">
            <?php
            $default_value = "What is Lorem Ipsum? Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.";
            $descs = get_option('cp_cpt_archive_descriptions', $default_value);
            $full = $descs[get_post_type()] ?? '';
            $short = substr($full, 0, 350);
            ?>
            <div class="cpt-desc-container text-[#000000] text-[18px] leading-[26px] font-degular-var">
              <div class="!font-normal cpt-desc-short"><?php echo wp_kses_post($short); ?>…</div>
              <div class="font-normal hidden cpt-desc-full"><?php echo wp_kses_post($full); ?></div>
              <?php if (strlen($full) > 350): ?>
                <div><button class="cpt-show-more mt-4 text-black text-[18px]">Rodyti daugiau</button></div>
              <?php endif; ?>
            </div>
          </div>


        </div>
        <div class="flex flex-col md:flex-row gap-4 mt-[32px]">
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

    <!-- Services Grid -->
    <div class="grid grid-cols-1 pt-6 md:pt-0 gap-4 md:gap-6 md:grid-cols-3">
      <?php
      $args = array(
        'post_type' => 'paslaugos',
        'posts_per_page' => 12,
      );

      $query = new WP_Query($args);

      if ($query->have_posts()):
        while ($query->have_posts()):
          $query->the_post();
          $icon_url = get_template_directory_uri() . '/assets/icons/Vector.png';
          $title = get_the_title();
          $permalink = get_permalink();
      ?>

          <div
            class="flex items-center justify-between gap-4 border-gray-200 rounded-[16px] bg-[#F7F7F7] px-4 py-8 shadow-sm">
            <a href="<?php echo esc_url($permalink); ?>" class="flex items-center justify-start gap-4">
              <?php
              $icon_meta = get_post_meta(get_the_ID(), 'cp_paslaugos_icon', true);
              if ($icon_meta): ?>
                <img class="object-contain w-8 h-8" src="<?php echo esc_url($icon_meta); ?>"
                  alt="<?php echo esc_attr($title); ?>" />
              <?php elseif (has_post_thumbnail()): ?>
                <img class="object-contain w-8 h-8"
                  src="<?php echo esc_url(get_the_post_thumbnail_url(get_the_ID(), 'thumbnail')); ?>"
                  alt="<?php echo esc_attr($title); ?>" />
              <?php else: ?>
                <img class="object-contain w-8 h-8" src="<?php echo esc_url($icon_url); ?>"
                  alt="<?php echo esc_attr($title); ?>" />
              <?php endif; ?>

              <h2 class="font-medium text-black text-[18px]"><?php echo esc_html($title); ?></h2>
            </a>
            <a href="<?php echo esc_url($permalink); ?>"
              class="flex bg-yellow items-center justify-center w-10 md:w-12 h-10 md:h-12 text-black rounded-[16px]">
              <!-- Arrow Icon -->
              <svg class="hidden md:block" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                fill="none">
                <path
                  d="M20.7806 12.531L14.0306 19.281C13.8899 19.4218 13.699 19.5008 13.5 19.5008C13.301 19.5008 13.1101 19.4218 12.9694 19.281C12.8286 19.1403 12.7496 18.9494 12.7496 18.7504C12.7496 18.5514 12.8286 18.3605 12.9694 18.2198L18.4397 12.7504H3.75C3.55109 12.7504 3.36032 12.6714 3.21967 12.5307C3.07902 12.3901 3 12.1993 3 12.0004C3 11.8015 3.07902 11.6107 3.21967 11.4701C3.36032 11.3294 3.55109 11.2504 3.75 11.2504H18.4397L12.9694 5.78104C12.8286 5.64031 12.7496 5.44944 12.7496 5.25042C12.7496 5.05139 12.8286 4.86052 12.9694 4.71979C13.1101 4.57906 13.301 4.5 13.5 4.5C13.699 4.5 13.8899 4.57906 14.0306 4.71979L20.7806 11.4698Z"
                  fill="black" />
              </svg>
              <svg class="block md:hidden" xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16"
                fill="none">
                <path
                  d="M13.8538 8.35403L9.35375 12.854C9.25993 12.9478 9.13268 13.0006 9 13.0006C8.86732 13.0006 8.74007 12.9478 8.64625 12.854C8.55243 12.7602 8.49972 12.633 8.49972 12.5003C8.49972 12.3676 8.55243 12.2403 8.64625 12.1465L12.2931 8.50028H2.5C2.36739 8.50028 2.24021 8.4476 2.14645 8.35383C2.05268 8.26006 2 8.13289 2 8.00028C2 7.86767 2.05268 7.74049 2.14645 7.64672C2.24021 7.55296 2.36739 7.50028 2.5 7.50028H12.2931L8.64625 3.85403C8.55243 3.76021 8.49972 3.63296 8.49972 3.50028C8.49972 3.3676 8.55243 3.24035 8.64625 3.14653C8.74007 3.05271 8.86732 3 9 3C9.13268 3 9.25993 3.05271 9.35375 3.14653L13.8538 7.64653C13.9002 7.69296 13.9371 7.74811 13.9623 7.80881C13.9874 7.86951 14.0004 7.93457 14.0004 8.00028C14.0004 8.06599 13.9874 8.13105 13.9623 8.19175C13.9371 8.25245 13.9002 8.30759 13.8538 8.35403Z"
                  fill="black" />
              </svg>
            </a>
          </div>

      <?php
        endwhile;
        wp_reset_postdata();
      else:
        echo '<p>No services found.</p>';
      endif;
      ?>
    </div>
  </section>


  <main>
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