<?php get_header(); ?>
<main id="primary">
  <?php if (have_posts()):
    while (have_posts()):
      the_post(); ?>
      <div class="p-[16px] md:p-0 md:pl-[40px]">
        <?php get_template_part('template-parts/cpt-atlikti_darbai/content', 'atlikti_darbai'); ?>
      </div>
    <?php endwhile; endif; ?>
</main>
<?php get_footer();

