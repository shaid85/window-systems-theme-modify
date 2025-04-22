<?php get_header(); ?>

  <main class="w-full bg-[#F7F7F7] mx-auto px-4 py-10 md:py-20">
  <header class="mb-6 md:mb-8 text-center">
    <h1 class="text-[28px] md:text-[40px]">Dažnai užduodami klausimai</h1>
  </header>

  <?php if ( have_posts() ) : ?>
  <div class="mx-auto max-w-[850px] space-y-2 md:space-y-4">
    <?php 
      $first = true;
      while ( have_posts() ) : the_post();
        $is_open     = $first;
        $aria_exp    = $is_open ? 'true' : 'false';
        $content_cls = $is_open ? '' : 'hidden';
        $plus_cls    = $is_open ? 'hidden' : '';
        $minus_cls   = $is_open ? '' : 'hidden';
    ?>
      <div class="faq-item border border-[#EEEEEE] rounded-[12px] bg-white p-4">
        <div class="flex justify-between items-center">
          <h2 class="degular text-[16px] md:text-[18px] "><?php the_title(); ?></h2>
          <button
            type="button"
            class="faq-toggle text-[20px] p-2 rounded-full bg-amber-400"
            aria-expanded="<?php echo $aria_exp; ?>"
            aria-controls="faq-<?php the_ID(); ?>"
          >
          <span class="plus">
              <svg width="24" height="24" viewBox="0 0 24 24" fill="none" 
                  xmlns="http://www.w3.org/2000/svg" 
                  stroke="#000" <!-- Set to black -->
                  stroke-width="1.5"> <!-- Adjust thickness here -->
                  <line x1="12" y1="5" x2="12" y2="19" />
                  <line x1="5" y1="12" x2="19" y2="12" />
              </svg>
          </span>
          <span class="minus hidden">
              <svg width="24" height="24" viewBox="0 0 24 24" fill="none" 
                  xmlns="http://www.w3.org/2000/svg" 
                  stroke="#000" <!-- Set to black -->
                  stroke-width="1.5"> <!-- Adjust thickness here -->
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

</main>

<script>
document.querySelectorAll('.faq-toggle').forEach(button => {
  button.addEventListener('click', () => {
    const content = document.getElementById(button.getAttribute('aria-controls'));
    content.classList.toggle('hidden');

    button.querySelector('.plus').classList.toggle('hidden');
    button.querySelector('.minus').classList.toggle('hidden');

    const expanded = content.classList.contains('hidden') ? 'false' : 'true';
    button.setAttribute('aria-expanded', expanded);
  });
});
</script>

<?php get_footer(); ?>
