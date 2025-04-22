<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
  <header class="entry-header">
    <?php if ( is_singular('faq') ) : ?>
      <h1 class="entry-title"><?php the_title(); ?></h1>
    <?php else : ?>
      <h2 class="entry-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
    <?php endif; ?>
  </header>

  <div class="entry-content">
    <?php
      // 'editor' is supported
      the_content();

      // Additional meta field
      $faq_desc = get_post_meta(get_the_ID(), 'cp_faq_description', true);
      if ( $faq_desc ) {
        echo '<h4>FAQ Description</h4>';
        echo '<p>' . esc_html($faq_desc) . '</p>';
      }
    ?>
  </div>
</article>
