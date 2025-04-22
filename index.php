<?php
/**
 * Main template file
 *
 */

get_header();
?>

<div id="primary" class="content-area max-w-[1440px] mx-auto px-4 py-4">
  <main id="main" class="site-main">
    <div class="grid grid-cols-1 gap-6 sm:grid-cols-2 lg:grid-cols-4">
      <?php if (have_posts()): ?>
        <?php while (have_posts()):
          the_post(); ?>
          <div class="flex flex-col p-6 text-gray-100 bg-gray-800 border rounded-md">
            <h2 class="mb-3 text-xl font-bold"><?php the_title(); ?></h2>
            <div class="flex-grow">
              <!-- Using wp_trim_words to crop the content. You can adjust the word limit as needed -->
              <p class="line-clamp-3"><?php echo wp_trim_words(get_the_content(), 72, '...'); ?></p>
            </div>
            <a href="<?php the_permalink(); ?>" class="inline-block mt-4 text-blue-400 hover:text-blue-600">Read More</a>
          </div>
        <?php endwhile; ?>
      </div>
      <?php the_posts_navigation(); ?>
    <?php else: ?>
      <?php get_template_part('template-parts/content', 'none'); ?>
    <?php endif; ?>
  </main>
</div>

<?php get_footer(); ?>