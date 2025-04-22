<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
  <?php
  // Meta fields
  $images = get_post_meta(get_the_ID(), 'cp_paslaugos_images', true);
  $cp_paslaugos_call_an_installer_button = esc_attr(get_post_meta(get_the_ID(), "cp_paslaugos_call_an_installer_button", true));
  $args = array(
    'posts_per_page' => 6,
    'post_type' => 'faq', 
  );
  $query = new WP_Query( $args );
  ?>

  <div class="bg-[#000000]">
    <!-- main div -->
    <div
      class="relative flex flex-col w-full mx-auto bg-[#ffffff] md:pt-[24px] md:pl-[80px] md:pr-[80px] md:pb-[80px] md:gap-[56px] gap-[24px] px-[16px] pt-[24px] pb-[40px] bt-[16px]">
      <div class="flex gap-[8px] text-[#000000] items-center cursor-pointer font-degular-text-bold"
        onclick="window.history.back();">
        <svg width="18" height="15" viewBox="0 0 18 16" fill="none" xmlns="http://www.w3.org/2000/svg">
          <path
            d="M18.0006 8.00042C18.0006 8.19933 17.9216 8.3901 17.7809 8.53075C17.6403 8.6714 17.4495 8.75042 17.2506 8.75042H2.5609L8.03122 14.2198C8.1009 14.2895 8.15617 14.3722 8.19389 14.4632C8.2316 14.5543 8.25101 14.6519 8.25101 14.7504C8.25101 14.849 8.2316 14.9465 8.19389 15.0376C8.15617 15.1286 8.1009 15.2114 8.03122 15.281C7.96153 15.3507 7.87881 15.406 7.78776 15.4437C7.69672 15.4814 7.59914 15.5008 7.50059 15.5008C7.40204 15.5008 7.30446 15.4814 7.21342 15.4437C7.12237 15.406 7.03965 15.3507 6.96996 15.281L0.219965 8.53104C0.150233 8.46139 0.0949134 8.37867 0.0571702 8.28762C0.019427 8.19657 0 8.09898 0 8.00042C0 7.90186 0.019427 7.80426 0.0571702 7.71321C0.0949134 7.62216 0.150233 7.53945 0.219965 7.46979L6.96996 0.719792C7.1107 0.579062 7.30157 0.5 7.50059 0.5C7.69961 0.5 7.89048 0.579062 8.03122 0.719792C8.17195 0.860523 8.25101 1.05139 8.25101 1.25042C8.25101 1.44944 8.17195 1.64031 8.03122 1.78104L2.5609 7.25042H17.2506C17.4495 7.25042 17.6403 7.32943 17.7809 7.47009C17.9216 7.61074 18.0006 7.8015 18.0006 8.00042Z"
            fill="black" />
        </svg>
        <h6 class="font-Degular text-[14px] leading-[24px] font-degular-text-bold">Grįžti</h6>
      </div>

      <!-- container section having two containers -->
      <div class="flex flex-col md:flex-row gap-6 md:gap-[56px]" style="overflow: hidden !important;">
        <!-- container-1 -->
        <div class="order-2 md:order-1 flex flex-col md:flex-row gap-[24px] w-full md:w-1/2">
          <div class="md:block hidden w-[48px] flex-shrink-0">
            <svg width="20" height="48" viewBox="0 0 20 48" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path
                d="M3.1405 48L0 44.7691L12.2865 32.1291C14.3985 29.9563 15.5556 27.075 15.5556 23.9953C15.5556 20.9156 14.3893 18.0342 12.2865 15.8709L0 3.23086L3.1405 0L15.427 12.64C18.3747 15.6725 20 19.7064 20 23.9953C20 28.2842 18.3747 32.318 15.427 35.3505L3.1405 47.9906V48Z"
                fill="#FFCC32" />
            </svg>
          </div>
          <!-- information section -->
          <div class="flex flex-col gap-[32px]">
            <div class="flex flex-col gap-[24px]">
              <h1 class="md:block hidden text-[#000000] text-[40px] font-[400] leading-[48px] font-Erbaum">
                <?php the_title(); ?>
              </h1>
              <div class="text-[#000000] text-[18px] leading-[26px] font-degular-var">
                <?php the_content(); ?>
              </div>
            </div>
            <div class="actions flex gap-[16px] flex-col md:flex-row">

              <button
                class="text-[18px] font-[700] leading-[26px] font-Degular self-start w-full md:w-[260px] h-[58px] p-[16px] rounded-[16px] bg-[#000000] text-[#ffffff]">
                Kontaktai
              </button>

              <?php if ($cp_paslaugos_call_an_installer_button): ?>
                <a href="/issikviesti-montuotoja/"
                  class="text-[18px] font-[700] leading-[26px] font-Degular self-start w-full md:w-[260px] h-[58px] p-[16px] rounded-[16px] bg-yellow text-black">
                  Montuotojo iškvietimas
                </a>
              <?php endif; ?>
            </div>
          </div>
        </div>
        <!-- container-2 -->
        <div class="order-1 md:order-2 flex flex-col gap-2 md:gap-[16px] w-full md:w-1/2 overflow-hidden">
          <div class="md:hidden flex md:gap-[8px] gap-[12px] mb-[24px]">
            <div class="w-[13px] h-[32px] flex-shrink-0">
              <svg width="13" height="32" viewBox="0 0 13 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path
                  d="M2.04132 32L0 29.8461L7.98623 21.4194C9.35905 19.9709 10.1111 18.05 10.1111 15.9969C10.1111 13.9437 9.35308 12.0228 7.98623 10.5806L0 2.15391L2.04132 0L10.0275 8.42669C11.9435 10.4483 13 13.1376 13 15.9969C13 18.8561 11.9435 21.5454 10.0275 23.567L2.04132 31.9937V32Z"
                  fill="#FFCC32" />
              </svg>
            </div>
            <h1 class="text-[#000000] text-[28px] font-[400] leading-[32px] font-Erbaum">
              <?php the_title(); ?>
            </h1>
          </div>
          <?php if (!empty($images) && is_array($images)): ?>
            <?php foreach ($images as $img_url): ?>
              <img src="<?php echo esc_url($img_url); ?>" alt="<?php echo esc_attr($title); ?>"
                class="object-cover h-[310px] rounded-[16px]">
            <?php endforeach; ?>
          <?php else: ?>
            <p class="text-gray-500">No images available.</p>
          <?php endif; ?>
        </div>
        <div style="transform: rotateZ(60deg);" class="absolute block border-[#FFCC32] border-[6px] rounded-[26px] md:rounded-[45px] w-[158px] h-[161px] top-[22.5%] right-[-16%]
         md:w-64 md:h-64 md:top-[33%] md:right-[-2%]
         md:border-[7px]"></div>
      </div>

    </div>
  </div>


