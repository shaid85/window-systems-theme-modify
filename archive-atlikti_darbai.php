<?php get_header(); ?>
<style>
  figure img {
    border-radius: 16px !important;
  }

  .carousel-container {
    display: flex;
    overflow: hidden;
    position: relative;
  }

  @media (max-width: 767px) {
    .carousel img.active {
      margin: 2px 2px 0 0;
    }

    .carousel.hidden {
      display: none !important;
    }
  }

  .carousel {
    display: flex;
  }

  .carousel img {
    flex: 0 0 auto;
  }

  .border-6 {
    border-width: 6px;
  }

  @media (min-width: 768px) {
    .carousel.secondary {
      width: 270px;
      margin-right: -60px;
      overflow: hidden;
    }
  }

  body {
    overflow-x: hidden;
    max-width: 100%;
  }

  .carousel-container img.active,
  .carousel img {
    max-width: 100%;
  }

  section,
  .flex,
  .carousel-container,
  .carousel {
    max-width: 100%;
  }

  .absolute {
    max-width: 100%;
  }

  img[src*="yellow-circle"] {
    max-width: 100%;
  }
</style>

<main id="primary" class="">
  <section class="pt-10 mx-auto overflow-hidden bg-black md:py-16">
    <!-- Mobile version -->
    <div class="w-full pb-10 p-4 md:pb-4 overflow-hidden bg-black md:hidden">
      <div class="mb-4 md:mt-8 text-center">
        <h2 class="text-white font-erbaum-bold font-normal text-[28px] md:text-[40px] mb-2 md:mb-4">
          Mūsų atlikti darbai
        </h2>
        <p class="text-white font-degular-var font-normal text-[16px] md:text-[18px] opacity-80 max-w-md mx-auto">
          Lorem ipsum dolor sit amet consectetur. Nec ac egestas sed amet
          gravida vulputate. Placerat tempor cursus ut feugiat at sit nisi
          velit vel. Ridiculus nulla faucibus at orci.
        </p>
      </div>

      <div class="flex items-center w-full gap-6">
        <div class="relative w-full pt-20">
          <img src="<?php echo LANGU_THEME_URI; ?>/assets/images/young-mother-mobile.png" alt="Woman by window"
            class="rounded-lg w-[167px] h-[167px]" />
          <img src="<?php echo LANGU_THEME_URI; ?>/assets/images/left-yellow-circle-mobile.png" alt="Yellow curved line"
            class="absolute z-10 top-10 -left-4" />
        </div>

        <div class="relative w-full">
          <img src="<?php echo LANGU_THEME_URI; ?>/assets/images/cat-mobile.png" alt="Cat on windowsill"
            class="rounded-lg w-[167px] h-[167px] mb-10" />
          <img src="<?php echo LANGU_THEME_URI; ?>/assets/images/right-yellow-circle-mobile.png"
            alt="Yellow curved line" class="absolute z-10 top-14 md:top-15 -right-6" />
        </div>
      </div>
    </div>

    <!-- Desktop version -->
    <div class="hidden w-full md:block">
      <div class="flex items-center justify-between">
        <div class="relative">
          <img src="<?php echo LANGU_THEME_URI; ?>/assets/images/young-mother.png" alt="Woman by window"
            class="rounded-lg" />
          <img src="<?php echo LANGU_THEME_URI; ?>/assets/images/yellow-circle-left.png" alt="Yellow curved line"
            class="absolute top-36 left-2 z-2" />
        </div>

        <div class="w-[440px] text-center">
          <h2 class="text-white font-erbaum-bold font-normal text-[40px] mb-6">
            Mūsų atlikti darbai
          </h2>
          <p class="text-white font-degular-var font-normal text-[18px] opacity-80">
            Lorem ipsum dolor sit amet consectetur. Nec ac egestas sed amet
            gravida vulputate. Placerat tempor cursus ut feugiat at sit nisi
            velit vel. Ridiculus nulla faucibus at orci.
          </p>
        </div>

        <div class="relative">
          <img src="<?php echo LANGU_THEME_URI; ?>/assets/images/cat.png" alt="Cat on windowsill" class="rounded-lg" />
          <!-- <img src="<?php echo LANGU_THEME_URI; ?>/assets/images/yellow-circle-right.png" alt="Yellow curved line"
            class="absolute top-60 left-1/2 -rotate-1 transform -translate-x-1/2 -translate-y-48 w-[489px] h-[481px] z-10" /> -->
          <img src="<?php echo LANGU_THEME_URI; ?>/assets/images/yellow-circle-right.png" alt="Yellow curved line"
            class="absolute top-0 right-0" />
        </div>
      </div>
    </div>
  </section>

  <section class="">
    <?php $i = 0; ?>
    <?php if (have_posts()): ?>
      <div class="max-w-[1440px] flex justify-end cpt-archive-wrapper">
        <?php while (have_posts()):
          the_post();
          $class = $i % 2 != 0 ? "bg-[#f7f7f7]" : "bg-white"; $i++;
          ?>
          <div class="<?php echo $class; ?> px-[12px] md:pl-[40px] md:py-[40px] py-[16px] pm-[16px] md:pr-0 flex justify-end">
            <?php get_template_part('template-parts/cpt-atlikti_darbai/content', 'atlikti_darbai'); ?>
          </div>
        <?php endwhile; ?>
      </div>
      <div class="pagination">
        <?php the_posts_pagination(); ?>
      </div>
    <?php else: ?>
      <p><?php esc_html_e('No Atlikti darbai found.', 'langu-sistemos'); ?></p>
    <?php endif; ?>
  </section>
</main>

<div class="pb-[80px]">
<?php
echo do_shortcode( '[feedback_cta 
title="Reikia konsultacijos ar patarimo?
Klauskite!" 
description="Jūsų grįžtamasis ryšys leidžia mums augti ir gerinti jūsų patirtį." 
button_text="Susisiekti" 
button_url="/gauti_pasiulyma"]' ); 
?>
</div>
<?php get_footer(); ?>
