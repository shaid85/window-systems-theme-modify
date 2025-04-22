<?php get_header(); ?>
<main id="primary" class="bg-[#8E94A4]">
  <header class="page-header hidden">
    <h1><?php post_type_archive_title(); // e.g. "Pasiekimai" ?></h1>
  </header>

  <?php if (have_posts()): ?>
    <div class="cpt-archive-wrapper md:max-w-[1440px] mx-auto w-full bg-[#8E94A4] flex flex-wrap md:justify-start justify-center md:gap-x-[32px]  md:gap-y-[48px] gap-[16 px] md:px-[100px] px-[24px] md:pb-[82px] py-[16px]">
      <?php while (have_posts()): the_post(); ?>
	      <article class="flex flex-col gap-[8px]" id="post-<?php the_ID(); ?>"<?php post_class(); ?>  >
	  <header class="entry-header">
	    <h2 class="entry-title text-[#bebebe]"><?php the_title(); // only 'title' is supported ?></h2>
	  </header>

	  <div class="entry-content w-[281px] h-[281px] flex items-center justify-center bg-[#ffffff] ">
	    <?php
                // Retrieve meta
                $image = get_post_meta(get_the_ID(), 'cp_pasiekimai_image', true);
                if ($image) {
                    // echo '<p><strong>Pasiekimai Image:</strong> ' . esc_html($image) . '</p>';
                    echo '<img src="' . esc_url($image) . '" alt="" />';

                }
            ?>
	  </div>
	</article>


	      <?php endwhile; ?>
    </div>
    <div class="pagination">
      <?php the_posts_pagination(); ?>
    </div>
  <?php else: ?>
    <p><?php esc_html_e('No Pasiekimai found.', 'langu-sistemos'); ?></p>
  <?php endif; ?>
</main>
<?php get_footer();
