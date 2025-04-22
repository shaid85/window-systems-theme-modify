<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
  <header class="entry-header">
    <h2 class="entry-title"><?php the_title(); // only 'title' is supported ?></h2>
  </header>

  <div class="entry-content">
    <?php
      // Retrieve meta
      $image = get_post_meta(get_the_ID(), 'cp_pasiekimai_image', true);
      if ( $image ) {
        echo '<p><strong>Pasiekimai Image:</strong> ' . esc_html($image) . '</p>';
        // Or: echo '<img src="'.esc_url($image).'" alt="" />';
      }
    ?>
  </div>
</article>

