<?php

get_header();

?>

<div class="max-w-[1440px] container px-4 py-10 md:p-[80px] mx-auto">
  <!-- Blog Header -->
  <header class="flex items-start gap-[24px] mb-[56px] flex-start">

    <div class="hidden md:block w-[20px] flex-shrink-0">
      <svg width="20" height="48" viewBox="0 0 20 48" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path
          d="M3.1405 48L0 44.7691L12.2865 32.1291C14.3985 29.9563 15.5556 27.075 15.5556 23.9953C15.5556 20.9156 14.3893 18.0342 12.2865 15.8709L0 3.23086L3.1405 0L15.427 12.64C18.3747 15.6725 20 19.7064 20 23.9953C20 28.2842 18.3747 32.318 15.427 35.3505L3.1405 47.9906V48Z"
          fill="#FFCC32" />
      </svg>
    </div>

    <div class="flex flex-col gap-[16px]">
      <h1 class=" text-[#000000] text-[40px] font-[400] leading-[48px] font-Erbaum">
        <span>Kainų skaičiuoklė</span>
      </h1>


      <div class="text-[#000000] text-[18px] leading-[26px] font-degular-var">
        <?php
        // Default value if the option is not set
        $default_value = "What is Lorem Ipsum? Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s...";

        // Fetch the descriptions option
        $descs = get_option('cp_cpt_archive_descriptions', $default_value);

        // Get the description for the current post type (or default to empty)
        $full = isset($descs[get_post_type()]) ? $descs[get_post_type()] : '';

        // Shorten the description to 50 characters
        $short = substr($full, 0, 250);
        ?>
        <div class="cpt-desc-container text-[#000000] text-[18px] leading-[26px] font-degular-var">
          <div class="cpt-desc-short"><?php echo wp_kses_post($short); ?>…</div>
          <div class="hidden cpt-desc-full"><?php echo wp_kses_post($full); ?></div>
          <?php if (strlen($full) > 250): ?>
            <div><button class="cpt-show-more mt-4 text-black text-[18px]">Rodyti daugiau</button></div>
          <?php endif; ?>
        </div>
      </div>


  </header>

  <main>
    <?php if (have_posts()): ?>
      <div class="cpt-archive-wrapper archive-calculator">
        <div class="grid grid-cols-3 innner-calculator-wrap gap-[24px]">
          <?php while (have_posts()):
            the_post(); ?>
            <?php get_template_part('template-parts/cpt-calculator/content', 'calculator'); ?>
          <?php endwhile; ?>
        </div>
      </div>
      <div class="pagination">
        <?php the_posts_pagination(); ?>
      </div>
    <?php else: ?>
      <p><?php esc_html_e('No Padaliniai found.', 'langu-sistemos'); ?></p>
    <?php endif; ?>
  </main>

</div>

<style>
  body {
    background-color: #F7F7F7 !important;
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