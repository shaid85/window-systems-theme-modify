<?php

defined("ABSPATH") || exit;

class CPT_produkcija_metaboxes
{

  public function __construct()
  {
    // Hook into WordPress to add our metabox.
    add_action('add_meta_boxes', [$this, 'add_metabox']);
    // Hook to save the metabox data.
    add_action('save_post', [$this, 'save_metabox_data']);
  }

  /**
   * Register the metabox for the 'produkcija' post type.
   */
  public function add_metabox()
  {
    add_meta_box(
      'produkcija_featured_meta',
      'Featured Produkcija',
      [$this, 'render_metabox'],
      'produkcija',
      'side',
      'default'
    );
  }

  /**
   * Render the metabox content.
   *
   * @param WP_Post $post The current post object.
   */
  public function render_metabox($post)
  {
    // Add a nonce field for security.
    wp_nonce_field('produkcija_featured_nonce', 'produkcija_featured_nonce_field');

    // Retrieve the existing value from the database.
    $value = get_post_meta($post->ID, '_is_featured', true);
    ?>
    <label for="produkcija_featured_field">
      <input type="checkbox" name="produkcija_featured_field" id="produkcija_featured_field" value="yes" <?php checked($value, 'yes'); ?> />
      <?php esc_html_e('Mark as Featured', 'textdomain'); ?>
    </label>
    <?php
  }

  /**
   * Save the metabox data when the post is saved.
   *
   * @param int $post_id The ID of the current post.
   */
  public function save_metabox_data($post_id)
  {
    // Check if our nonce is set.
    if (!isset($_POST['produkcija_featured_nonce_field'])) {
      return;
    }

    // Verify the nonce for security.
    if (!wp_verify_nonce($_POST['produkcija_featured_nonce_field'], 'produkcija_featured_nonce')) {
      return;
    }

    // Prevent autosave interference.
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
      return;
    }

    // Check user permissions.
    if (isset($_POST['post_type']) && 'produkcija' === $_POST['post_type']) {
      if (!current_user_can('edit_post', $post_id)) {
        return;
      }
    }

    // Determine if the checkbox is checked.
    $is_featured = isset($_POST['produkcija_featured_field']) && $_POST['produkcija_featured_field'] === 'yes' ? 'yes' : 'no';

    // Update the post meta.
    update_post_meta($post_id, '_is_featured', $is_featured);
  }
}

new CPT_produkcija_metaboxes();
