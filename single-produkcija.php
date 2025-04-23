<?php get_header(); ?>
<main id="primary">
  <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
      <?php
      // Loads template-parts/cpt-produkcija/content-produkcija.php
      get_template_part('template-parts/cpt-produkcija/content', 'product');
      ?>
  <?php endwhile;
  endif; ?>
</main>
<?php get_footer();
