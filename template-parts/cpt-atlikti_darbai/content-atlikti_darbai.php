<?php
/**
 * Single atlikti_darbai template example
 */

// Retrieve dynamic meta values
$desc = get_post_meta(get_the_ID(), 'cp_atlikti_darbai_description', true);
$images = get_post_meta(get_the_ID(), 'cp_atlikti_darbai_images', true);

// Convert to array if not valid
if (!is_array($images)) {
  $images = array();
}
$total_images = count($images);
?>
<article id="post-<?php the_ID(); ?>" class="container pb-6 md:py-8">
  <div class="flex flex-col gap-6 md:gap-8 slider-container md:flex-row md:justify-between">
    <!-- Left Column -->
    <div class="flex flex-col justify-between md:w-1/3">
      <div>
        <!-- Title -->
        <?php if (is_singular('atlikti_darbai')): ?>
          <h1 class="mb-4 text-2xl font-bold md:text-4xl"><?php the_title(); ?></h1>
        <?php else: ?>
          <h2 class="mb02 md:mb-4 text-[24px] md:text-[32px] archive-post-title">
            <a href="<?php the_permalink(); ?>" class="hover:underline"><?php the_title(); ?></a>
          </h2>
        <?php endif; ?>

        <!-- Main content (if any) -->
        <div class="prose max-w-none">
          <?php the_content(); ?>
        </div>

        <!-- Description (meta) -->
        <?php if (!empty($desc)): ?>
          <h3 class="mt-6 text-xl font-bold">Description</h3>
          <p class="mt-2"><?php echo esc_html($desc); ?></p>
        <?php endif; ?>

        <a href="/gauti-pasiulyma/"
          class="block bg-[#000] mt-2 md:mt-4 px-[14px] py-[12px] text-white text-center rounded-[16px] w-full md:w-[220px]">
          Gauti pasiūlymą
      </a>
      </div>


      <!-- navigation buttons for desktop -->
      <div class="flex flex-col hidden mt-6 space-x-4 md:flex">
        <div class="flex-gap-2">
          <button class="transition prev hover:opacity-80">
            <img src="<?php echo LANGU_THEME_URI; ?>/assets/images/left-yellow-button.png" alt="Previous"
              class="w-14 h-14" />
          </button>
          <button class="transition next hover:opacity-80">
            <img src="<?php echo LANGU_THEME_URI; ?>/assets/images/yellow-right-button-2.png" alt="Next"
              class="w-14 h-14" />
          </button>
        </div>
        <p class="ml-0 text-[20px] font-bold">
          <span class="text-yellow-400 js-current-slide">1</span>
          &nbsp;-&nbsp;
          <span class="js-total-slides"><?php echo $total_images; ?></span>
        </p>

      </div>

    </div>

    <!-- Right Column: Swiper Slider -->
    <div class="relative md:w-2/3">
      <?php if (!empty($images)): ?>
        <div class="swiper mySwiper">
          <div class="swiper-wrapper">
            <?php foreach ($images as $image): ?>
              <?php if (!empty($image['url'])): ?>
                <div class="flex flex-col swiper-slide">
                  <figure class="relative">
                    <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['subtitle'] ?? ''); ?>"
                      class="object-cover w-full min-h-[350px] md:min-h-[550px] max-h-[350px] md:max-h-[550px]  rounded-md" />
                    <?php if (!empty($image['subtitle'])): ?>
                      <figcaption class="mt-[16px] font-bold text-left font-degular-var leading-[24px] text-[16px]">
                        <?php echo esc_html($image['subtitle']); ?>
                      </figcaption>
                    <?php endif; ?>
                  </figure>
                </div>
              <?php endif; ?>
            <?php endforeach; ?>
          </div>
          <!-- You can remove default pagination dots if not needed -->
        </div>
      <?php endif; ?>

      <!-- navigation buttons for mobile -->
      <div class="flex items-center justify-center mt-6 space-x-4 md:hidden">
        <button class="transition mob-prev hover:opacity-80">
          <img src="<?php echo LANGU_THEME_URI; ?>/assets/images/left-yellow-button.png" alt="Previous"
            class="w-14 h-14" />
        </button>
        <p class="text-lg font-erbaum-regular">
          <span class="text-yellow-400 js-current-slide">1</span>
          &nbsp;-&nbsp;
          <span class="js-total-slides"><?php echo $total_images; ?></span>
        </p>
        <button class="transition mob-next hover:opacity-80">
          <img src="<?php echo LANGU_THEME_URI; ?>/assets/images/yellow-right-button-2.png" alt="Next"
            class="w-14 h-14" />
        </button>
      </div>
    </div>
  </div>
  </div>
