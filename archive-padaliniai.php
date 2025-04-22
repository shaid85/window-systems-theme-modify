<?php get_header(); ?>
<main id="primary">
  <header class="page-header">
    <h1><?php post_type_archive_title(); // e.g. "Padaliniai" ?></h1>
  </header>

  <?php if ( have_posts() ) : ?>
    <div class="cpt-archive-wrapper">
      <?php while ( have_posts() ) : the_post(); ?>
        <?php get_template_part('template-parts/cpt-padaliniai/content', 'padaliniai'); ?>
      <?php endwhile; ?>
    </div>
    <div class="pagination">
      <?php the_posts_pagination(); ?>
    </div>
  <?php else : ?>
    <p><?php esc_html_e('No Padaliniai found.', 'langu-sistemos'); ?></p>
  <?php endif; ?>
</main>
<?php get_footer();
