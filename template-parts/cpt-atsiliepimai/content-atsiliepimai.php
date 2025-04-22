<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
  <header class="entry-header">
    <h2 class="entry-title"><?php the_title(); // only 'title' is supported ?></h2>
  </header>

  <div class="entry-content">
    <?php
      // Retrieve meta fields
      $name     = get_post_meta(get_the_ID(), 'cp_atsiliepimai_name', true);
      $email    = get_post_meta(get_the_ID(), 'cp_atsiliepimai_email', true);
      $feedback = get_post_meta(get_the_ID(), 'cp_atsiliepimai_feedback', true);
      $rating   = get_post_meta(get_the_ID(), 'cp_atsiliepimai_rating', true);

      if ( $name ) {
        echo '<p><strong>Name:</strong> ' . esc_html($name) . '</p>';
      }
      if ( $email ) {
        echo '<p><strong>Email:</strong> ' . esc_html($email) . '</p>';
      }
      if ( $feedback ) {
        echo '<p><strong>Feedback:</strong> ' . esc_html($feedback) . '</p>';
      }
      if ( $rating ) {
        echo '<p><strong>Rating:</strong> ' . esc_html($rating) . ' / 5</p>';
      }
    ?>
  </div>
</article>

