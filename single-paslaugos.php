<?php get_header(); ?>
<main id="primary">
  <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
    <?php get_template_part('template-parts/cpt-paslaugos/content', 'paslaugos'); ?>
  <?php endwhile; endif; ?>
</main>
<?php get_footer();