<section class="w-full bg-[#F7F7F7] text-black mx-auto px-4 py-10 md:py-20">
  <div class="mb-8 text-center">
    <h2 class="text-[28px] md:text-[40px]">Dažnai užduodami klausimai</h2>
  </div>

  <?php if ( $query->have_posts() ) : ?>
    <div class="mx-auto max-w-[850px] space-y-2 md:space-y-4">
      <?php 
        $first = true;
        while ( $query->have_posts() ) : $query->the_post();
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
  <div class="flex align-center justify-center mt-6 md:mt-8">
    <a href="/dažnai-užduodami-klausimai/"
        class="bg-[#FFCC32] px-[14px] py-[12px] text-black text-center rounded-[16px] w-full md:w-[220px]">
        Peržiūrėti visus klausimus
    </a>
  </div>
</section>


</article>

<script>
  document.addEventListener("DOMContentLoaded", () => {
    const images = document.querySelectorAll('.checkbox-icon');

    images.forEach((img) => {
      let src = img.getAttribute('src');

      if (src.includes('.png')) {
        img.setAttribute('src', src.replace('.png', '.svg'));
      }
    });

  })

  document.querySelectorAll('.faq-toggle').forEach(button => {
  button.addEventListener('click', () => {
    const content = document.getElementById(button.getAttribute('aria-controls'));
    content.classList.toggle('hidden');

    button.querySelector('.plus').classList.toggle('hidden');
    button.querySelector('.minus').classList.toggle('hidden');

    button.setAttribute('aria-expanded', content.classList.contains('hidden') ? 'false' : 'true');
  });
});
</script>