</article>


<style>
  .swiper-slide-next figcaption {
    display: none;
  }

  @media screen and (min-width: 750px) {
    .swiper-slide figure {
      width: 80%;
    }

    /* Create a semi-transparent overlay on the next slide */
    .swiper-slide-next figure::before {
      content: "";
      position: absolute;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      background: rgba(0, 0, 0, 0.5);
      /* Adjust color and opacity as needed */
      pointer-events: none;
      z-index: 1;
      border-radius: 16px;
    }

    /* Shift the figure inside the next slide so part of it is visible on the current slide */
    .swiper-slide-next figure {
      position: relative;
      left: -20%;
      z-index: 2;
    }
  }
</style>

<script>
  document.querySelectorAll('.slider-container').forEach(function (container) {
    // Desktop nav buttons
    var prevBtn = container.querySelector('.prev');
    var nextBtn = container.querySelector('.next');
    // Mobile nav buttons
    var mobPrevBtn = container.querySelector('.mob-prev');
    var mobNextBtn = container.querySelector('.mob-next');

    // Get slide counter element and update total slides
    var currentIndexEl = container.querySelector('.js-current-slide');
    var totalSlidesEl = container.querySelector('.js-total-slides');
    var totalSlides = container.querySelectorAll('.swiper-slide').length;
    if (totalSlidesEl) {
      totalSlidesEl.textContent = totalSlides;
    }

    // Initialize Swiper for this container
    var swiperInstance = new Swiper(container.querySelector('.mySwiper'), {
      slidesPerView: 1,
      spaceBetween: 24,
      freemode: true,
      loop: true,
      navigation: {
        nextEl: nextBtn,  // Desktop navigation
        prevEl: prevBtn,
      },
      breakpoints: {
        640: { slidesPerView: 1.3, centeredSlides: true },
        1024: { slidesPerView: 1, centeredSlides: false },
      },
    });

    // Bind mobile navigation if present
    if (mobPrevBtn && mobNextBtn) {
      mobPrevBtn.addEventListener('click', function () {
        swiperInstance.slidePrev();
      });
      mobNextBtn.addEventListener('click', function () {
        swiperInstance.slideNext();
      });
    }

    // Update slide counter on slide change
    swiperInstance.on('slideChange', function () {
      if (currentIndexEl) {
        currentIndexEl.textContent = swiperInstance.realIndex + 1;
      }

      // Auto focus the active slide for accessibility
      // var activeSlide = container.querySelector('.swiper-slide-active');
      // if (activeSlide) {
      //   // Ensure the slide is focusable
      //   activeSlide.setAttribute('tabindex', '0');
      //   activeSlide.focus({ preventScroll: true });
      // }
    });
  });


</script>

<style>
  .archive-post-title a {
    font-family: 'ErbaumRegular' !important;
    font-weight: 400;
  }

  @media screen {
    html {
      margin-top: 0 !important;
    }
  }
</style>

<style>
  @media (max-width: 450px) {
    .last-cta {
      margin: auto !important;
      width: 96% !important;
      padding: 12px !important;
    }
    
    .cta-main {
      padding: 0;
      display: block !important;
      background-color: #161515;
      border-radius: 16px;
    }

    .cta-main {
      overflow: hidden !important;
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